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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/dashboard.css" />
    <link rel="icon" href="/images/icon.png" type="image/x-icon">
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-2" id="toggleSidebar" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>

        <div class="navbar-logo d-none" id="navbarLogo">
            <img src="/images/ers_biometrics_light.png" alt="ERS Logo" class="ers-logo" />
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
<div id="main-wrapper">
    <div id="sidebar" class="bg-white vh-100 border-end">
    <div class="p-3">
        <div class="sidebar-logo mb-3 text-center">
            <img src="/images/ers_logo2.png" class="ers-logo img-fluid" alt="ERS Logo" style="max-height: 60px;" />
        </div>
        <h5 class="fw-bold mb-4">Quick Links</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard"><i class="bi bi-house-door me-2"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#attendanceSubmenu" role="button" aria-expanded="false" aria-controls="attendanceSubmenu">
                    <span><i class="bi bi-clock me-2"></i>Time & Attendance</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#attendanceSubmenu"></i>
                </a>
                <div class="collapse ps-3" id="attendanceSubmenu">
                    <ul class="nav flex-column small">
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#taReportsSubmenu" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2" id="taIcon"></i>T&A Reports</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#taReportsSubmenu"></i>
                            </a>
                            <ul class="collapse list-unstyled ps-3" id="taReportsSubmenu">
                                <li class="small"><a class="nav-link" href="#" onclick="loadContent('/employee-timesheet')"><i class="bi bi-file-earmark-text-fill me-1"></i>Employee Timesheet</a></li>
                                <li class="small"><a class="nav-link" href="#" onclick="loadContent('')"><i class="bi bi-file-earmark-text-fill me-1"></i>Fill Up Report</a></li>
                                <li class="small"><a class="nav-link" href="#" onclick="loadContent('')"><i class="bi bi-file-earmark-text-fill me-1"></i>Shift Allocation Report</a></li>
                                <li class="small"><a class="nav-link" href="#" onclick="loadContent('')"><i class="bi bi-file-earmark-text-fill me-1"></i>Scheduling Report</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2"></i>Process</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2"></i>Schedule</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2"></i>Export</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2"></i>Setup</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#leaveSubmenu" role="button" aria-expanded="false" aria-controls="leaveSubmenu">
                    <span><i class="bi bi-calendar-check me-2"></i>Leave Module</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
                <div class="collapse ps-3" id="leaveSubmenu">
                    <ul class="nav flex-column small">
                        <li class="nav-item">
                            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="taReportsSubmenu">
                                <span><i class="bi bi-archive-fill me-2"></i>Leave Reports</span>
                                <i class="bi bi-chevron-down small rotate-icon" data-target="#"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#EmReportSubmenu" role="button" aria-expanded="false" aria-controls="EmReportSubmenu">
                    <span><i class="bi bi-person me-2"></i>Employees</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#EmReportSubmenu"></i>
                </a>
                <div class="collapse ps-3" id="EmReportSubmenu">
                    <ul class="nav flex-column small">
                        <li class="small"><a class="nav-link" href="#" onclick="loadContent('/list-employee')"><i class="bi bi-file-earmark-text me-1"></i>List Employees</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-fingerprint me-2"></i>Devices</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-lock-fill me-2"></i>Access Control</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-card-list me-2"></i>Actual Clock Reports</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-cash-stack me-2"></i>Job Costing</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-person-fill-lock me-2"></i>Enforcer</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-kanban-fill me-2"></i>Dashboard</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-phone me-2"></i>Mobile App</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-chat-left-dots-fill me-2"></i>Communications</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-pc-display me-2"></i>Desktop App</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-window-fullscreen me-2"></i>Web Cloaking</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-shield-lock-fill me-2"></i>ZKBioSecurity App</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="">
                    <span><i class="bi bi-gear-fill me-2"></i>Setup</span>
                    <i class="bi bi-chevron-down small rotate-icon" data-target="#leaveSubmenu"></i>
                </a>
            </li>
        </ul>
    </div>
    </div>
</div>

<!-- Main Content -->
<div id="main-content" class="container pt-5 mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row g-4 mt-3 module-card_container">
                <div class="md-3">
                    <div class="module-card">
                        <h5 class="card-title">Management of Users</h5>
                        <p class="card-text">Add, edit, or remove user accounts.</p>
                        <div class="module-action mt-auto">
                            <a href="#" class="btn btn-primary">Go to Module</a>
                        </div>
                    </div>
                </div>

                <div class="md-3">
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
    const currentPath = "<?= $currentPage ?>";
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarLogo = document.querySelector('.sidebar-logo');
    const navbarLogo = document.getElementById('navbarLogo');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded');

        if (sidebar.classList.contains('collapsed')) {
            sidebarLogo?.classList.add('d-none');
            navbarLogo?.classList.remove('d-none');
        } else {
            sidebarLogo?.classList.remove('d-none');
            navbarLogo?.classList.add('d-none');
        }
    });

    document.querySelectorAll('.rotate-icon').forEach(icon => {
        const targetId = icon.dataset.target;
        if (!targetId || targetId === '#') return;

        const collapseElement = document.querySelector(targetId);
        if(!collapseElement)return;

        collapseElement.addEventListener('show.bs.collapse', () => {
            icon.classList.add('rotate');
        });

        collapseElement.addEventListener('hide.bs.collapse', () => {
            icon.classList.remove('rotate');
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("main-content");
        const toggleBtn = document.getElementById("sidebarToggle");

        if (toggleBtn) {
            toggleBtn.addEventListener("click", function () {
                sidebar.classList.toggle("collapsed");
                mainContent.classList.toggle("collapsed");
            });
        }
    });


    function loadContent(url){

        fetch(url, {
            method: 'GET',
            credentials: 'include',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }

        })
            .then(response => {
                if(!response.ok) throw new Error("Unauthorized or failed to load");
                return response.text();
            })
            .then(data => {
                document.getElementById("main-content").innerHTML = data;
            })
            .catch(error => {
                console.error("Error loading content:", error);
                document.getElementById("main-content").innerHTML = `<div class="alert alert-danger">${error.message}</div>`;
            });

    }
    // Live Clock
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('timeDisplay').textContent = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();

    document.addEventListener("DOMContentLoaded", function () {
        const taSubmenu = document.getElementById('taReportsSubmenu');
        const taIcon = document.getElementById('taIcon');

        taSubmenu.addEventListener('show.bs.collapse', function () {
            taIcon.classList.remove('bi', 'bi-archive-fill');
            taIcon.classList.add('bi', 'bi-archive');
        });

        taSubmenu.addEventListener('hide.bs.collapse', function () {
            taIcon.classList.remove('bi', 'bi-archive');
            taIcon.classList.add('bi', 'bi-archive-fill');
        });

        let elements = document.querySelectorAll('#sidebar .nav-link')

        elements.forEach(el => {
            el.addEventListener('click', () => {
                elements.forEach(el => el.classList.remove('active'))
                el.classList.add('active')
            })})

        document.querySelectorAll('#sidebar .nav-link').forEach(link =>{
            const href = link.getAttribute('href');

            if(href && currentPath.includes(href) && href !== '#'){
                link.classList.add('active');

                const collapseParent = link.closest('.collapse');
                if(collapseParent){
                    collapseParent.classList.add('show');

                    const toggleLink = document.querySelector(`[data-bs-toggle="collapse"][href="#${collapseParent.id}"]`);
                    if(toggleLink){
                        toggleLink.classList.add('active');
                    }

                    const parentNavItem = collapseParent.closest('.nav-item');
                    if(parentNavItem){
                        parentNavItem.querySelector('.nav-link')?.classList.add('active');
                    }
                }
            }
        });
    });
</script>
</body>
</html>
