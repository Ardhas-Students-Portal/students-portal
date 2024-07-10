<?php
include('dbconnect.php');

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$registernumber = isset($_POST["registernumber"]) ? $_POST["registernumber"] : "";
$password = isset($_POST["createpassword"]) ? $_POST["createpassword"] : "";
$class = isset($_POST["class"]) ? $_POST["class"] : "";
$dateofbirth = isset($_POST["dateofbirth"]) ? $_POST["dateofbirth"] : "";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
$teacher = isset($_POST["teacher"]) ? $_POST["teacher"] : "";
$parentnumber = isset($_POST["parentnumber"]) ? $_POST["parentnumber"] : "";
$alternatenumber = isset($_POST["alternatenumber"]) ? $_POST["alternatenumber"] : "";
$address = isset($_POST["address"]) ? $_POST["address"] : "";

if (!empty($name) && !empty($registernumber) && !empty($password) && !empty($class) && !empty($dateofbirth) && !empty($gender) && !empty($teacher) && !empty($parentnumber) && !empty($alternatenumber) && !empty($address)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO studentdata (name, registernumber, password, class, dateofbirth, gender, teacher, parentnumber, alternatenumber, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $name, $registernumber, $hashed_password, $class, $dateofbirth, $gender, $teacher, $parentnumber, $alternatenumber, $address);

    if ($stmt->execute()) {
        $sql = "INSERT INTO user (Userid, Password, Role) VALUES (?, ?, 'student')";
        $stmt1 = $conn->prepare($sql);
        $stmt1->bind_param("is", $registernumber, $hashed_password);

        if ($stmt1->execute()) {
            echo "<script>document.getElementById('confirmationMessage').style.display = 'block';</script>";
        } else {
            echo "Error inserting into user table: " . $stmt1->error;
        }

        $stmt1->close();
    } else {
        echo "Error inserting into studentdata table: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Student Registration</title>
    <style>
        @media (max-width: 768px) {
            .student {
                margin-top: 20px;
            }

            #form {
                margin: 20px 10px;
            }

            #top h1 {
                font-size: 24px;
                text-align: center;
            }

            #form {
                margin: 10px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                font-size: 14px;
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            #top {
                align-items: center;
                text-align: center;
            }

            #top h1 {
                font-size: 16px !important;
                margin-top: 10px;
            }
        }

        body {
            background-color: #f8f9fa;
        }

        #top {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: white;
            height: 115px;
            padding-left: 30px;
            gap: 65px;

        }

        #top img {
            height: 90px;
        }

        #top h1 {
            color: #003366;
            font-size: 28px;
            text-align: center;
        }

        .student {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 50px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 7px;
        }

        .student-img img {
            width: 100%;
            height: auto;
            border-radius: 7px;
        }

        p {
            padding: 0px 15px;
            font-size: 15px;
            color: #003366;
        }

        #form {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            padding: 20px;
            margin: 20px 20px;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            font-size: 28px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            display: none;
        }
        html, body {
    height: 100%;
}

body {
    background: #eee;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.main-container {
    display: flex;
    flex: 1 0 auto;
}

#side_nav {
    background: #000;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s;
    /* overflow-y: auto; */
    /* flex-shrink: 0; */
}

hr.h-color {
    background: #eee;
}

.sidebar li.active {
    background: #eee;
    border-radius: 8px;
}

.sidebar li.active a,
.sidebar li.active a:hover {
    color: #000;
}

.sidebar li a {
    color: #fff;
    display: block;
}

@media (max-width: 767px) {
    #side_nav {
        margin-left: -250px;
        position: fixed;
        min-height: 100vh;
        z-index: 1;
        color: white;
    }
    #side_nav.active {
        margin-left: 0;
    }
}

    </style>
</head>

<body>
    <!-- <div class="top" id="top">
        <img src="./assets/images/ardhas_technology_logo.jpeg" alt="logo">
        <h1>Admin Portal - Secure Student Registration</h1>
    </div> -->
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
    <div class="content flex-grow-1">
    <?php include('header.php') ?>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="student">
                        <div class="student-img p-3">
                            <img src="./assets/images/students-image.webp" alt="studentsimg">
                        </div>
                        <div class="student-imginfo">
                            <p><strong>Welcome!</strong> Please complete the student registration form on the right. Admins are requested to provide accurate information to ensure smooth processing of the registration. <strong>Thank you!</strong><br>
                            <span id="info">Accurate student registration helps us better serve our community. We eagerly anticipate welcoming new students!</span>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="form">
                        <h2>Student Registration</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                <div class="error-message" id="name-error">Please enter a valid name.</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="registernumber">Register Number</label>
                                <input type="text" class="form-control" id="registernumber" name="registernumber" placeholder="Enter your Reg Number">
                                <div class="error-message" id="registernumber-error">Please enter a valid register number.</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="createpassword">Create Password</label>
                                <input type="password" class="form-control" id="createpassword" name="createpassword" placeholder="Enter your Password">
                                <div class="error-message" id="createpassword-error">Please enter a valid password.</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Re-Enter your password">
                                <div class="error-message" id="confirmpassword-error">Passwords do not match.</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="class">Class</label>
                                <input type="text" class="form-control" id="class" name="class" placeholder="Enter your class">
                                <div class="error-message" id="class-error">Please enter a valid class name.</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dateofbirth">Date of Birth</label>
                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
                                <div class="error-message" id="dateofbirth-error">Please enter a valid date of birth</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="error-message" id="gender-error">Please select a gender</div>
                        </div>
                        <div class="form-group">
                            <label for="teacher">Assign Teacher</label>
                            <select class="form-control" id="teacher" name="teacher">
                                <option value="select">Select Teacher</option>
                                <option value="Bharani">Bharani</option>
                                <option value="Dhanush">Dhanush</option>
                            </select>
                            <div class="error-message" id="teacher-error">Please select the teacher</div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="parentnumber">Parent Number</label>
                                <input type="text" class="form-control" id="parentnumber" name="parentnumber" placeholder="Enter your 10 Digit Number">
                                <div class="error-message" id="parentnumber-error">Please enter a valid parent number.</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alternatenumber">Alternate Number</label>
                                <input type="text" class="form-control" id="alternatenumber" name="alternatenumber" placeholder="Enter Alternate number">
                                <div class="error-message" id="alternatenumber-error">Please enter a valid alternate number.</div>
                                <div class="error-message" id="phone-unique-error">Parent number and alternate number cannot be the same.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address"></textarea>
                            <div class="error-message" id="address-error">Please enter a valid address.</div>
                        </div>
                        <button class="btn btn-primary mt-3 btn-block" id="btn">SUBMIT</button>
                        <div id="confirmationMessage" class="mt-3" style="display: none;">
                            <div class="alert alert-success" role="alert">
                                Form submitted successfully!
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn').click(function(e) {
                e.preventDefault();
                var isValid = true;
                var name = $('#name').val();
                var registernumber = $('#registernumber').val();
                var createpassword = $('#createpassword').val();
                var confirmpassword = $('#confirmpassword').val();
                var classname = $('#class').val();
                var dateofbirth = $('#dateofbirth').val();
                var gender = $('input[name="gender"]:checked').val();
                var teacher = $('#teacher').val();
                var parentnumber = $('#parentnumber').val();
                var alternatenumber = $('#alternatenumber').val();
                var address = $('#address').val();

                function isValidName(name) {
                    return /^[a-zA-Z]/.test(name);
                }

                function isvalidNumber(registernumber) {
                    return /^[0-9]+$/.test(registernumber);
                }

                function isValidPassword(createpassword) {
                    return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/.test(createpassword);
                }

                function isValidPhone(phone) {
                    return phone.length === 10 && !isNaN(phone) && ['9', '8', '7', '6'].includes(phone.charAt(0));
                }

                function isvalidAddress(address) {
                    return address.length >= 10 && address.length <= 400;
                }

                function isValidClassname(classname) {
                    return /^[a-zA-Z0-9 ]+$/.test(classname);
                }

                function isValidDOB(dateofbirth) {
                    var today = new Date();
                    var dob = new Date(dateofbirth);
                    return dob.getFullYear() <= (today.getFullYear() - 6);
                }

                if (!isValidName(name)) {
                    $('#name-error').show();
                    isValid = false;
                } else {
                    $('#name-error').hide();
                }

                if (!isvalidNumber(registernumber)) {
                    $('#registernumber-error').show();
                    isValid = false;
                } else {
                    $('#registernumber-error').hide();
                }

                if (!isValidPassword(createpassword)) {
                    $('#createpassword-error').show();
                    isValid = false;
                } else {
                    $('#createpassword-error').hide();
                }

                if (createpassword !== confirmpassword) {
                    $('#confirmpassword-error').show();
                    isValid = false;
                } else {
                    $('#confirmpassword-error').hide();
                }

                if (!isValidClassname(classname)) {
                    $('#class-error').show();
                    isValid = false;
                } else {
                    $('#class-error').hide();
                }

                if (!isValidDOB(dateofbirth)) {
                    $('#dateofbirth-error').show();
                    isValid = false;
                } else {
                    $('#dateofbirth-error').hide();
                }

                if (!gender) {
                    $('#gender-error').show();
                    isValid = false;
                } else {
                    $('#gender-error').hide();
                }

                if (teacher === "select") {
                    $('#teacher-error').show();
                    isValid = false;
                } else {
                    $('#teacher-error').hide();
                }

                if (!isValidPhone(parentnumber)) {
                    $('#parentnumber-error').show();
                    isValid = false;
                } else {
                    $('#parentnumber-error').hide();
                }

                if (!isValidPhone(alternatenumber)) {
                    $('#alternatenumber-error').show();
                    isValid = false;
                } else {
                    $('#alternatenumber-error').hide();
                }

                if (parentnumber === alternatenumber) {
                    $('#phone-unique-error').show();
                    isValid = false;
                } else {
                    $('#phone-unique-error').hide();
                }

                if (!isvalidAddress(address)) {
                    $('#address-error').show();
                    isValid = false;
                } else {
                    $('#address-error').hide();
                }

                if (isValid) {
                    $('form').submit();
                    $('#confirmationMessage').show();
                }
                setTimeout(function() {
                    $('#confirmationMessage').hide();
                    $('#main')[0].reset();
                    $('#fileList').empty();
                }, 6500);
            });
        });
    </script>
</body>

</html>