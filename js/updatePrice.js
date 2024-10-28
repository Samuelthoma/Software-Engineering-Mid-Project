function updatePrice(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const price = selectedOption.getAttribute("data-price");
    const row = selectElement.closest("tr");
    row.cells[2].querySelector("input").value = price;
    calculateSubtotal(selectElement);
}
