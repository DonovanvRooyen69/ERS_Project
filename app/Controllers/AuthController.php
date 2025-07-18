<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class AuthController {
    public function showLoginForm() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        error_log("showLoginForm called. Session ID: " . session_id());
        error_log("Error message: " . ($_SESSION['login_error'] ?? 'None'));

        View::render('auth/login.', [
            'error_message' => $_SESSION['login_error'] ?? null
        ]);

        unset($_SESSION['login_error']);
    }

    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        error_log("Auth/login POST request received. Session ID: " . session_id());

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $accountId = filter_input(INPUT_POST, 'account_id', FILTER_SANITIZE_NUMBER_INT);
            $username = $_POST['username'];
            $password = $_POST['password'];

            $error = '';

            error_log("Login attempt - Account ID: " . $accountId . ", Username: " . $username);

            if (empty($accountId) || empty($username) || empty($password)) {
                $error = "Please enter Account ID, Username, and Password.";
            } elseif (!is_numeric($accountId)) {
                $error = "Account ID must be a number.";
            } else {

                $accountId = (int)$accountId;

                $user = User::authenticate($accountId, $username, $password);

                if ($user) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['user_name'] = $user['username'];

                    header("Location: /dashboard");
                    exit();
                } else {
                    $error = "Invalid Account ID, Username, or Password.";
                }
            }

            $_SESSION['login_error'] = $error;
            header('Location: /login');
            exit();

        } else {
            header("Location: /login");
            exit();
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();
        header('Location: /login');
        exit();
    }
}