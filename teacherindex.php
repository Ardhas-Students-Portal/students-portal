<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    .sidebar {
      width: 250px;
      position: fixed;
      height: 100%;
      padding-top: 20px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
      padding: 15px 20px;
      text-decoration: none;
      font-size: 18px;
      color: rgb(19, 18, 18);
      display: flex;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .sidebar a:hover {
      background-color: rgba(0, 0, 0, 0.1);
    }

    .sidebar a i {
      margin-right: 10px;
    }

    .main-content {
      margin-left: 270px;
      padding: 20px;
    }

    .teacher-info {
      text-align: center;
      margin-bottom: 20px;
      font-size: x-large;
      color: rgb(6, 6, 6);
    }

    .teacher-info img {
      border-radius: 50%;
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <?php
    include('dbconnect.php');
  $sql = "SELECT  registernumber, name, class,  gender, parentnumber,  address FROM studentdata";
  $result = $conn->query($sql);
  ?>
  <div class="chead">
    <h2>Students Data</h2>
  </div>
  <div class="sidebar">
    <div class="teacher-info">
      <img src="https://img.freepik.com/premium-vector/school-girl-cartoon-round-icon-vector-illustration-schoolgirl-glasses_1142-66572.jpg" alt="Teacher">
      <div>Dashboard</div>
    </div>
    <nav class="nav flex-column">
      <a href="#view-students"><i class="bi bi-people-fill"></i> View Students</a>
      <a href="addmarks.php"><i class="bi bi-plus-square-fill"></i> Add Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-eye-fill"></i> View Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-pencil-fill"></i> Update Student Mark</a>
    </nav>
  </div>

  <div class="main-content">
    <div class="container">
      <div class="actions-container">
        <div class="search-bar me-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
            </div>
            <input type="text" class="form-control" id="searchInput" placeholder="Search with Roll No">
          </div>
        </div>
        <button class="btn btn-secondary add-marks-button" onclick="window.location.href='addmarks.php'">
          <i class="bi bi-plus-square-fill"></i>
          <span>Add Marks</span>
        </button>
      </div>

      <div id="view-students" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Register Number</th>
              <th scope="col">Name</th>
              <th scope="col">Class</th>
              <th scope="col">Gender</th>
              <th scope="col">Parent Number</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody id="studentTable">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["registernumber"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["class"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["parentnumber"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No data found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('searchInput').addEventListener('input', function () {
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

    function scrollToRow(rollNumber) {
      const row = document.getElementById(`row-${rollNumber}`);
      if (row) {
        row.scrollIntoView({ behavior: 'smooth' });
        row.classList.add('highlight');
        setTimeout(() => row.classList.remove('highlight'), 2000);
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-wh6qD2E8YedfrQZlL58/zodX1dpmFf1F5LwA2bnxmsYm6pbrYzMzKE5vzxTleIGT" crossorigin="anonymous"></script>
</body>

</html>
<?php
$conn->close();
?>
