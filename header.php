<?php
$userid = $_SESSION['userid'];
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
include('dbconnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "Select * from user where Userid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    $sql = "Update user set userid = ?, name = ?,  email = ?, phone = ?  where Userid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issss", $userid, $name, $email, $phone, $userid);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;

        $_SESSION['error-message'] = 'Profile Updated Successfully!';
        header('Location: admincontent.php');
    } else {
        echo "Error while updating the data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARDHAS SCHOOL</title>
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
                <a class="nav-link active" aria-current="page" href="adminprofile.php" title="You can update the Profile">
                    Hi <?php echo $name ?>
                </a>
            </div>
        </div>
    </nav>
</body>

</html>
	