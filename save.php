<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (is_array($data)) {
    // Clear existing data
    $conn->query("DELETE FROM stocks");

    $serial = 1;
    foreach ($data as $item) {
        $name = $conn->real_escape_string($item['name']);
        $price = $item['price'];
        $quantity = $item['quantity'];

        $sql = "INSERT INTO stocks (serial, name, price, quantity) VALUES ('$serial', '$name', '$price', '$quantity')";
        $conn->query($sql);

        $serial++;
    }

    echo "Data saved successfully!";
} else {
    echo "No data to save!";
}

$conn->close();
?>
