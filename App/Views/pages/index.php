<!--Carrossel-->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="#"><img src="assets/img/carrossel/site.png" class="d-block w-100" alt="imagem carrossel 1"></a>
        </div>
        <div class="carousel-item">
            <a href="mangas"><img src="assets/img/carrossel/mangas.png" class="d-block w-100" alt="imagem carrossel 2"></a>
        </div>
        <div class="carousel-item">
            <a href="actionFigures"><img src="assets/img/carrossel/actionFigures.png" class="d-block w-100" alt="imagem carrossel 3"></a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Voltar</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Proximo</span>
    </button>
</div>
<!--Broquinho de anuncios-->
<section class="vantagens container-fluid my-5 px-3">
    <div class="row text-center gy-4">
        <div class="col-6 col-md-3">
            <div class="vantagem-item">
                <i class="fa-solid fa-credit-card"></i>
                <p>Pague em até <strong>12x</strong> no cartão</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="vantagem-item">
                <i class="fa-solid fa-truck"></i>
                <p>Entregamos em todo <strong>Brasil</strong></p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="vantagem-item">
                <i class="fa-solid fa-shield-halved"></i>
                <p>Site <strong>100% seguro</strong></p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="vantagem-item">
                <i class="fa-solid fa-thumbs-up"></i>
                <p>Conteúdo <strong>educativo</strong> e confiável</p>
            </div>
        </div>
    </div>
</section>

<!--Produtos -->

<h2 class="h2 text-center">📕 Novidades que chegaram pra você</h2>

<?php
$vitrines = array_chunk($produtos, 8);
?>

<?php foreach ($vitrines as $index => $bloco): ?>
<?php if($index === 4) break;?>
   
    <!--bloco te texto-->

    <?php if ($index === 2): ?>
        <section class="promo-container my-5">
            <div class="promo-card">
                <div class="promo-img">
                    <img src="assets/img/rimuru.png" alt="Promoção Mangás">
                </div>
                <div class="promo-text">
                    <h2>⚔️ PROMOÇÃO 4x3 ⚔️</h2>
                    <p>Leve 4 mangás e pague apenas 3!</p>
                    <a href="?url=mangas" class="btn-promo">Aproveitar agora</a>
                </div>
            </div>
        </section>

        <h2 class="h2 text-center">Mais Populares</h2>

    <?php endif; ?>

    <!-- VITRINE -->
    <section class="vitrine-container">

        <button class="vitrine-btn left" onclick="scrollVitrine(-1, <?= $index ?>)">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="vitrine" id="vitrine-<?= $index ?>">
            <?php foreach ($bloco as $produto): ?>
                <div class="produto-card m-auto">
                    <img src="assets/img/produtos/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                    <h5><?= $produto['nome'] ?></h5>
                    <p><?= $produto['descricao'] ?></p>
                    <span class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                    <div class="btn-produto">
                        <a href="produto?id=<?= $produto['id'] ?>">Comprar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="vitrine-btn right" onclick="scrollVitrine(1, <?= $index ?>)">
            <i class="fa-solid fa-chevron-right"></i>
        </button>

    </section>

<?php endforeach; ?>

<!--Sobre o site e termos legais-->
<section class="termos-legais container my-5">
    <div class="cards-legais">

        <div class="card legal-card">
            <img src="assets/img/termosLegais/educativo.png" class="card-img-top" alt="E-commerce Educativo">
            <div class="card-body">
                <p><strong>E-commerce Educativo</strong></p>
                <p class="card-text">Este site é um e-commerce educativo desenvolvido sem fins financeiros ou lucrativos. O objetivo principal é simular o funcionamento de uma loja real para fins de aprendizado e prática de desenvolvimento.</p>
            </div>
        </div>

        <div class="card legal-card">
            <img src="assets/img/termosLegais/portfolio.png" class="card-img-top" alt="Motivo do Projeto">
            <div class="card-body">
                <p><strong>Motivo do Projeto</strong></p>
                <p class="card-text">Este projeto foi criado como parte do meu portfólio pessoal. Ele demonstra minhas habilidades técnicas na construção de uma aplicação completa, focando em usabilidade, design e lógica de programação.</p>
            </div>
        </div>

        <div class="card legal-card">
            <img src="assets/img/termosLegais/mangas.png" class="card-img-top" alt="Por que Mangás?">
            <div class="card-body">
                <p><strong>Por que Mangás?</strong></p>
                <p class="card-text">A escolha por mangás se deve à sua identidade visual marcante e à estrutura organizada de volumes, o que torna o catálogo ideal para testar filtros, categorias e a exibição de produtos em um sistema de vendas.</p>
            </div>
        </div>

        <div class="card legal-card">
            <img src="assets/img/termosLegais/sobreMim.png" class="card-img-top" alt="Sobre Mim">
            <div class="card-body">
                <p><strong>Sobre Mim</strong></p>
                <p class="card-text">Sou um estudante de tecnologia e desenvolvedor em constante evolução. Dedico meu tempo a criar soluções criativas e funcionais, sempre buscando aprender novas ferramentas para entregar experiências digitais de qualidade.</p>
            </div>
        </div>

    </div>
</section>

<!--Scripts-->
<script src="assets/js/produtoCartao.js"></script>
<script src="assets/js/carrosselProdutos.js"></script>