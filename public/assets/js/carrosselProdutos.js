document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".vitrine-container").forEach(container => {
        const vitrine = container.querySelector(".vitrine");
        const card = vitrine.querySelector(".produto-card");
        if (!card) return;

        const gap = 20;
        const scrollAmount = card.offsetWidth + gap;

        let autoScroll;

        function startAutoScroll() {
            autoScroll = setInterval(() => {
                // Se chegou no final, volta pro início
                if (vitrine.scrollLeft + vitrine.clientWidth >= vitrine.scrollWidth - 5) {
                    vitrine.scrollTo({ left: 0, behavior: "smooth" });
                } else {
                    vitrine.scrollBy({ left: scrollAmount, behavior: "smooth" });
                }
            }, 3500); // tempo entre movimentos
        }

        function stopAutoScroll() {
            clearInterval(autoScroll);
        }

        // Inicia automático
        startAutoScroll();

        // Pausa quando o mouse está em cima (usuário interagindo)
        container.addEventListener("mouseenter", stopAutoScroll);
        container.addEventListener("mouseleave", startAutoScroll);

        // Suporte para toque no celular
        container.addEventListener("touchstart", stopAutoScroll);
        container.addEventListener("touchend", startAutoScroll);
    });

});