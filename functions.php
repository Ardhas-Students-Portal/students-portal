<?php
function fetchStudentName($conn, $userid) {
    $sql = "SELECT name FROM studentdata WHERE registernumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'];
    } else {
        return null;
    }
}
?>
