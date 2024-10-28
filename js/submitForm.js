function submitForm() {
    const orderNumber = document.getElementById('orderNumber').value;
    const customerRef = document.getElementById('customerRef').value;
    const orderDate = document.getElementById('orderDate').value;
    const table = document.getElementById("orderTable").getElementsByTagName("tbody")[0];
    const orderData = [];

    for (let row of table.rows) {
        const product = row.cells[0].querySelector("select").selectedOptions[0].text; // Product name
        const qty = parseFloat(row.cells[1].querySelector("input").value) || 0;
        const price = parseFloat(row.cells[2].querySelector("input").value) || 0;
        const discount = parseFloat(row.cells[3].querySelector("input").value) || 0;
        const subtotal = parseFloat(row.cells[4].querySelector("input").value) || 0;
        orderData.push({ product, qty, price, discount, subtotal });
    }

    fetch('submitOrder.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ orderNumber, customerRef, orderDate, orderData })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
            title: "Are you sure that's everything?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Submit it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Submitted!",
                    text: "Your order has been submitted.",
                    icon: "success"
                });
            }
        });
            updateTotal(); 
            document.getElementById('orderDetailsForm').reset();
            const tableBody = document.getElementById("orderTable").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = ''; 
            addRow();
        } else {
            Swal.fire('Error!', 'There was an issue submitting your order.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Incomplete!', 'There was an incomplete input.', 'error');
    });
}