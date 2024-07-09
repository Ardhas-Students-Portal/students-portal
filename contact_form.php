<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['firstname'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
