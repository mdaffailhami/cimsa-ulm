const getYear = (yearInput, current_year = null) => {
    const currentYear = new Date().getFullYear();
    const startYear = 2000;

    for (let year = currentYear; year >= startYear; year--) {
        const option = document.createElement("option");
        option.value = year;
        option.textContent = year;

        if (year == current_year) {
            option.selected = true;
        } else if (year === currentYear) {
            option.selected = true;
        }

        yearInput.appendChild(option);
    }
};

const resetValidation = () => {
    let invalidInputs = document.querySelectorAll('.is-invalid');
    let invalidMessages = document.querySelectorAll('.invalid-feedback')

    // Remove the 'is-invalid' class from all inputs
    invalidInputs.forEach(input => input.classList.remove('is-invalid'));

    // Remove the 'invalid-feedback' class and hide the error messages
    invalidMessages.forEach(message => {
        message.style.display = 'none'; // Optionally hide the message
    });
}

window.getYear = getYear;
window.resetValidation = resetValidation;

