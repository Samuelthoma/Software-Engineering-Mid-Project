<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Creation</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/order/addRow.js"></script>
    <script src="../../js/order/updatePrice.js"></script>
    <script src="../../js/order/calculateSubtotal.js"></script>
    <script src="../../js/order/removeRow.js"></script>
    <script src="../../js/order/updateTotal.js"></script>
    <script src="../../js/order/submitForm.js"></script>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div>
        <h2>Order Creation</h2>

        <form id="orderDetailsForm">
            <div class="order-details">
                <label for="orderNumber">Order Number:</label>
                <input type="text" id="orderNumber" name="orderNumber" required style="width: 20%"><br>

                <label for="customerRef">Customer Ref:</label>
                <input type="text" id="customerRef" name="customerRef" required style="width: 20%"><br>

                <label for="orderDate">Order Date:</label>
                <input type="date" id="orderDate" name="orderDate" required style="width: 20%"><br>
            </div>
        </form>

        <table id="orderTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Discount %</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="product" onchange="updatePrice(this)">
                            <option value="">Select Product</option>
                            <?php include 'fetchProducts.php'; ?>
                        </select>
                    </td>
                    <td><input type="number" name="qty" min="1" value="1" onchange="calculateSubtotal(this)"></td>
                    <td><input type="number" name="price" readonly></td>
                    <td><input type="number" name="discount" min="0" max="100" value="0" step="0.01" onchange="calculateSubtotal(this)"></td>
                    <td><input type="number" name="subtotal" readonly></td>
                    <td><button class="delete-button" onclick="removeRow(this)">Remove</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="4">Total</td>
                    <td><input type="number" id="finalTotal" readonly></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <div class="center">
            <button class="add-button" type="button" onclick="addRow()">Add Row</button>
            <button class="submit-button" type="button" onclick="submitForm()">Submit Order</button>
        </div>
    </div>

    <?php
    $productOptions = '';
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "softwareengineering";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT id, name, price FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productOptions .= '<option value="'.$row['id'].'" data-price="'.$row['price'].'">'.$row['name'].'</option>';
        }
    }
    $conn->close();
    ?>

    <script>
        const productOptions = `<?php echo $productOptions; ?>`;
    </script>
