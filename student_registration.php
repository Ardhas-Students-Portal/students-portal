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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                            <span id="info">Accurate student registration helps us better serve our community. We eagerly anticipate welcoming new students!</span></p>
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
                                <div class="input-group">
                                    <input type="password" class="form-control" id="createpassword" name="createpassword" placeholder="Enter your Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bi bi-eye-slash" id="createpassword-icon" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="error-message" id="createpassword-error">Please enter a valid password.</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmpassword">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm your Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="bi bi-eye-slash" id="confirmpassword-icon" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="error-message" id="confirmpassword-error">Passwords do not match.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" id="class" name="class" placeholder="Enter your Class">
                            <div class="error-message" id="class-error">Please enter a valid class.</div>
                        </div>
                        <div class="form-group">
                            <label for="dateofbirth">Date of Birth</label>
                            <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="Enter your Date of Birth">
                            <div class="error-message" id="dateofbirth-error">Please enter a valid date of birth.</div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="error-message" id="gender-error">Please select your gender.</div>
                        </div>
                        <div class="form-group">
                            <label for="teacher">Assigned Teacher</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" placeholder="Enter the Assigned Teacher's Name">
                            <div class="error-message" id="teacher-error">Please enter a valid teacher name.</div>
                        </div>
                        <div class="form-group">
                            <label for="parentnumber">Parent Number</label>
                            <input type="text" class="form-control" id="parentnumber" name="parentnumber" placeholder="Enter Parent Number">
                            <div class="error-message" id="parentnumber-error">Please enter a valid parent number.</div>
                        </div>
                        <div class="form-group">
                            <label for="alternatenumber">Alternate Number</label>
                            <input type="text" class="form-control" id="alternatenumber" name="alternatenumber" placeholder="Enter Alternate Number">
                            <div class="error-message" id="alternatenumber-error">Please enter a valid alternate number.</div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your Address"></textarea>
                            <div class="error-message" id="address-error">Please enter a valid address.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <div id="confirmationMessage" style="display:none;">Form submitted successfully!</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#createpassword-icon').on('click', function() {
                var passwordInput = $('#createpassword');
                var icon = $(this);
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                }
            });

            $('#confirmpassword-icon').on('click', function() {
                var passwordInput = $('#confirmpassword');
                var icon = $(this);
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                }
            });

            $('#form').on('submit', function(event) {
                var valid = true;

                var name = $('#name').val();
                if (!name) {
                    $('#name-error').show();
                    valid = false;
                } else {
                    $('#name-error').hide();
                }

                var registernumber = $('#registernumber').val();
                if (!registernumber) {
                    $('#registernumber-error').show();
                    valid = false;
                } else {
                    $('#registernumber-error').hide();
                }

                var createpassword = $('#createpassword').val();
                if (!createpassword) {
                    $('#createpassword-error').show();
                    valid = false;
                } else {
                    $('#createpassword-error').hide();
                }

                var confirmpassword = $('#confirmpassword').val();
                if (createpassword !== confirmpassword) {
                    $('#confirmpassword-error').show();
                    valid = false;
                } else {
                    $('#confirmpassword-error').hide();
                }

                var studentClass = $('#class').val();
                if (!studentClass) {
                    $('#class-error').show();
                    valid = false;
                } else {
                    $('#class-error').hide();
                }

                var dateofbirth = $('#dateofbirth').val();
                if (!dateofbirth) {
                    $('#dateofbirth-error').show();
                    valid = false;
                } else {
                    $('#dateofbirth-error').hide();
                }

                var gender = $('#gender').val();
                if (!gender) {
                    $('#gender-error').show();
                    valid = false;
                } else {
                    $('#gender-error').hide();
                }

                var teacher = $('#teacher').val();
                if (!teacher) {
                    $('#teacher-error').show();
                    valid = false;
                } else {
                    $('#teacher-error').hide();
                }

                var parentnumber = $('#parentnumber').val();
                if (!parentnumber) {
                    $('#parentnumber-error').show();
                    valid = false;
                } else {
                    $('#parentnumber-error').hide();
                }

                var alternatenumber = $('#alternatenumber').val();
                if (!alternatenumber) {
                    $('#alternatenumber-error').show();
                    valid = false;
                } else {
                    $('#alternatenumber-error').hide();
                }

                var address = $('#address').val();
                if (!address) {
                    $('#address-error').show();
                    valid = false;
                } else {
                    $('#address-error').hide();
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
