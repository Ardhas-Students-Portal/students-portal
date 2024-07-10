<?php
include('dbconnect.php');

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}

$number = $_SESSION['userid'];

$id = "Register Number";
$name = "Name";
$dob = "Date of Birth";
$gender = "Gender";
$class = "Class";
$teacher = "Teacher";
$parentnumber = "Parent Number";
$address = "Address";

$sql = "SELECT * FROM studentdata WHERE registernumber = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $number);
$stmt->execute();
$result = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* table,tr,th,td{
            border: 1px solid black;
        } */
    </style>
</head>
<body>
   
    <div class="container-fluid m-1">
    <div class="d-flex justify-content-center flex-row">
        <h1 class="form-header text-center p-3">Profile</h1>
        <table class="display table table-bordered w-75">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['stu_name'] = $row['name'];
                        echo "<tr>
                                <th>{$id}</th>
                                <td>{$row['registernumber']}</td>
                              </tr>";
                        echo "<tr>
                              <th>{$name}</th>
                              <td>{$row['name']}</td>
                            </tr>";
                        echo "<tr>
                                <th>{$dob}</th>
                                <td>{$row['dateofbirth']}</td>
                              </tr>";
                        echo "<tr>
                              <th>{$gender}</th>
                              <td>{$row['gender']}</td>
                            </tr>";
                        echo "<tr>
                                <th>{$class}</th>
                                <td>{$row['class']}</td>
                              </tr>";
                        echo "<tr>
                              <th>{$teacher}</th>
                              <td>{$row['teacher']}</td>
                            </tr>";
                        echo "<tr>
                                <th>{$parentnumber}</th>
                                <td>{$row['parentnumber']}</td>
                              </tr>";
                        echo "<tr>
                              <th>{$address}</th>
                              <td>{$row['address']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
                $stmt->close();
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
