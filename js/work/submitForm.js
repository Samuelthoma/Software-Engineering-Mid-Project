function submitForm() {
    const rows = document.querySelectorAll("#workOrderTable tbody tr");
    let totalPercentage = 0;

    rows.forEach(row => {
        const percentageInput = row.querySelector('input[name="percentage"]');
        if (percentageInput && percentageInput.value) {
            totalPercentage += parseFloat(percentageInput.value);
        }
    });

    const tolerance = 0.1;

    if (Math.abs(totalPercentage - 100) > tolerance) {
        Swal.fire({
            title: "Forbidden!",
            text: "The total percentage must equal 100.",
            icon: "error"
        });
        return;
    } else {
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
                }).then(() => {
                    document.getElementById("workOrderForm").submit(); 
                });
            }
        });
    }
}
