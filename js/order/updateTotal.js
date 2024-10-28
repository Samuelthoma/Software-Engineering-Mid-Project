function updateTotal() {
    const table = document.getElementById("orderTable").getElementsByTagName("tbody")[0];
    let total = 0;
    for (let row of table.rows) {
        const subtotal = parseFloat(row.cells[4].querySelector("input").value) || 0;
        total += subtotal;
    }
    document.getElementById("finalTotal").value = total.toFixed(2);
}
