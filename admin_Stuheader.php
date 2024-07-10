<?php 
$teacher = $_SESSION['teacher'];
if(!isset($_SESSION['userid'])){
    header('Location: Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #nav{
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md w-100" style="background-color:black">
        <div class="container-fluid d-flex justify-content-between">
            <div class="d-flex justify-content-between d-md-none d-block">
                <a class="navbar-brand text-white" href="#">Navbar</a>
                <button class="btn px-1 py-0 open-btn text-white"><i class="bi bi-list"></i></button>
            </div>
            <div class="d-flex ms-auto align-items-center" style="color:white" id="nav">
                <i class="bi bi-person-circle pe-1"></i>
                <a class="nav-link active" aria-current="page" href="" title="You can update the Profile">
                    Hi <?php echo $teacher ?>
                </a>
            </div>
        </div>
    </nav>
</body>

</html>
	