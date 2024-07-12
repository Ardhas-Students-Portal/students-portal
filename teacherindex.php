<?php
include('dbconnect.php');
session_start();
if (!$_SESSION['teacherisloggedin']) {
  header('Location: home.php');
  exit();
}

$userid_teacher = $_SESSION['userid'];
$sql = "SELECT name FROM teachers WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $userid_teacher);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row) {
  $teacher = $row["name"];
  $_SESSION['teacher'] = $teacher;

  if ($teacher) {
      $sql2 = "SELECT id, registernumber, name, class, gender, teacher, parentnumber, alternatenumber, address FROM studentdata WHERE teacher = ?";
      $stmt2 = mysqli_prepare($conn, $sql2);
      mysqli_stmt_bind_param($stmt2, 's', $teacher);
      mysqli_stmt_execute($stmt2);
      $result2 = mysqli_stmt_get_result($stmt2);
  } else {
      echo "No teacher found with the given ID.";
  }
} else {
  echo "No teacher found with the given ID.";
}

mysqli_stmt_close($stmt);
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

    #container {
        padding: 35px 40px;
    }

    #popupForm {
        display: none;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #ccc;
        background: #fff;
        z-index: 1000;
    }

    #popupOverlay {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }
  </style>
</head>

<body>
<div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-form" id="popupForm">
        <label for="alternateNumber">Enter Alternate Number:</label>
        <input type="text" id="alternateNumber" name="alternateNumber">
        <input type="hidden" id="rowId" name="rowId">
        <button onclick="submitAlternateNumber()">Submit</button>
        <button onclick="hidePopup()">Cancel</button>
    </div>

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
                <th scope="col">Add  <i class='bi bi-telephone-plus-fill'></i> </th>
                <th scope="col">Address</th>
              </tr>
            </thead>
            <tbody id="studentTable">
            <?php
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><a href='addmarks.php?rollNo=" . htmlspecialchars($row2["registernumber"]) . "&name=" . htmlspecialchars($row2["name"]) . "&teacher=" . htmlspecialchars($row2["teacher"]) . "&class=" . htmlspecialchars($row2["class"]) . "'>" . htmlspecialchars($row2["registernumber"]) . "</a></td>";
                    echo "<td>" . htmlspecialchars($row2["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row2["class"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row2["gender"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row2["teacher"]) . "</td>";
                    echo "<td id='parentnumber-" . htmlspecialchars($row2["id"]) . "'>" . htmlspecialchars($row2["parentnumber"]);
                        // Display alternate number if exists
                        if (!empty($row2["alternatenumber"])) {
                            echo "<br>Alternate: " . htmlspecialchars($row2["alternatenumber"]);
                        }
                        echo "</td>";
                        echo "<td><i class='bi bi-telephone-plus-fill' onclick='showPopup(" . htmlspecialchars($row2["id"]) . ")'></i></td>";
                    echo "<td>" . htmlspecialchars($row2["address"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
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

    function showPopup(id) {
        document.getElementById('rowId').value = id;
        document.getElementById('popupOverlay').style.display = 'block';
        document.getElementById('popupForm').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
        document.getElementById('popupForm').style.display = 'none';
    }

    function submitAlternateNumber() {
            var rowId = document.getElementById('rowId').value;
            var alternateNumber = document.getElementById('alternateNumber').value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_alternate_number.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var parentNumberCell = document.getElementById('parentnumber-' + rowId);
                    parentNumberCell.innerHTML += "<br>Alternate: " + alternateNumber;
                    hidePopup();
                }
            };
            xhr.send("id=" + rowId + "&alternateNumber=" + encodeURIComponent(alternateNumber));
        }
  </script>
</body>

</html>
