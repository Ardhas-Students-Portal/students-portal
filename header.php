<?php
// if (!isset($_SESSION)) {
//     session_start();
// }

if (!$_SESSION['adminisloggedin']) {
    header('Location: home.php');
    exit();
}



$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Admin';
?>
<style>
    #nav{
        padding:18px
    }
</style>

<nav class="navbar navbar-expand-md w-100" style="background-color:black" id="nav">
    <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex justify-content-between d-md-none d-block">
            <a class="navbar-brand text-white" href="#">Navbar</a>
            <button class="btn px-1 py-0 open-btn text-white"><i class="bi bi-list"></i></button>
        </div>
        <div class="d-flex ms-auto align-items-center" style="color:white" id="nav">
            <i class="bi bi-person-circle pe-1"></i>
            <a class="nav-link active" aria-current="page" href="adminprofile.php" title="You can update the Profile">
                Hi <?php echo $name ?>
            </a>
        </div>
    </div>
</nav>
