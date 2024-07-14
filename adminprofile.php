<?php
session_start();
include('dbconnect.php');

if (!$_SESSION['adminisloggedin']) {
    header('Location: home.php');
    exit();
}
$userid = $_SESSION['userid'];
$sql = 'Select name, email, phone from `user` where Userid = ?';
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $userid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$userdata = mysqli_fetch_assoc($result);

$name = isset($userdata['name']) ? $userdata['name'] : "";
$email =  isset($userdata['email']) ? $userdata['email'] : "";
$phone = isset($userdata['phone']) ? $userdata['phone'] : "";

$_SESSION['name'] = $name;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE user SET name = ?, email = ?, phone = ? WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $phone, $userid);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['success-message'] = 'Profile Updated Successfully!';
        header('Location: admincontent.php');
        exit();
    } else {
        $error_message = "Error while updating the data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        h3 {
            text-align: center;
            font-size: 20px;
        }
        #form {
            padding: 30px;
            margin: 20px;
            background-color: white;
            width: 70%;
            border-radius: 8px;
        }
        #container {
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #submitbutton {
            margin-top: 10px;
            width: 50%;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
        <div class="content">
            <?php include('header.php'); ?>
            <div class="container" id="container">
                <form class="row d-flex justify-content-center" method="post" action="adminprofile.php" id="form">
                    <h3 class="text-center pt-3">Profile Update</h3>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label">UserId</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" disabled placeholder="userId" name="userid" value="<?php echo $userid ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2" class="form-label">Name</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Enter your name" name="name" value="<?php echo $name ?>">
                    </div>
                    <span class="error" id="nameError"></span>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" name="email" value="<?php echo $email ?>">
                    </div>
                    <span class="error" id="emailError"></span>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="phone number" name="phone" value="<?php echo $phone ?>">
                    </div>
                    <span class="error" id="phoneError"></span>
                    <div id="message" class="text-center text-success">
                        <?php
                        if (isset($_SESSION['success-message'])) {
                            echo '<p>' . $_SESSION['success-message'] . '</p>';
                            unset($_SESSION['success-message']);
                        }
                        if (isset($error_message)) {
                            echo '<p class="text-danger">' . $error_message . '</p>';
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitbutton">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelector('.open-btn').addEventListener('click', function() {
            document.getElementById('side_nav').classList.toggle('active');
        });
    </script>
</body>
</html>
