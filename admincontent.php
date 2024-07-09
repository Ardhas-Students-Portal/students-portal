<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/adminstyle.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
        <div class="content flex-grow-1">
            <?php include('adminheader.php') ?>
            <div class="container d-flex gap-3 flex-wrap justify-content-center mt-5 justify-content-md-start   ">
                <div class="card" style="width: 20rem;">
                    <img src="./images/Data_security_05.jpg" class="card-img-top" alt="registraion image" width="200" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Teacher Registration</h5>
                        <p class="card-text">Please press the below button to register the teacher.</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="teacher_register.php" class="btn btn-primary">Register</a>
                        </div>
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="./images/Data_security_05.jpg" class="card-img-top" alt="registration image" width="200" height="250">
                    <div class="card-body">
                        <h5 class="card-title">Student Registration</h5>
                        <p class="card-text">Please press the below button to register the Student</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="student_registration.php" class="btn btn-primary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
