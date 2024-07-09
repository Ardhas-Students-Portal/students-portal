<?php
session_start();
include('dbconnect.php');

$userId = '';
$password = '';
$role = '';

if (isset($_COOKIE['userId']) && isset($_COOKIE['password'])) {
    $userId = $_COOKIE['userId'];
    $password = $_COOKIE['password'];
    $role = $_COOKIE['role'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['userid'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM user WHERE userId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['error-message'] = 'User does not exist';
        header('Location: login.php');
        exit();
    } else {
        $user = mysqli_fetch_assoc($result);
        if ($user['Userid'] == $userId && password_verify($password, $user['Password'])) {
            $_SESSION['role'] = $role;
            $_SESSION['userId'] = $userId;
            $role_db = $user['Role'];
            if ($role == $role_db) {
                if ($role == 'admin') {
                    if (isset($_POST['remember'])) {
                        setcookie('userId', $userId, time() + 86400, '/');
                        setcookie('password', $password, time() + 86400, '/');
                        setcookie('role', $role, time() + 86400, '/');
                    }
                    header("Location: admincontent.php?userid=$userId");
                } else if ($role == 'student') {
                    if (isset($_POST['remember'])) {
                        $_SESSION['userid'] = $userId;
                        setcookie('userId', $userId, time() + 86400, '/');
                        setcookie('password', $password, time() + 86400, '/');
                        setcookie('role', $role, time() + 86400, '/');
                    }
                    header("Location: studentdashboard.php?userid=$userId");
                } else {
                    if (isset($_POST['remember'])) {
                        // $_SESSION['userid'] = $userId;
                        setcookie('userId', $userId, time() + 86400, '/');
                        setcookie('password', $password, time() + 86400, '/');
                        setcookie('role', $role, time() + 86400, '/');
                    }
                    header("Location: teacherindex.php?userid=$userId");
                }
            } else {
               $_SESSION['error-message'] = 'Role mismatch';
               header('Location: login.php');
               exit();
            }
        } else {
            $_SESSION['error-message'] = 'Invalid userId or Password';
            header('Location: login.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'sans-serif';
            background: #ececec;
        }

        .message {
            display: none;
        }

        .error {
            color: red;
        }

        .error-input {
            border-color: red !important;
        }

        .iconuser {
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 col-10 col-sm-8 col-md-10">
        <div class="row border bg-white form-container rounded-4 p-4">
            <div class="col-md-6">
                <img src="./images/login-image2.jpg" class="img-fluid rounded-4 pt-3" width="500px" height="800px" alt="Ardhas Logo">
                <p class="text-center pt-3 fs-6 fs-md-4">Be Verified!</p>
                <p id="studentmessage" class="message text-center fs-6 fs-md-4 fs-lg-3">Welcome back, future leader! Log in to learn and grow.</p>
                <p id="adminmessage" class="message text-center fs-6 fs-md-4 fs-lg-3">Welcome, admin! Ready to make a difference?</p>
                <p id="teachermessage" class="message text-center fs-6 fs-md-4 fs-lg-3">Welcome back, educator! Ready to update and inspire?</p>

            </div>
            <div class="col-md-6">
                <h3 class="text-center">Hello, Again</h3>
                <p class="text-center">We are happy to be back!</p>
                <form id="loginForm" action="login.php" method="post">
                    <div class="position-relative">
                        <label for="exampleInputEmail1" class="form-label">User ID</label>
                        <input type="text" class="form-control chack" id="userid" name="userid" value="<?php echo $userId ?>" placeholder="Enter your User ID">
                        <div class="position-absolute top-50 iconuser"><i class="bi bi-person-circle chack1"></i></div>
                    </div>
                    <span class="error" id="userIdError"></span>
                    <div class="position-relative">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password ?>" placeholder="Enter your Password">
                        <div class="position-absolute top-50  iconuser" id="togglepassword"><i class="bi bi-eye-slash-fill"></i></div>
                    </div>
                    <span class="error" id="passwordError"></span>
                    <div>
                        <label class="form-label">Select Role</label>
                        <select class="form-select form-select mb-3" aria-label="Large select example" id="role-select" name="role">
                            <option value="admin" <?php echo ($role === 'admin') ? 'selected' : ''; ?>>Admin</option>
                            <option value="teacher" <?php echo ($role === 'teacher') ? 'selected' : ''; ?>>Teacher</option>
                            <option value="student" <?php echo ($role === 'student') ? 'selected' : ''; ?>>Student</option>                        </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div id="message" class="text-center text-danger fs-6">
                        <?php
                            if(isset($_SESSION['error-message'])){
                                echo '<p>' .$_SESSION['error-message'] . '</p>';
                                unset($_SESSION['error-message']);
                            }
                        ?>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" id="loginbutton">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/students-portal/loginscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>