<?php
session_start();
include('dbconnect.php');
echo $_SESSION['teacher'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNo = intval($_POST['rollNo']);
    $name = $_POST['name'];
    $class = $_POST['class'];
    $exam = $_POST['exam'];
    $tamil = intval($_POST['tamil']);
    $english = intval($_POST['english']);
    $hindi = intval($_POST['hindi']);
    $maths = intval($_POST['maths']);
    $science = intval($_POST['science']);
    $socialScience = intval($_POST['socialScience']);
    $totalMarks = intval($_POST['totalMarks']);
    $totalpercentage = intval($_POST['totalpercentage']);
    $teacher = ($_POST['teacher']);

    // Check if marks for the same exam already exist for the student
    $checkQuery = "SELECT * FROM student_marks WHERE roll_no = ? AND exam = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("is", $rollNo, $exam);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Marks for the same exam already exist, notify the teacher
        echo "<script>alert('Marks for the selected exam already exist for this student. You can only update the marks by clicking view& edit page.'); window.location.href = 'teacherindex.php?rollNo=$rollNo&name=$name';</script>";
    } else {
        // Insert new marks
        $stmt = $conn->prepare("INSERT INTO student_marks (roll_no, name, class, exam, tamil, english, hindi, maths, science, social_science, total_marks, totalpercentage,teacher) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssiiiiiiiis", $rollNo, $name, $class, $exam, $tamil, $english, $hindi, $maths, $science, $socialScience, $totalMarks, $totalpercentage, $teacher);

        if ($stmt->execute()) {
            $_SESSION['rollNo'] = $rollNo;
            $_SESSION['name'] = $name;
            
            header("Location: success.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
}

$conn->close();
?>
