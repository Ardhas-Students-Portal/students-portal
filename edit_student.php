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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
            <style>
                .error {
                    color: red;
                }
            </style>
        </head>
        <body>

        <div class="chead">
            <h2>Students Data</h2>
        </div>
        <button class="bi bi-list d-lg-none" type="button" data-bs-toggle="collapse" onclick="toggleSidebar()"></button>
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
                
                <a href="viewmarks.php" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary">Update Marks</button>
            </form>
        </div>
        
        <script>
            // jQuery validation script
            $(document).ready(function () {
                $('#updateForm').validate({
                    rules: {
                        tamil: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        english: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        hindi: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        maths: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        science: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        socialScience: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        }
                    },
                    messages: {
                        tamil: {
                            required: "Please enter marks for Tamil",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        },
                        english: {
                            required: "Please enter marks for English",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        },
                        hindi: {
                            required: "Please enter marks for Hindi",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        },
                        maths: {
                            required: "Please enter marks for Maths",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        },
                        science: {
                            required: "Please enter marks for Science",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        },
                        socialScience: {
                            required: "Please enter marks for Social Science",
                            number: "Please enter a valid number",
                            min: "Marks cannot be negative",
                        max: "Marks cannot be more than 100"
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.addClass('text-danger');
                        error.insertAfter(element);
                    }
                });

                // Calculate total marks and percentage on input change
                var marksInputs = $('.marks');
                marksInputs.on('input', function () {
                    var totalMarks = 0;
                    marksInputs.each(function () {
                        totalMarks += parseInt($(this).val()) || 0;
                    });
                    $('#totalMarks').val(totalMarks);

                    var totalPercentage = (totalMarks / (marksInputs.length * 100)) * 100;
                    $('#totalpercentage').val(totalPercentage.toFixed(2));
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
