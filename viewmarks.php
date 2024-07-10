<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viewmarks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/adminstyle.css" />

</head>

<body>
    <div class="main-container">
        <div class="sidebar" id="side_nav">
            <?php include('teacherdashboard.php'); ?>
        </div>
        <div class="content flex-grow-1">
            <?php include('admin_Stuheader.php'); ?>
            <div class="container mt-5 ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Roll Number</th>
                                <th>Name</th>
                                <th>Exam</th>
                                <th>Class</th>
                                <th>Tamil</th>
                                <th>English</th>
                                <th>Hindi</th>
                                <th>Maths</th>
                                <th>Science</th>
                                <th>Social Science</th>
                                <th>totalMarks</th>
                                <th>totalpercentage</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP code to fetch and display records -->
                            <?php
                            include('dbconnect.php');

                            $sql = "SELECT * FROM student_marks";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$row['roll_no']}</td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['exam']}</td>";
                                    echo "<td>{$row['class']}</td>";
                                    echo "<td>{$row['tamil']}</td>";
                                    echo "<td>{$row['english']}</td>";
                                    echo "<td>{$row['hindi']}</td>";
                                    echo "<td>{$row['maths']}</td>";
                                    echo "<td>{$row['science']}</td>";
                                    echo "<td>{$row['social_science']}</td>";
                                    echo "<td>{$row['total_marks']}</td>";
                                    echo "<td>{$row['totalpercentage']}</td>";
                                    echo "<td><a href='edit_student.php?id={$row['id']}' class='btn btn-secondary'>Edit</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No records found</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>