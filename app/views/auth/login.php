<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERS Biometrics - Login Portal</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/images/ers_logo2.png" type="image/x-icon"> </head>
<body>

    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100 p-3">
        <div class="login-container row no-gutters rounded-4 overflow-hidden">

            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-center p-5 text-white left-panel position-relative shadow-lg">
                <div class="background-shapes">
                    <span class="shape-1"></span>
                    <span class="shape-2"></span>
                    <span class="shape-3"></span>
                </div>
                <div class="content z-1">
                    <h1 class="mb-4 display-5 fw-bold">ERS BIOMETRICS PORTAL</h1>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="bi bi-fingerprint me-2"></i> Biometric Secure Access</li>
                        <li class="mb-3"><i class="bi bi-fingerprint me-2"></i> Data Analytics</li>
                        <li class="mb-3"><i class="bi bi-clipboard-data me-2"></i> Employee Reports</li>
                        <li class="mb-3"><i class="bi bi-file-earmark-medical me-2"></i> Employee Tracking</li>
                        <li class="mb-3"><i class="bi bi-receipt me-2"></i> Invoicing</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 p-5 bg-white right-panel">
                <div class="header text-center mb-4"> <img src="/images/ers_logo2.png" alt="ERS Biometrics Logo" class="login-logo d-inline-block mx-auto"> </div>


                <?php if (isset($error_message) && $error_message): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($error_message) ?>
                    </div>
                <?php endif; ?>

                <div class="tab-content" id="loginTypeTabContent">
                    <div class="tab-pane fade show active" id="business-login" role="tabpanel" aria-labelledby="business-login-tab">
                        <form action="/login" method="post" class="needs-validation" novalidate>
                            <p class="text-muted mb-4 text-center">Please sign in to continue.</p>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="accountId" name="account_id" placeholder="Your Account ID" required>
                                <label for="accountId">Account ID</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" required>
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember User
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none forgot-password-link">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 login-btn">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-4 login-footer-text">
                <p class="mb-2">Contact no. 01 0593 0593</p>
                <p class="small mb-3">Users accept the standard ERS terms and conditions when logging into the ERS system.</p>
                <p class="mb-3"><a href="#" class="text-decoration-none">TERMS & CONDITIONS</a></p>
                <p class="mb-1">
                    <a href="#" class="text-decoration-none small mx-2">Privacy Policy</a> |
                    <a href="#" class="text-decoration-none small mx-2">Security Policy</a>
                </p>
                <p class="small mt-4">© Copyright 2025. All rights reserved. Powered by <a href="#" class="text-decoration-none">ERS Biometrics</a></p>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function() {

                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    this.classList.toggle('bi-eye');
                    this.classList.toggle('bi-eye-slash');
                });
            }
        });
    </script>

    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>