<?php
session_start();
if (!$_SESSION['adminisloggedin']) {
    header('Location: home.php');
    exit();
}
include('dbconnect.php');
$sql = 'SELECT * FROM studentdata';
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}
$num_students = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <style>
        .chead {
            background-color: blue;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
        .actions-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .search-bar {
            display: flex;
            align-items: center;
            flex: 1;
            margin-bottom: 10px;
        }
        .search-bar .input-group-text {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .search-bar input[type="text"] {
            flex: 1;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .actions-container .btn {
            flex-shrink: 0;
            margin-bottom: 10px;
        }
        .highlight {
            background-color: yellow;
        }
        #container {
            padding: 35px 40px;
        }
    </style>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php'); ?>
        </div>
        <div class="content flex-grow-1">
            <?php include('header.php'); ?>
            <div class="container" id="container">
                <table class="table table-striped mt-3 mb-5" id="example">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Register number</th>
                            <th scope="col">Class</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <?php
                        if ($num_students > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <td>' . $row['name'] . '</td>
                                    <td>' . $row['registernumber'] . '</td>
                                    <td>' . $row['class'] . '</td>
                                    <td>' . $row['dateofbirth'] . '</td>
                                    <td>' . $row['gender'] . '</td>
                                    <td>' . $row['teacher'] . '</td>
                                    <td>' . $row['address'] . '</td>
                                </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">No students found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });

        });
    </script>
</body>
</html>
