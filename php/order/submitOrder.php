<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softwareengineering"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"), true);

$orderNumber = $conn->real_escape_string($data['orderNumber']);
$customerRef = $conn->real_escape_string($data['customerRef']);
$orderDate = $conn->real_escape_string($data['orderDate']);
$orderData = $data['orderData'];

$success = true;

foreach ($orderData as $order) {
    $productName = $conn->real_escape_string($order['product']);
    $qty = (int)$order['qty'];
    $price = (float)$order['price'];
    $discount = (float)$order['discount'];
    $subtotal = (float)$order['subtotal'];

    $sql = "INSERT INTO order_history (order_number, customer_ref, order_date, product_name, quantity, price, discount, subtotal) 
            VALUES ('$orderNumber', '$customerRef', '$orderDate', '$productName', $qty, $price, $discount, $subtotal)";
    
    if (!$conn->query($sql)) {
        $success = false; 
        break; 
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(['success' => $success]);
?>
