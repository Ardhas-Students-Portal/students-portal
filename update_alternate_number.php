<?php
include('dbconnect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $alternateNumber = htmlspecialchars($_POST['alternateNumber']);

    // Update the alternate number in the database
    $stmt = $conn->prepare("UPDATE studentdata SET alternatenumber = ? WHERE id = ?");
    $stmt->bind_param("si", $alternateNumber, $id);
    $stmt->execute();
    $stmt->close();

    // Return success response
    echo "success";
} else {
    echo "Invalid request.";
}

$conn->close();
?>
