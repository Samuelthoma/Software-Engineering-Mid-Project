function removeRow(button) {
    const table = document.getElementById("workOrderTable").getElementsByTagName("tbody")[0];
    const row = button.closest('tr');

    if (table.rows.length === 1) {
        Swal.fire({
            title: "Error!",
            text: "You need at least one row.",
            icon: "error"
        }); 
        return;
    }

    row.parentNode.removeChild(row);
    calculateFinishDate(); 
}
