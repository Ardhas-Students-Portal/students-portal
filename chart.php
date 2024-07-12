<?php
header('Content-Type: application/json');
include('dbconnect.php');

$sql = "SELECT gender, COUNT(*) as count FROM studentdata GROUP BY gender";
$result = $conn->query($sql);

$labels = [];
$data = [];
$backgroundColor = [];
$borderColor = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = ucfirst($row['gender']);
        $data[] = $row['count'];
        if (strtolower($row['gender']) == 'male') {
            $backgroundColor[] = 'rgba(54, 162, 235, 0.2)';
            $borderColor[] = 'rgba(54, 162, 235, 1)';
        } else if (strtolower($row['gender']) == 'female') {
            $backgroundColor[] = 'rgba(255, 99, 132, 0.2)';
            $borderColor[] = 'rgba(255, 99, 132, 1)';
        }
    }
}

$data = [
    'labels' => $labels,
    'datasets' => [[
        'label' => '# of Students',
        'data' => $data,
        'backgroundColor' => $backgroundColor,
        'borderColor' => $borderColor,
        'borderWidth' => 1
    ]]
];

echo json_encode($data);
?>
