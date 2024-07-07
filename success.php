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
    <style>
        .chead {
    background-color: blue;
    color: white;
    padding: 10px;
    margin-bottom: 20px;
    text-align: center;
  }
  .container{
    text-align: center;
  }
</style>
</head>
<body>
<div class="chead">
    <h2>Submission Successful</h2>
  </div>
    <div class="container mt-5">
        <p>Thank you, <?php echo htmlspecialchars($_SESSION['name']); ?> marks are added successfully.</p>
    </div>
</body>
</html>
