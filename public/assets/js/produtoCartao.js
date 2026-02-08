document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".vitrine-container").forEach(container => {
        const vitrine = container.querySelector(".vitrine");
        const btnLeft = container.querySelector(".vitrine-btn.left");
        const btnRight = container.querySelector(".vitrine-btn.right");

        const card = vitrine.querySelector(".produto-card");
        if (!card) return;

        const gap = 20;
        const scrollAmount = card.offsetWidth + gap;

        btnRight.addEventListener("click", () => {
            vitrine.scrollBy({ left: scrollAmount * 4, behavior: "smooth" });
        });

        btnLeft.addEventListener("click", () => {
            vitrine.scrollBy({ left: -scrollAmount * 4, behavior: "smooth" });
        });
    });

});