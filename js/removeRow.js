function removeRow(button) {
    const row = button.closest("tr");
    const table = document.getElementById("orderTable").getElementsByTagName("tbody")[0];
    if (table.rows.length > 1) {
        row.remove(); 
        updateTotal();
    } else {
        Swal.fire({
            title: "Error!",
            text: "You need at least one row.",
            icon: "error"
        });
    }
}