<?php
session_start();
// echo $_SESSION['userid'];
if (!$_SESSION['adminisloggedin']) {
    header('Location: home.php');
    exit();
}
include('dbconnect.php');
$sql = "SELECT * FROM `teachers`";
$result = mysqli_query($conn, $sql);
$num_teacher = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacherlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

        #content {
            background-color: white;
        }
        caption {
            font-size: 1.2rem;
            text-align: left;
            padding: 10px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <?php include('admindashboard.php') ?>
        </div>
        <div class="content flex-grow-1 " id="content">
            <?php include('header.php') ?>
            <div class="container" id="container">
                <div class="search-bar my-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                        </div>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search with Name">
                        <button class="btn btn-primary" id="searchButton">Search</button>
                    </div>
                </div>
                <table class="table table-striped">
                <caption>Number of Teachers: <?php echo $num_teacher; ?></caption>
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Subject</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <?php
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['name'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $dateofbirth = $row['dob'];
                                $ph_no = $row['phno'];
                                $address = $row['address'];
                                $subject = $row['subject'];
                                echo '<tr>
                                <td  scope="row">' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $gender . '</td>
                                <td>' . $dateofbirth . '</td>
                                <td>' . $ph_no . '</td>
                                <td>' . $address . '</td>
                                <td>' . $subject . '</td>
                                </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('searchInput').addEventListener('input', function(){
            let query = this.value.toLowerCase();
            let rows = document.querySelectorAll('#studentTableBody tr');
            let teacherCount = 0;
            rows.forEach(function(row){
                let name = row.cells[0].textContent.toLowerCase();
                console.log(name);
                if(query === '' || name.includes(query)){
                    row.style.display = '';
                    teacherCount++;
                }
                else{
                    row.style.display = 'none';
                }
                if(teacherCount <= 0){
                    document.querySelector('caption').innerText = `No data found`
                }else if(teacherCount == 1){
                    document.querySelector('caption').innerText = `Number of Teacher: ` + teacherCount;
                }else{
                    document.querySelector('caption').innerText = `Number of Teachers: ` + teacherCount;
                }
            })
        })
    </script>
</body>

</html>