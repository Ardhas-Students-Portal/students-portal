<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        
  .container{
    text-align: center;
  }
</style>
</head>
<body>
<div class="sidebar">
    <div class="teacher-info">
      <img src="https://img.freepik.com/premium-vector/school-girl-cartoon-round-icon-vector-illustration-schoolgirl-glasses_1142-66572.jpg" alt="Teacher">
      <div>Bharathi Dashboard</div>
    </div>
    <nav class="nav flex-column">
      <a href="#view-students"><i class="bi bi-people-fill"></i> View Students</a>
      <a href="addmarks.php"><i class="bi bi-plus-square-fill"></i> Add Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-eye-fill"></i> View Student Mark</a>
      <a href="viewmarks.php"><i class="bi bi-pencil-fill"></i> Update Student Mark</a>
    </nav>
  </div>
  <div class="chead">
    <h2>Students Data</h2>
  </div>
  <button class="bi bi-list d-lg-none" type="button" data-bs-toggle="collapse" onclick="toggleSidebar()" ></button>
    <div class="container mt-5">
        <p>Thank you, <?php echo htmlspecialchars($_SESSION['name']); ?> marks are added successfully.</p>
    </div>
    <div class="container mt-5">
    <a href="viewmarks.php" class="btn btn-primary">View Marks</a>
    </div>
</body>
</html>
