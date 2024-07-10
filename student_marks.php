<?php
// session_start(); 
include('dbconnect.php');
if (!isset($_SESSION['userid'])) {
    header('Location: home.php');
}
$id = $_SESSION['userid'];

$conn = new mysqli("localhost", "root", "", "studentdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student_marks WHERE roll_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <style>
        table, tr, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
   
<div class="container-fluid mt-1">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Exam</th>
                <th>Tamil</th>
                <th>English</th>
                <th>Hindi</th>
                <th>Maths</th>
                <th>Science</th>
                <th>Social</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['exam']}</td>
                            <td>{$row['tamil']}</td>
                            <td>{$row['english']}</td>
                            <td>{$row['hindi']}</td>
                            <td>{$row['maths']}</td>
                            <td>{$row['science']}</td>
                            <td>{$row['social_science']}</td>
                            <td>{$row['total_marks']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No data found</td></tr>";
            }
            
            $stmt->close();
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
