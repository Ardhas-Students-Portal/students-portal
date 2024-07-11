<?php 
session_start();
if (!$_SESSION['adminisloggedin']) {
    header('Location: home.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/adminstyle.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-body {
            margin: 10px;
            padding: 0px 10px;
        }
        p {
            font-size: 13px;
        }
        #btn:hover {
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
        <div class="content flex-grow-1">
            <?php include('header.php') ?>
            <div class="container d-flex gap-3 flex-wrap justify-content-center mt-5 mx-3 justify-content-md-start">
                <div class="card" style="width: 20rem;">
                    <img src="./images/Data_security_05.jpg" class="card-img-top" alt="registration image" width="200" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Teacher Registration</h5>
                        <p class="card-text">Please press the below button to register the teacher.</p>
                        <div class="d-flex">
                            <a href="teacher_register.php" class="btn btn-primary" id="btn">Register</a>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="./images/Data_security_05.jpg" class="card-img-top" alt="registration image" width="200" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Student Registration</h5>
                        <p class="card-text">Please press the below button to register the Student</p>
                        <div class="d-flex">
                            <a href="student_registration.php" class="btn btn-primary" id="btn">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
