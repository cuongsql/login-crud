<?php
session_start();
use Controller\Employee;
use Controller\EmployeeManager;
session_start();

if($_SESSION['username'] !== "admin"){
    echo "<script>alert('ban khong co quyen')</script>";
    echo "<script>window.location = '../index.php'</script>";
}

if($_SERVER['REQUEST_METHOD']  === 'POST'){

    include_once "../class/Employee.php";
    include_once "../class/EmployeeManager.php";

    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $position = $_POST['position'];

    if(isset($_FILES['img'])){
        $errors= array();
        $img = date("Y-m-d-").$_FILES['img']['name'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
        $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions) == false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         $img = '/person.jpg';
      }  
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$img);
      }else{
         print_r($errors);
      }
    }

    $pathFile = "../data.json";

    $employee = new Employee($img, $name, $birthday, $address, $position);
    $employeeManager = new EmployeeManager($pathFile);
    $employeeManager->add($employee);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>Chức vụ</label>
                            <input type="text" class="form-control" name="position">
                        </div>
                        <label>Avatar</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</html>