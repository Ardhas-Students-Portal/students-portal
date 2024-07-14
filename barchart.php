<?php
header('Content-Type: application/json');
include('dbconnect.php');

$sql = "SELECT class, COUNT(*) as count FROM studentdata GROUP BY class";
$result = $conn->query($sql);

$labels = [];
$data = [];
$backgroundColor = [];
$borderColor = [];

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = ucfirst($row['class']);
        $data[] = $row['count'];
        if ($row['class'] == 7) {
            $backgroundColor[] = 'rgba(54, 162, 235, 0.2)';
            $borderColor[] = 'rgba(54, 162, 235, 1)';
        } else if ($row['class'] == 8) {
            $backgroundColor[] = 'rgba(255, 99, 132, 0.2)';
            $borderColor[] = 'rgba(255, 99, 132, 1)';
        } else {
            $backgroundColor[] = 'rgba(75, 192, 192, 0.2)';
            $borderColor[] = 'rgba(75, 192, 192, 1)';
        }
    }
}

$responseData = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => '# of Students',
            'data' => $data,
            'backgroundColor' => $backgroundColor,
            'borderColor' => $borderColor,
            'borderWidth' => 1
        ]
    ]
];

echo json_encode($responseData);

$conn->close();
?>
