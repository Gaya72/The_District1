document.addEventListener("DOMContentLoaded", function () {
    let menuSelect = document.getElementById("menuSelect");
    if (menuSelect) {
        menuSelect.addEventListener("change", function () {
            if (this.value) {
                window.location.href = this.value;
            }
        });
    }
});
