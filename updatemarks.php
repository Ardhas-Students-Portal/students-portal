<?php
$conn = new mysqli("localhost", "root", "", "ardhas_student_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $tamil = $_POST['tamil'];
    $english = $_POST['english'];
    $hindi = $_POST['hindi'];
    $maths = $_POST['maths'];
    $science = $_POST['science'];
    $socialScience = $_POST['socialScience'];
    $totalMarks = ($_POST['totalMarks']);
    $totalpercentage = $_POST['totalpercentage'];


    // Update query
    $sql = "UPDATE student_marks SET tamil='$tamil', english='$english', hindi='$hindi', maths='$maths', science='$science', social_science='$socialScience', total_marks='$totalMarks', totalpercentage= '$totalpercentage' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: viewmarks.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
