<?php
include('dbconnect.php');
$sql = "SELECT name, registernumber, class, dateofbirth, gender, teacher, parentnumber, alternatenumber, address FROM studentdata";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Student Data</title>
</head>
<body>
    <div class="container mt-4">
        <h2 style="text-align: center;"> Students Data</h2>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Register Number</th>
                <th>Class</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Teacher</th>
                <th>Parent Number</th>
                <th>Alternate Number</th>
                <th>Address</th>
            </tr>
            <?php
            if ($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".htmlspecialchars($row["name"])."</td>";
                    echo "<td>".htmlspecialchars($row["registernumber"])."</td>";
                    echo "<td>".htmlspecialchars($row["class"])."</td>";
                    echo "<td>".htmlspecialchars($row["dateofbirth"])."</td>";
                    echo "<td>".htmlspecialchars($row["gender"])."</td>";
                    echo "<td>".htmlspecialchars($row["teacher"])."</td>";
                    echo "<td>".htmlspecialchars($row["parentnumber"])."</td>";
                    echo "<td>".htmlspecialchars($row["alternatenumber"])."</td>";
                    echo "<td>".htmlspecialchars($row["address"])."</td>";
                    "</tr>";
                }
            }else{
                echo "<tr><td> colspan='9' class='text-center'>No data found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>
