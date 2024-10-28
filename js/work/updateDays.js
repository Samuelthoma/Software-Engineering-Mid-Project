function updateDays(selectElement) {
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    const daysInput = selectElement.closest('tr').querySelector('input[name="days"]');
    
    if (selectedOption && selectedOption.value) {
        daysInput.value = selectedOption.getAttribute('data-days');
    } else {
        daysInput.value = '';
    }
    calculateFinishDate(); 
}
