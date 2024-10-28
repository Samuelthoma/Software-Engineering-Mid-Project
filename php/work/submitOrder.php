<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['orderNumber'], $data['customerRef'], $data['orderDate'], $data['orderData'])) {
    $orderNumber = $conn->real_escape_string($data['orderNumber']);
    $customerRef = $conn->real_escape_string($data['customerRef']);
    $orderDate = $conn->real_escape_string($data['orderDate']);

    $conn->begin_transaction();

    try {
        $sql = "INSERT INTO orders (order_number, customer_ref, order_date) VALUES ('$orderNumber', '$customerRef', '$orderDate')";
        $conn->query($sql);
        $orderId = $conn->insert_id;

        foreach ($data['orderData'] as $item) {
            $product = $conn->real_escape_string($item['product']);
            $qty = (float) $item['qty'];
            $price = (float) $item['price'];
            $discount = (float) $item['discount'];
            $subtotal = (float) $item['subtotal'];

            $sqlItem = "INSERT INTO order_items (order_id, product, quantity, price, discount, subtotal) 
                        VALUES ('$orderId', '$product', '$qty', '$price', '$discount', '$subtotal')";
            $conn->query($sqlItem);
        }

        $conn->commit();

        echo json_encode(['success' => true]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Incomplete data received.']);
}

$conn->close();
?>
