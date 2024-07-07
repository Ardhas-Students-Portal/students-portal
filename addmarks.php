<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Entry Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <style>
        .row > .col-md-6 {
            padding-bottom: 15px;
        }
        .chead {
    background-color: blue;
    color: white;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
  }
    </style>
</head>
<body>
<div class="chead">
<h2>Student Mark Entry Form</h2>
  </div>
    <div class="container mt-5">
        
        <form id="markEntryForm" action="studentmark.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rollNo">Roll Number</label>
                    <input type="text" class="form-control" id="rollNo" name="rollNo" required pattern="\d+">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Student Name</label>
                    <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z\s]+">
                </div>
            </div>
            <div class="form-group">
                <label for="class">Exam</label>
                <select class="form-control" id="class" name="class" required>
                    <option value="">Select Exam</option>
                    <option value="Quarterly Exam">Quarterly Exam</option>
                    <option value="Halfyearly Exam">Halfyearly Exam</option>
                    <option value="Annual Exam">Annual Exam</option>
                    
                </select>
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
            <div class="form-group">
                <label for="totalMarks">Total Marks</label>
                <input type="number" class="form-control" id="totalMarks" name="totalMarks" readonly>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

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
                    class: "required",
                    tamil: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    english: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    hindi: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    maths: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    science: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    socialScience: {
                        required: true,
                        number: true,
                        min: 0
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
                    tamil: {
                        required: "Please enter marks for Tamil",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
                    },
                    english: {
                        required: "Please enter marks for English",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
                    },
                    hindi: {
                        required: "Please enter marks for Hindi",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
                    },
                    maths: {
                        required: "Please enter marks for Maths",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
                    },
                    science: {
                        required: "Please enter marks for Science",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
                    },
                    socialScience: {
                        required: "Please enter marks for Social Science",
                        number: "Please enter a valid number",
                        min: "Marks cannot be negative"
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
            }

            $('.subject-mark').on('input', function() {
                calculateTotal();
            });
        });
    </script>
</body>
</html>
