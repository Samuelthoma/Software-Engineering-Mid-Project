<?php
include '../connection.php';

$sql = "SELECT id, name, price FROM product";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '<option value="'.$row['id'].'" data-price="'.$row['price'].'">'.$row['name'].'</option>';
}

$conn->close();
?>
