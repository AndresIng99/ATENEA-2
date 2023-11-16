newFunction();
function newFunction() {
    const importeSlider = document.getElementById("importeSlider");
    const importeValue = document.getElementById("importeValue");
    const plazoSlider = document.getElementById("plazoSlider");
    const plazoValue = document.getElementById("plazoValue");

    importeSlider.addEventListener("input", () => {
        importeValue.textContent = `$${importeSlider.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    });

    plazoSlider.addEventListener("input", () => {
        plazoValue.textContent = `${plazoSlider.value} días`;
    });
}

