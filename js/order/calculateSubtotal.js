function calculateSubtotal(element) {
    const row = element.closest("tr");
    const qty = parseFloat(row.cells[1].querySelector("input").value) || 0;
    const price = parseFloat(row.cells[2].querySelector("input").value) || 0;
    const discount = parseFloat(row.cells[3].querySelector("input").value) || 0;
    const subtotal = qty * price * ((100 - discount) / 100);
    row.cells[4].querySelector("input").value = subtotal.toFixed(2);
    updateTotal();
}
