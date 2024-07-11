<?php 
    include('dbconnect.php');
    include('functions.php'); 
    session_start();
    if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
        exit();
    }
    $userid = $_SESSION['userid'];
    $studentname = fetchStudentName($conn, $userid);
    if ($studentname) {
        $_SESSION['stu_name'] = $studentname;
    } else {
        $_SESSION['stu_name'] = 'Unknown';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/adminstyle.css">
</head>

<body><div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white rounded shadow px-2 me-2">Student Portal</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="bi bi-list"></i></button>
            </div>

            <?php
                $current_page = basename($_SERVER['PHP_SELF']);
            ?>

            <ul class="list-unstyled px-2">
                <li class="<?= ($current_page == 'studentdashboard.php') ? 'active' : '' ?>"><a href="studentdashboard.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-person-circle pe-2"></i>Profile</a></li>
                <li class="<?= ($current_page == 'student_header.php') ? 'active' : '' ?>"><a href="student_header.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-alt pe-2"></i>Marks</a></li>
                <li class="<?= ($current_page == 'logout.php') ? 'active' : '' ?>"><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-box-arrow-right pe-2"></i>Log out</a></li>
            </ul>
            </ul>
            <hr class="h-color mx-2">
        </div>
        <div class="content flex-grow-1">
        <nav class="navbar navbar-expand-md w-100" style="background-color:black" >
        <div class="container-fluid d-flex justify-content-between" style="padding:18px">
                <div class="d-flex justify-content-between d-md-none d-block">
                    <a class="navbar-brand text-white" href="#">Navbar</a>
                    <button class="btn px-1 py-0 open-btn text-white"><i class="bi bi-list"></i></button>
                </div>
                <div class="d-flex ms-auto align-items-center" style="color:white" id="nav">
                    <i class="bi bi-person-circle pe-1"></i>
                    <a class="nav-link active" aria-current="page" href="studentdashboard.php" title="">
                        Hi <?php echo $studentname ?> 
                    </a>
                </div>
            </div>
        </nav>
        <div class="container" id="container">
            <?php include 'student_profile.php'; ?>
        </div>
        </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar ul li').on('click', function() {
                $('.sidebar ul li.active').removeClass('active');
                $(this).addClass('active');
            });
            $('.open-btn').on('click', function(){
                $('.sidebar').addClass('active');
            });
            $('.close-btn').on('click', function(){
                $('.sidebar').removeClass('active');
            });
        });
    </script>
</body>

</html>
