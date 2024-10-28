<?php
$materialOptions = '';
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "softwareengineering";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, material_name, days FROM materials";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $materialOptions .= '<option value="'.$row['id'].'">'.$row['material_name'].' - '.$row['days'].' days</option>';
    }
} else {
    $materialOptions .= '<option value="">No materials available</option>';
}

$conn->close();

echo $materialOptions;
?>
