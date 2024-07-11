 <?php
    include('dbconnect.php');
    

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['userid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $dob = $_POST['dob'];
        $phno = $_POST['phno'];
        $address = $_POST['address'];
        $subject = $_POST['subject'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO teachers(id, name,email,password,gender,qualification,dob,phno,address,subject) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $insert->bind_param("issssssiss", $id, $name, $email, $hashed_password, $gender, $qualification, $dob, $phno, $address, $subject);
        if ($insert->execute()) {
            $sql = "INSERT INTO user (Userid, Password, Role) VALUES (?, ?, 'teacher')";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bind_param("is", $id, $hashed_password);
            if ($stmt1->execute()) {
                echo "<script>alert('Registration successfull')</script>";
            } else {
                echo "Error inserting into user table: " . $stmt1->error;
            }
            $stmt1->close();
        } else {
            echo "error while inserting" . $conn->error;
        }
    }
    $conn->close();

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add Teacher</title>
     <!-- <link rel="stylesheet" href="nav.css"> -->
     <!-- <link rel="stylesheet" href="body.css"> -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
     <style>
         .form-container {
             background-color: transparent;
             padding: 20px;
             border-radius: 5px;
         }

         .form-header {
             margin-bottom: 20px;
         }
     </style>
 </head>

 <body>

     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12 ">
                 <div class="form-container">
                     <h2 class="form-header">Add Teacher</h2>
                     <form action=" " method="POST" id="form">
                         <div class="row gx-5">
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     <label for="name" class="form-label fw-bold">Full Name</label>
                                     <input type="text" name="name" placeholder="Enter Full Name" class="form-control" id="name">
                                     <div id="name-error"></div>
                                     <div id="name-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="email" class="form-label fw-bold">Email Address</label>
                                     <input type="email" name="email" placeholder="Enter Email Address" class="form-control" id="email">
                                     <div id="email-error"></div>
                                     <div id="email-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="password" class="form-label fw-bold">Create Password</label>
                                     <input type="password" name="password" placeholder="Create Password" class="form-control" id="password">
                                     <div id="password-error"></div>
                                     <div id="password-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="cnf-password" class="form-label fw-bold">Confirm Password</label>
                                     <input type="password" name="cnf-password" placeholder="Re-enter Password" class="form-control" id="cnfpwd">
                                     <div id="confirm-password-error"></div>
                                     <div id="confirm-password-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="qualification" class="form-label fw-bold">Qualification</label>
                                     <input type="text" name="qualification" placeholder="Enter Qualifications" class="form-control" id="qualification">
                                     <div id="qualification-error"></div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="mb-3">
                                     <label for="userid" class="form-label fw-bold">Register number</label>
                                     <input type="text" name="userid" placeholder="Enter register number" class="form-control" id="userid">
                                     <div id="id-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="dob" class="form-label fw-bold">Date of Birth</label>
                                     <input type="date" name="dob" class="form-control" id="dob">
                                     <div id="dob-error"></div>
                                     <div id="dob-valid"></div>
                                 </div>
                                 <div class="mb-2">
                                     <label for="gender" class="form-check-label fw-bold mb-1">Gender</label>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                                         <label class="form-check-label" for="male">
                                             Male
                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                                         <label class="form-check-label" for="female">
                                             Female
                                         </label>
                                     </div>
                                     <div id="gender-error"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="phno" class="form-label fw-bold">Phone Number</label>
                                     <input type="tel" name="phno" placeholder="Enter Phone Number" class="form-control" id="phone">
                                     <div id="phone-error"></div>
                                     <div id="phone-valid"></div>
                                 </div>
                                 <div class="mb-3">
                                     <label for="subject" class="form-label fw-bold">Subjects Taught</label>
                                     <select name="subject" class="form-control" id="subject">
                                         <option value="">Select subject</option>
                                         <option value="Tamil">Tamil</option>
                                         <option value="English">English</option>
                                         <option value="Hindi">Hindi</option>
                                         <option value="Maths">Maths</option>
                                         <option value="Science">Science</option>
                                         <option value="Social">Social</option>
                                     </select>
                                     <div id="subject-error"></div>
                                 </div>

                             </div>
                             <div class="mb-3 col-md-12" id="City">
                                 <label for="address" class="form-label fw-bold">Address</label>
                                 <input type="text" name="address" placeholder="Enter City" class="form-control" id="city">
                                 <div id="address-error"></div>
                                 <div id="address-valid"></div>
                             </div>
                             <div class="mb-3">
                                 <button type="submit" value="submit" name="submit" class="btn btn-outline-primary fw-bold border-2" style="padding:5px 25px">Submit</button>
                             </div>
                         </div>
                         <!-- <button type="submit" name="submit" value="submit">submit</button> -->
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <script src="validate.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>