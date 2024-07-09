<?php
include('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM student_marks WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Student Marks</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="sidebar">
    <div class="teacher-info">
      <img src="https://img.freepik.com/premium-vector/school-girl-cartoon-round-icon-vector-illustration-schoolgirl-glasses_1142-66572.jpg" alt="Teacher">
      <div>Bharathi Dashboard</div>
    </div>
    <nav class="nav flex-column">
      <a href="#view-students"><i class="bi bi-people-fill"></i> View Students</a>
      <a href="addmarks.php"><i class="bi bi-plus-square-fill"></i> Add Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-eye-fill"></i> View Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-pencil-fill"></i> Update Student Mark</a>
    </nav>
  </div>
  <div class="chead">
    <h2>Students Data</h2>
  </div>
  <button class="bi bi-list d-lg-none" type="button" data-bs-toggle="collapse" onclick="toggleSidebar()" ></button>
            <div class="container mt-5">
                <form action="updatemarks.php" method="post" id="updateForm">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="rollNo">Roll Number</label>
                        <input type="text" class="form-control" id="rollNo" name="rollNo" value="<?php echo $row['roll_no']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exam">Exam</label>
                        <input type="text" class="form-control" id="exam" name="exam" value="<?php echo $row['exam']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" class="form-control" id="class" name="class" value="<?php echo $row['class']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tamil">Tamil</label>
                        <input type="number" class="form-control marks" id="tamil" name="tamil" value="<?php echo $row['tamil']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="english">English</label>
                        <input type="number" class="form-control marks" id="english" name="english" value="<?php echo $row['english']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="hindi">Hindi</label>
                        <input type="number" class="form-control marks" id="hindi" name="hindi" value="<?php echo $row['hindi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="maths">Maths</label>
                        <input type="number" class="form-control marks" id="maths" name="maths" value="<?php echo $row['maths']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="science">Science</label>
                        <input type="number" class="form-control marks" id="science" name="science" value="<?php echo $row['science']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="socialScience">Social Science</label>
                        <input type="number" class="form-control marks" id="socialScience" name="socialScience" value="<?php echo $row['social_science']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="totalMarks">Total Marks</label>
                        <input type="number" class="form-control" id="totalMarks" name="totalMarks" value="<?php echo $row['total_marks']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="totalpercentage">Total Percentage</label>
                        <input type="number" class="form-control" id="totalpercentage" name="totalpercentage" value="<?php echo $row['totalpercentage']; ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Marks</button>
                </form>
            </div>

            <script>
                // Calculate total marks and percentage on input change
                document.addEventListener('DOMContentLoaded', function () {
                    var marksInputs = document.querySelectorAll('.marks');
                    marksInputs.forEach(function (input) {
                        input.addEventListener('input', function () {
                            var totalMarks = 0;
                            marksInputs.forEach(function (input) {
                                totalMarks += parseInt(input.value) || 0;
                            });
                            document.getElementById('totalMarks').value = totalMarks;

                            var totalpercentage = (totalMarks / (marksInputs.length * 100)) * 100;
                            document.getElementById('totalpercentage').value = totalpercentage.toFixed(2);
                        });
                    });
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Student record not found.";
    }
}

$conn->close();
?>