<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\DashboardController;

class App {
    protected $controller; // Will hold the controller instance
    protected $method;
    protected $params = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $url = $this->parseUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (empty($url)) {
            $this->controller = new AuthController(); // Instantiate directly for known default
            $this->method = 'showLoginForm';
        }
        // Handle /dashboard route
        elseif ($url[0] === 'dashboard') {
            if (!isset($_SESSION['user_id'])) {
                header('Location: /login');
                exit();
            } else {
                require_once __DIR__ . '/../views/dashboard.php';
                exit();
            }
        }
        // Handle /logout route
        elseif ($url[0] === 'logout') {
            $this->controller = new AuthController(); // Instantiate directly
            $this->method = 'logout';
            unset($url[0]); // Consume 'logout' segment
        }
        // Handle /login route (GET or POST)
        elseif ($url[0] === 'login') {
            $this->controller = new AuthController(); // Instantiate directly

            if ($requestMethod === 'POST') {
                $this->method = 'login'; // Process login
            } else { // It's a GET request
                $this->method = 'showLoginForm'; // Show login form
            }
            unset($url[0]); // Consume 'login' segment
        }
        elseif ($url[0] === 'login') {
            $this->controller = new AuthController(); // Instantiate directly

            if ($requestMethod === 'POST') {
                $this->method = 'login'; // Process login
            } else { // It's a GET request
                $this->method = 'showLoginForm'; // Show login form
            }
            unset($url[0]); // Consume 'login' segment
        }
        // --- NEW: Handle /employee-timesheet route for AJAX content loading ---
        elseif ($url[0] === 'employee-timesheet') {
            $this->controller = new DashboardController();
            $this->method = 'showEmployeeTimesheet';
            unset($url[0]);
        }
        elseif ($url[0] === 'list-employee') {
            if (!isset($_SESSION['user_id'])) { // IMPORTANT: Add AUTHENTICATION CHECK here!
                http_response_code(401);
                echo '<div class="alert alert-danger">Unauthorized. Please log in.</div>';
                exit(); // Stop execution
            }
            $this->controller = new DashboardController(); // Or a new `EmployeeController` if you have one
            $this->method = 'showListEmployee'; // A new method in DashboardController
            unset($url[0]);
        }
        elseif ($url[0] === 'newEmployee') { // Match the URL you're requesting
            if (!isset($_SESSION['user_id'])) { // AUTHENTICATION CHECK
                http_response_code(401);
                echo '<div class="alert alert-danger">Unauthorized. Please log in.</div>';
                exit();
            }
            $this->controller = new DashboardController();
            $this->method = 'showNewEmployee'; // This method will be added to DashboardController
            unset($url[0]);
        }
        // Default dynamic controller/method resolution (for other routes)
        else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFilePath = __DIR__ . '/../controllers/' . $controllerName . '.php';

            if (file_exists($controllerFilePath)) {
                $this->controller = 'App\\Controllers\\' . $controllerName; // Store full class string
                unset($url[0]);
            } else {
                $this->controller = 'App\\Controllers\\AuthController'; // Fallback to string name
                $this->method = 'showLoginForm';
            }

            // Instantiate here for dynamic routes
            if (is_string($this->controller)) { // If it's still a string (class name), instantiate it
                $controllerClass = $this->controller; // Already full namespace
                $this->controller = new $controllerClass();
            }

            // Determine method for dynamic routes
            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];

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
    }

    public function run() {
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