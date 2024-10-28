function calculateFinishDate() {
    const table = document.getElementById("workOrderTable").getElementsByTagName("tbody")[0];
    const rows = table.rows;
    let totalDays = 0;

    for (let i = 0; i < rows.length; i++) {
        const daysInput = rows[i].querySelector('input[name="days"]');
        if (daysInput && daysInput.value) {
            totalDays += parseInt(daysInput.value);
        }
    }

    const orderDate = document.getElementById("orderDate").value;
    if (orderDate) {
        const finishDateInput = document.getElementById("finishDate");
        const startDate = new Date(orderDate);
        const finishDate = new Date(startDate.setDate(startDate.getDate() + totalDays));
        
        // Format the finish date to YYYY-MM-DD
        const year = finishDate.getFullYear();
        const month = String(finishDate.getMonth() + 1).padStart(2, '0'); // Months are 0-based
        const day = String(finishDate.getDate()).padStart(2, '0');

        finishDateInput.value = `${year}-${month}-${day}`;
    }
}
