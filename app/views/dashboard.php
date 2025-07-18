<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']);
$username = $_SESSION['username'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>ERS Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/dashboard.css" />
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-2" id="toggleSidebar" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>

        <div class="navbar-logo d-none" id="navbarLogo">
            <img src="/images/ers_logo2.png" alt="ERS Logo" class="ers-logo" />
        </div>

        <div class="ms-auto d-flex align-items-center">
            <a href="#" class="nav-link text-white me-3"><i class="bi bi-bar-chart"></i> Stats</a>
            <a href="#" class="nav-link text-white me-3"><i class="bi bi-question-circle"></i> Help</a>

            <div class="dropdown me-3">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> <?= htmlspecialchars($username) ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
            </div>

            <span class="navbar-text text-white" id="timeDisplay" aria-live="polite"></span>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div id="sidebar" class="bg-white">
    <div class="p-3">
        <div class="sidebar-logo">
            <img src="/images/ers_logo2.png" class="ers-logo" alt="ERS Logo" />
        </div>
        <h5 class="fw-bold">Quick Links</h5>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door me-2"></i>Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-people me-2"></i>Manage Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-calendar-check me-2"></i>Appointments</a></li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div id="main-content" class="container-fluid pt-5 mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row g-4 mt-3 module-card_container">
                <div class="col-md-3">
                    <div class="module-card">
                        <h5 class="card-title">Management of Users</h5>
                        <p class="card-text">Add, edit, or remove user accounts.</p>
                        <div class="module-action mt-auto">
                            <a href="#" class="btn btn-primary">Go to Module</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="module-card">
                        <h5 class="card-title">Schedule Appointments</h5>
                        <p class="card-text">View and manage appointments.</p>
                        <div class="module-action mt-auto">
                        <a href="#" class="btn btn-primary">Go to Module</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarLogo = document.querySelector('.sidebar-logo');
    const navbarLogo = document.getElementById('navbarLogo');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');

        if (sidebar.classList.contains('collapsed')) {
            sidebarLogo.classList.add('d-none');
            navbarLogo.classList.remove('d-none');
        } else {
            sidebarLogo.classList.remove('d-none');
            navbarLogo.classList.add('d-none');
        }
    });

    // Live Clock
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('timeDisplay').textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
</body>
</html>
