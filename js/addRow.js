function addRow() {
    const table = document.getElementById("orderTable").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();
    const productCell = newRow.insertCell(0);
    const qtyCell = newRow.insertCell(1);
    const priceCell = newRow.insertCell(2);
    const discountCell = newRow.insertCell(3);
    const subtotalCell = newRow.insertCell(4);
    const actionCell = newRow.insertCell(5);

    productCell.innerHTML = `<select name="product" onchange="updatePrice(this)"><option value="">Select Product</option>${productOptions}</select>`;
    qtyCell.innerHTML = '<input type="number" name="qty" min="1" value="1" onchange="calculateSubtotal(this)">';
    priceCell.innerHTML = '<input type="number" name="price" readonly>';
    discountCell.innerHTML = '<input type="number" name="discount" min="0" max="100" value="0" step="0.01" onchange="calculateSubtotal(this)">';
    subtotalCell.innerHTML = '<input type="number" name="subtotal" readonly>';
    actionCell.innerHTML = '<button class="delete-button" type="button" onclick="removeRow(this)">Remove</button>';
    updateTotal();
}
