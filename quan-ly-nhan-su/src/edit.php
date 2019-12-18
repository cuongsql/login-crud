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
    $pathFile = "../data.json";

    $listEmployee = new EmployeeManager($pathFile);
    $employee = $listEmployee->getList();   
    $index = (int)$_GET['index'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $listEmployee->edit($index);
    header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="editName" value="<?php echo $employee[$index]->name; ?>">
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" class="form-control" name="editBirthday" value="<?php echo $employee[$index]->birthday; ?>">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="editAddress" value="<?php echo $employee[$index]->address; ?>">
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <input type="text" class="form-control" name="editPosition" value="<?php echo $employee[$index]->position; ?>">
                </div>
                <div class="form-group">
                <label><img onClick="triggerClick()" id="Display" src="images/<?php echo $employee[$index]->img; ?>" class="photo"></label>
                <input type="file" class="form-control" name="editImg" onChange="displayImage(this)" id="idImage">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
function triggerClick(e) {
    document.querySelector('#idImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#Display').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>