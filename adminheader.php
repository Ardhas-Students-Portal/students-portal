<?php 
$name=$_SESSION['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminheader</title>
    <style>
        #nav{
            background-color: black;
            padding: 25px;
        }
        #cent{
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md  w-100" id="nav">
        <div class="container-fluid d-flex justify-content-between">
            <div class="d-flex justify-content-between d-md-none d-block">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="btn px-1 py-0 open-btn"><i class="bi bi-list"></i></button>
            </div>
            <div class="d-flex ms-auto align-items-center" id="cent">
                <i class="bi bi-person-circle pe-1"></i>
                <a class="nav-link active" aria-current="page" href="adminprofile.php" title="You can update the Profile">
                    Hi <?php echo $name; ?>
                </a>
            </div>
        </div>
    </nav>
</body>

</html>
	