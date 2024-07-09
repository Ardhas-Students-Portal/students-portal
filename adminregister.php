<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Registration Form</title>
    <style>
      .container {
        height: 100vh;
      }
      .form-container {
        width: 400px;
        padding: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center">
      <form
        method="post"
        action="adminregister.php"
        class="border bg-light form-container"
      >
      <div class="mb-3">
        <label for="exampleInputUsername" class="form-label"
          >Username</label
        >
        <input
          type="text"
          class="form-control"
          id="exampleInputUsername"
          aria-describedby="emailHelp"
          name="username"
          required
        />
      </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="password"
          />
        </div>
        <div class="d-flex justify-content-center align-items-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

<?php 
include('dbconnect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $username = $_POST['username'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "Select * from user where Userid = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's' , $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
        echo "User already exists";
    }
    else {
        $insertsql = "INSERT INTO user (Userid, Password, Role) VALUES (?, ?, 'admin')";
        $stmt = mysqli_prepare($conn, $insertsql);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $hashed_password);
        if(mysqli_stmt_execute($stmt)){
            // Uncomment the line below to redirect to login page after successful registration
            // header('Location: login.php');
        } else {
            echo "Failed to insert";
        }
    }
}


?>
