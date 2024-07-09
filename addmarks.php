<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Entry Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .row > .col-md-6 {
            padding-bottom: 15px;
        }
        
    </style>
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
                    <select class="form-control" id="class" name="class" required>
                        <option value="">Select Class</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
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

                </tbody>
            </table>
        </div>
    </div>
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
