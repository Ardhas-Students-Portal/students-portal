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
    <style></style>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
        <div class="content flex-grow-1">
            <?php include('header.php') ?>
            <?php include('add_teacher.php') ?>
        </div>
    </div>
</body>
</html>