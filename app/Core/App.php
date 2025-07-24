<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\DashboardController;

class App {
    protected $controller;
    protected $method;
    protected $params = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $url = $this->parseUrl();
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (empty($url)) {
            $this->controller = new AuthController();
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
        elseif ($url[0] === 'logout') {
            $this->controller = new AuthController();
            $this->method = 'logout';
            unset($url[0]);
        }
        elseif ($url[0] === 'login') {
            $this->controller = new AuthController();

            if ($requestMethod === 'POST') {
                $this->method = 'login';
            } else {
                $this->method = 'showLoginForm';
            }
            unset($url[0]);
        }
        elseif ($url[0] === 'login') {
            $this->controller = new AuthController();

            if ($requestMethod === 'POST') {
                $this->method = 'login';
            } else {
                $this->method = 'showLoginForm';
            }
            unset($url[0]);
        }
        elseif ($url[0] === 'employee-timesheet') {
            $this->controller = new DashboardController();
            $this->method = 'showEmployeeTimesheet';
            unset($url[0]);
        }
        elseif ($url[0] === 'list-employee') {
            if (!isset($_SESSION['user_id'])) {
                http_response_code(401);
                echo '<div class="alert alert-danger">Unauthorized. Please log in.</div>';
                exit();
            }
            $this->controller = new DashboardController();
            $this->method = 'showListEmployee';
            unset($url[0]);
        }
        elseif ($url[0] === 'newEmployee') {
            if (!isset($_SESSION['user_id'])) {
                http_response_code(401);
                echo '<div class="alert alert-danger">Unauthorized. Please log in.</div>';
                exit();
            }
            $this->controller = new DashboardController();
            $this->method = 'showNewEmployee';
            unset($url[0]);
        }
        else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFilePath = __DIR__ . '/../controllers/' . $controllerName . '.php';

            if (file_exists($controllerFilePath)) {
                $this->controller = 'App\\Controllers\\' . $controllerName;
                unset($url[0]);
            } else {
                $this->controller = 'App\\Controllers\\AuthController';
                $this->method = 'showLoginForm';
            }

            if (is_string($this->controller)) {
                $controllerClass = $this->controller;
                $this->controller = new $controllerClass();
            }

            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];

                unset($url[1]);
            } else {
                echo ("Routing: Method not found for controller " . get_class($this->controller) . ". Using default method for this controller or showLoginForm.");
            }
        }
        $this->params = $url ? array_values($url) : [];

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