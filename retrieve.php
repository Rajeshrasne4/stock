<?php
include 'db.php';

$sql = "SELECT serial, name, price, quantity FROM stocks";
$result = $conn->query($sql);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
