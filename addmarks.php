<?php
session_start();
// echo $_SESSION['teacher'];
$rollNo = isset($_GET['rollNo']) ? $_GET['rollNo'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$teacher = isset($_GET['teacher']) ? $_GET['teacher'] : ''; 
$class = isset($_GET['class']) ? $_GET['class'] : ''; 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markentryform</title>
    <link rel="stylesheet" href="./assets/adminstyle.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="main-container">
        <div class="sidebar" id="side_nav">
            <?php include('teacherdashboard.php'); ?>
        </div>
        <div class="content flex-grow-1 ">
            <?php include('admin_Stuheader.php'); ?>

            <div class="d-flex justify-content-center py-3">
                <form id="markEntryForm" action="studentmark.php" method="post" class="col-md-10 col-8">
                    <div class="text-center pb-5 fs-3 text">Add Students mark</div>
                    <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rollNo">Roll Number</label>
                    <input type="text" class="form-control" id="rollNo" name="rollNo" value="<?php echo htmlspecialchars($rollNo); ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>
                </div>
               
                <div class="form-group col-md-12">
                    <label for="teacher">Teacher</label>
                    <input type="text" class="form-control" id="teacher" name="teacher" value="<?php echo htmlspecialchars($teacher); ?>" readonly>
               
                </div>
            </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exam">Exam</label>
                            <select class="form-control" id="exam" name="exam" required>
                                <option value="">Select Exam</option>
                                <option value="Quarterly Exam">Quarterly Exam</option>
                                <option value="Halfyearly Exam">Halfyearly Exam</option>
                                <option value="Annual Exam">Annual Exam</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="class">Select Class</label>
                            <input type="text" class="form-control" id="class" name="class" value="<?php echo htmlspecialchars($class); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tamil">Tamil</label>
                            <input type="number" class="form-control subject-mark" id="tamil" name="tamil" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="english">English</label>
                            <input type="number" class="form-control subject-mark" id="english" name="english" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="hindi">Hindi</label>
                            <input type="number" class="form-control subject-mark" id="hindi" name="hindi" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="maths">Maths</label>
                            <input type="number" class="form-control subject-mark" id="maths" name="maths" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="science">Science</label>
                            <input type="number" class="form-control subject-mark" id="science" name="science" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="socialScience">Social Science</label>
                            <input type="number" class="form-control subject-mark" id="socialScience" name="socialScience" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="totalMarks">Total Marks</label>
                            <input type="number" class="form-control" id="totalMarks" name="totalMarks" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="totalpercentage">Total Percentage</label>
                            <input type="number" class="form-control" id="totalpercentage" name="totalpercentage" readonly>

                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Custom validation method for alphabets and spaces only
            $.validator.addMethod("alpha", function(value, element) {
                return this.optional(element) || /^[A-Za-z\s]+$/.test(value);
            }, "Please enter only alphabets and spaces");

            $('#markEntryForm').validate({
                rules: {
                    rollNo: {
                        required: true,
                        digits: true
                    },
                    name: {
                        required: true,
                        alpha: true
                    },
                    exam: "required",
                    class: "required",
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
                    rollNo: {
                        required: "Please enter roll number",
                        digits: "Please enter only digits"
                    },
                    name: {
                        required: "Please enter student name",
                        alpha: "Please enter only alphabets and spaces"
                    },
                    class: "Please select a class",
                    exam: "Please select a exam",
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
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            });

            function calculateTotal() {
            let total = 0;
            $('.subject-mark').each(function() {
                let value = $(this).val();
                total += parseFloat(value) || 0;
            });
            $('#totalMarks').val(total);
            let percentage = (total / 600) * 100;
            $('#totalpercentage').val(percentage.toFixed(2));
        }

        $('.subject-mark').on('input', function() {
            calculateTotal();
        });
    });
    
    </script>
</body>

</html>