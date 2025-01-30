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

window.getYear = getYear;
