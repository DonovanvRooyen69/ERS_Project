<?php

namespace App\Controllers;
use App\Core\View;

class DashboardController
{
    public function index()
    {
        View::render('dashboard.php');
    }
    public function showEmployeeTimesheet()
    {
        require_once __DIR__ . '/../views/employeeTimesheet.php';
        exit();
    }

    public function showListEmployee() {
        require_once __DIR__ . '/../views/ListEmployee.php';
        exit();
    }

    public function showNewEmployee() {
        require_once __DIR__ . '/../views/newEmployee.php';
        exit();
    }

}