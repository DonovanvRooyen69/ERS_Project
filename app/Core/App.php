<?php

namespace App\Core;

use App\Controllers\AuthController;

class App {
    protected $controller; // Will hold the controller instance
    protected $method;
    protected $params = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        error_log("App __construct called. Current Session ID: " . session_id());
        error_log("User ID in session: " . ($_SESSION['user_id'] ?? 'Not set'));
        error_log("Current URL via _GET['url']: " . ($_GET['url'] ?? 'Root (no url param)'));

        $url = $this->parseUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        error_log("Parsed URL segments: " . implode('/', $url));
        error_log("Request Method: " . $requestMethod);


        // --- Routing Logic ---
        // If URL is empty, default to login form
        if (empty($url)) {
            error_log("Routing: Root path detected. Defaulting to AuthController::showLoginForm.");
            $this->controller = new AuthController(); // Instantiate directly for known default
            $this->method = 'showLoginForm';
        }
        // Handle /dashboard route
        elseif ($url[0] === 'dashboard') {
            error_log("Routing: /dashboard detected.");
            if (!isset($_SESSION['user_id'])) {
                error_log("/dashboard: User not logged in. Redirecting to /login.");
                header('Location: /login');
                exit();
            } else {
                error_log("/dashboard: User logged in. Including dashboard view.");
                require_once __DIR__ . '/../views/dashboard.php';
                exit();
            }
        }
        // Handle /logout route
        elseif ($url[0] === 'logout') {
            error_log("Routing: /logout detected. Calling AuthController::logout.");
            $this->controller = new AuthController(); // Instantiate directly
            $this->method = 'logout';
            unset($url[0]); // Consume 'logout' segment
        }
        // Handle /login route (GET or POST)
        elseif ($url[0] === 'login') {
            error_log("Routing: /login detected. --- ENTERING LOGIN BRANCH ---");
            $this->controller = new AuthController(); // Instantiate directly

            if ($requestMethod === 'POST') {
                $this->method = 'login'; // Process login
                error_log("Routing: /login is a POST request. Setting method to 'login'.");
            } else { // It's a GET request
                $this->method = 'showLoginForm'; // Show login form
                error_log("Routing: /login is a GET request. Setting method to 'showLoginForm'.");
            }
            unset($url[0]); // Consume 'login' segment
        }
        // Default dynamic controller/method resolution (for other routes)
        else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFilePath = __DIR__ . '/../controllers/' . $controllerName . '.php';

            if (file_exists($controllerFilePath)) {
                $this->controller = 'App\\Controllers\\' . $controllerName; // Store full class string
                error_log("Routing: Found controller class string " . $this->controller);
                unset($url[0]);
            } else {
                error_log("Routing: Controller " . $controllerName . " not found. Falling back to AuthController::showLoginForm.");
                $this->controller = 'App\\Controllers\\AuthController'; // Fallback to string name
                $this->method = 'showLoginForm';
            }

            // Instantiate here for dynamic routes
            if (is_string($this->controller)) { // If it's still a string (class name), instantiate it
                $controllerClass = $this->controller; // Already full namespace
                $this->controller = new $controllerClass();
                error_log("Controller instantiated for dynamic route: " . get_class($this->controller));
            }

            // Determine method for dynamic routes
            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                error_log("Routing: Found method " . $this->method . " in " . get_class($this->controller));
                unset($url[1]);
            } else {
                error_log("Routing: Method not found for controller " . get_class($this->controller) . ". Using default method for this controller or showLoginForm.");
                // Fallback to a default method on the controller, or further re-route if desired
                // For now, if no method, current method (showLoginForm from fallback) remains
            }
        }

        // Params will be whatever is left in $url
        $this->params = $url ? array_values($url) : [];

        // This log now confirms the final state before run() attempts to call it
        error_log("Final determination: Controller " . get_class($this->controller) . ", Method " . $this->method . ", Params: " . implode(', ', $this->params));
    }

    public function run() {
        error_log("App::run() called. Attempting to call " . get_class($this->controller) . "::" . $this->method);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }
        return [];
    }
}