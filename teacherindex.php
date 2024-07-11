<?php
include('dbconnect.php');
session_start();
// echo isset($_SESSION['userid']);
if(!isset($_SESSION['userid'])){
 header('Location: Login.php');
}
$userid_teacher   = $_SESSION['userid'];
$sql = "SELECT name FROM teachers WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $userid_teacher);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row) {
  $teacher = $row["name"];
  $_SESSION['teacher'] = $teacher;
  // echo  $_SESSION['teacher'];
  if ($teacher) {
    $sql2 = "SELECT registernumber, name, class, gender, teacher, parentnumber, address FROM studentdata WHERE teacher = ?";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, 's', $teacher);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);
    if ($result2) {
      $row2 = mysqli_fetch_assoc($result2);
      if ($row2) {
        // echo $row2['name'];
      } else {
        echo "No students found for the teacher.";
      }
    } else {
      echo "Error executing the query: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt2);
  } else {
    echo "No teacher found with the given ID.";
  }
} else {
  echo "No teacher found with the given ID.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>studentlist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="./assets/adminstyle.css" />
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
        #container{
            padding: 35px 40px;
        }
   </style>
  <div class="main-container">
    <div class="sidebar" id="side_nav">
      <?php include('teacherdashboard.php'); ?>
    </div>
    <div class="content flex-grow-1">
    <?php include('admin_Stuheader.php'); ?>
      <div class="container p-5">
        <div class="actions-container">
          <div class="search-bar me-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div>
              <input type="text" class="form-control" id="searchInput" placeholder="Search with Roll No">
            </div>
          </div>
        </div>

        <div id="view-students" class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Register Number</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Gender</th>
                <th scope="col">Teacher</th>
                <th scope="col">Parent Number</th>
                <th scope="col">Address</th>
              </tr>
            </thead>
            <tbody id="studentTable">
            <?php
  if ($result2->num_rows > 0) {
      while ($row2 = $result2->fetch_assoc()) {
          echo "<tr>";
          echo "<td><a href='addmarks.php?rollNo=" . htmlspecialchars($row2["registernumber"]) . "&name=" . htmlspecialchars($row2["name"]) ."&teacher=" . htmlspecialchars($row2["teacher"]). "'>" . htmlspecialchars($row2["registernumber"]) . "</a></td>";
          echo "<td>" . htmlspecialchars($row2["name"]) . "</td>";
          echo "<td>" . htmlspecialchars($row2["class"]) . "</td>";
          echo "<td>" . htmlspecialchars($row2["gender"]) . "</td>";
          echo "<td>" . htmlspecialchars($row2["teacher"]) . "</td>";
          echo "<td>" . htmlspecialchars($row2["parentnumber"]) . "</td>";
          echo "<td>" . htmlspecialchars($row2["address"]) . "</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='7' class='text-center'>No data found</td></tr>";
  }
  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('searchInput').addEventListener('input', function() {
      const searchValue = this.value.trim().toLowerCase();
      const rows = document.querySelectorAll('#studentTable tr');
      let found = false;

      rows.forEach(row => {
        const rollNumber = row.querySelector('td:first-child').textContent.trim().toLowerCase();
        if (rollNumber.includes(searchValue) && searchValue !== "") {
          row.style.display = '';
          found = true;
        } else {
          row.style.display = 'none';
        }
      });

      if (!found && searchValue !== "") {
        alert("No matching roll number found.");
      }

      if (searchValue === "") {
        rows.forEach(row => {
          row.style.display = '';
        });
      }
    });

    function toggleSidebar() {
      document.querySelector('.sidebar').classList.toggle('active');
    }
  </script>
</body>

