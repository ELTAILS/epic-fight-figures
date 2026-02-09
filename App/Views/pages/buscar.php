<h2>🔎 Resultados</h2>
<section class="vitrine-container">
    <button class="vitrine-btn left" onclick="scrollVitrine(-1)">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <div class="vitrine" id="vitrine">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto-card m-auto">
                <img src="assets/img/produtos/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                <h5><?= $produto['nome'] ?></h5>
                <p><?= $produto['descricao'] ?></p>
                <span class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                <div class="btn-produto"><a href="?url=produto&id=<?= $produto['id'] ?>">Comprar</a></div>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="vitrine-btn right" onclick="scrollVitrine(1)">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
</section>

<script src="assets/js/produtoCartao.js"></script>