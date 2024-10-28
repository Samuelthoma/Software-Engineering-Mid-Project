function addRow() {
    const table = document.getElementById("workOrderTable").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();
    
    const materialCell = newRow.insertCell(0);
    const daysCell = newRow.insertCell(1);
    const percentageCell = newRow.insertCell(2);
    const actionCell = newRow.insertCell(3);

    materialCell.innerHTML = `
        <select name="material" onchange="updateDays(this)">
            <option value="">Select Material</option>
            ${materialOptions}
        </select>
    `;
    daysCell.innerHTML = '<input type="number" name="days" readonly onchange="calculateFinishDate()">'; 
    percentageCell.innerHTML = '<input type="number" name="percentage" min="0" max="100" value="0" step="0.01">';
    actionCell.innerHTML = '<button class="delete-button" type="button" onclick="removeRow(this)">Remove</button>';
}
