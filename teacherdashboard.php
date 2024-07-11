<?php 
// session_start();
$teacher = $_SESSION['teacher'];
if(!$_SESSION['teacherisloggedin']){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/adminstyle.css">
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="d-flex justify-content-center">
                <img src="https://img.freepik.com/premium-vector/school-girl-cartoon-round-icon-vector-illustration-schoolgirl-glasses_1142-66572.jpg" width="200px" class="rounded-circle p-3 align-self-center" alt="Teacher">
            </div>
            <div class="d-flex align-items-center justify-content-between justify-content-md-center px-2">
                <p class="text-white text-center fs-5 mb-2"><?php echo $teacher ?> Dashboard</p>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="bi bi-list fs-4"></i></button>
            </div>
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <ul class="list-unstyled px-2">
                <li class="<?= ($current_page == 'teacherindex.php') ? 'active' : '' ?>"> <a href="teacherindex.php" class="text-decoration-none py-2 px-3 d-block"><i class="bi bi-people-fill"></i> View Students</a>
                <!-- <li class="<?= ($current_page == 'addmarks.php') ? 'active' : '' ?>"> <a href="addmarks.php" class="text-decoration-none py-2 px-3 d-block"><i class="bi bi-plus-square-fill"></i> Add Student Mark</a> -->
                <li class="<?= ($current_page == 'viewmarks.php') ? 'active' : '' ?>"><a href="viewmarks.php" class="text-decoration-none py-2 px-3 d-block"><i class="bi bi-eye-fill"></i> View & Edit Marks</a>
                <!-- <li class="<?= ($current_page == 'viewmarks.php') ? 'active' : '' ?>"><a href="viewmarks.php" class="text-decoration-none py-2 px-3 d-block"><i class="bi bi-pencil-fill"></i> Update Student Mark</a> -->
                <li class="<?= ($current_page == 'logout.php') ? 'active' : '' ?>"><a href="logout.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-box-arrow-right pe-2"></i>Log out</a></li>
            </ul>
            <hr class="h-color mx-2">
        </div>
        <div class="content p-4">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar ul li').on('click', function() {
                $('.sidebar ul li.active').removeClass('active');
                $(this).addClass('active');
            });
            $('.open-btn').on('click', function() {
                $('.sidebar').addClass('active');
            });
            $('.close-btn').on('click', function() {
                $('.sidebar').removeClass('active');
            });
        });
    </script>
</body>

</html>