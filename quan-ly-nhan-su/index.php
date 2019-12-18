<?php
session_start();

include_once "class/Employee.php";
include_once "class/EmployeeManager.php";

$employeeManager = new \Controller\EmployeeManager("data.json");
$employee = $employeeManager->getList();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 page-title mb-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VOZER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown  
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

            <h1>Human Manager</h1>
            <?php if($_SESSION['username'] == "admin"){ ?>
            <button type="button" class="btn btn-outline-primary"><a href="src/add.php">Create</a></button>
            <?php } if(!$_SESSION['username'] == ""){?>
            <button type="button" class="btn btn-outline-primary"><a href="src/logout.php">Logout</a></button>
            <button type="button" class="btn btn-warning">Xin chào: <strong><?php echo $_SESSION['username'] ?></strong></button>
            <?php } if($_SESSION['username'] == ''){?>
            <button type="button" class="btn btn-outline-primary"><a href="src/reg.php">Register</a></button>
            <button type="button" class="btn btn-outline-primary"><a href="src/login.php">Login</a></button>
            <?php } ?>
        </div>
        <div class="col-12 col-md-12">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Images</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Position</th>
                    <?php if($_SESSION['username'] == "admin"){ ?>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($employee as $key => $employee):?>
                    <tr>
                    <th scope="row"><?php echo $key + 1 ?></th>
                    <td><img src="src/images/<?php echo $employee->img ?>" class="photo"></td>
                    <td><?php echo $employee->name ?></td>
                    <td><?php echo date('d/m/Y', strtotime($employee->birthday)) ?></td>
                    <td><?php echo $employee->address ?></td>
                    <td><?php echo $employee->position ?></td>
                    <?php if($_SESSION['username'] == "admin"){ ?>
                    <td><a href="src/delete.php?index=<?php echo $key ?>" onclick="return confirm('Ban chac chan muon xoa khong')" class="btn btn-danger">Delete</a></td>
                    <td><a href="src/edit.php?index=<?php echo $key ?>" class="btn btn-success">Edit</a></td>
                    <?php } ?>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>