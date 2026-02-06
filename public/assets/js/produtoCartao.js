function scrollVitrine(direction) {
    const vitrine = document.getElementById('vitrine');
    if (!vitrine) return;

    const cards = vitrine.querySelectorAll('.produto-card');
    if (cards.length === 0) return;

    const cardStyle = window.getComputedStyle(cards[0]);
    const gap = parseInt(window.getComputedStyle(vitrine).gap) || 0;

    const cardWidth = cards[0].offsetWidth + gap;

    vitrine.scrollBy({
        left: direction * cardWidth * 2,
        behavior: 'smooth'
    });
}