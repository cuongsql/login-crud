<?php
use Controller\Employee;
use Controller\EmployeeManager;

session_start();
if($_SESSION['username'] !== "admin"){
    echo "<script>alert('ban khong co quyen')</script>";
    echo "<script>window.location = '../index.php'</script>";
}

include_once "../class/Employee.php";
include_once "../class/EmployeeManager.php";
$index = (int)$_GET['index'];

$employeeManager = new Controller\EmployeeManager("../data.json");
$employeeManager->delete($index);

header("Location: ../index.php");