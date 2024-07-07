<?php
session_start();
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "ardhas_student_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNo = intval($_POST['rollNo']);
    $name = $_POST['name'];
    $class = $_POST['class'];
    $tamil = intval($_POST['tamil']);
    $english = intval($_POST['english']);
    $hindi = intval($_POST['hindi']);
    $maths = intval($_POST['maths']);
    $science = intval($_POST['science']);
    $socialScience = intval($_POST['socialScience']);
    $totalMarks = intval($_POST['totalMarks']);

    $stmt = $conn->prepare("INSERT INTO student_marks (roll_no, name, class, tamil, english, hindi, maths, science, social_science, total_marks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issiiiiiii", $rollNo, $name, $class, $tamil, $english, $hindi, $maths, $science, $socialScience, $totalMarks);

    if ($stmt->execute()) {
        $_SESSION['rollNo'] = $rollNo;
        $_SESSION['name'] = $name;
        setcookie("studentName", $name, time() + (86400 * 30), "/"); 
        header("Location: success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}


$conn->close();
?>
