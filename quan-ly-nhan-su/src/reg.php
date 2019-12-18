<?php
session_start();
use Controller\User;
use Controller\UserManager;
if(isset($_SESSION['username'])){
    echo "<script>alert('ban da dang nhap')</script>";
    echo "<script>window.location = '../index.php'</script>";
}

if($_SERVER['REQUEST_METHOD']  === 'POST'){

    include_once "../class/Manager.php";
    include_once "../class/UserManager.php";
    include_once "../class/User.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $level = 'Member';
    
    $pathFile = "../user.json";

    $user = new User($username, $password, $email, $level);
    $userManager = new UserManager($pathFile);
    $userManager->add($user);
    header("Location: ../index.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Đăng ký</h1>
            <form method="POST">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>