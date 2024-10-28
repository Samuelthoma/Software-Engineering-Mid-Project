<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order Creation</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/work/addRow.js"></script>
    <script src="../../js/work/updateDays.js"></script>
    <script src="../../js/work/calculateFinishDate.js"></script>
    <script src="../../js/work/removeRow.js"></script>
    <script src="../../js/work/submitForm.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div>
        <h2>Work Order Creation</h2>

        <form id="workOrderForm">
            <div class="order-details">
                <label for="orderNumber">Order Number:</label>
                <input type="text" id="orderNumber" name="orderNumber" required style="width: 20%"><br>

                <label for="client">Customer Ref:</label>
                <input type="text" id="client" name="client" required style="width: 20%"><br>

                <label for="orderDate">Order Date:</label>
                <input type="date" id="orderDate" name="orderDate" required style="width: 20%"><br>

                <label for="finishDate">Finish Date:</label>
                <input type="date" id="finishDate" name="finishDate" readonly style="width: 20%"><br><br>
            </div>
        </form>

        <table id="workOrderTable">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Days</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="center">
            <button class="add-button" type="button" onclick="addRow()">Add Row</button>
            <button class="submit-button" type="button" onclick="submitForm()">Submit Order</button>
        </div>
    </div>

    <?php
    include '../connection.php';

    $materialOptions = '';
    $sql = "SELECT id, material_name, days FROM materials"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $materialOptions .= '<option value="'.$row['id'].'" data-days="'.$row['days'].'">'.$row['material_name'].'</option>';
        }
    }
    $conn->close();
    ?>

    <script>
        const materialOptions = `<?php echo $materialOptions; ?>`;
        function initializeTable() {
            addRow(); 
        }
        window.onload = initializeTable;
    </script>
</body>
</html>
