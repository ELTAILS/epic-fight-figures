<section class="produto py-5">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!--Imagem-->
            <div class="col-12 col-md-6 col-lg-5 text-center">
                <img src="assets/img/produtos/<?= $produto['imagem'] ?>" class="produto-img img-fluid" alt="<?= $produto['nome'] ?>">
            </div>
            <!--Descrição-->
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="produto-titulo"><?= $produto['nome'] ?></h2>
                <p class="produto-descricao">
                    <strong>Descrição:</strong><br>
                    <?= $produto['descricao'] ?>
                </p>
            </div>
            <!--Compra-->
            <div class="col-12 col-lg-3">
                <div class="box-compra">
                    <p class="produto-preco">
                        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                    </p>
                    <label class="fw-bold">Quantidade</label>
                    <select class="form-select mb-3" id="quantidade">
                        <?php for($i=1;$i<=9;$i++): ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <button class="btn btn-comprar w-100 mb-2" id="comprar-produto">Comprar</button>
                    <button class="btn btn-carrinho w-100">Adicionar ao Carrinho</button>
                    <hr>
                    <p class="fw-bold">Calcular Frete</p>
                    <form class="frete-box">
                        <input type="text" placeholder="Digite seu CEP" class="form-control">
                        <button type="submit" class="btn-frete" id="cep">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Detalhes do produto-->
<section class="ficha-tecnica container" style="margin-top: 2rem; margin-bottom: 2rem;">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <i class="fa-solid fa-screwdriver"></i> Ficha tecnica
                </button>
            </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="list-group">
                        <li class="list-group-item">Nome: <?= $produto['nome'] ?></li>
                        <li class="list-group-item">Tipo: <?= $produto['categoria'] ?></li>
                        <li class="list-group-item">Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></li>
                        <li class="list-group-item">Idade recomendada: <?= $produto['idade_recomendada'] ?></li>
                        <li class="list-group-item">Genero: <?= $produto['genero'] ?></li>
                        <li class="list-group-item">Sabemos que você busca o melhor que cabe no seu bolso. Por isso, trabalhamos apenas com materiais premium e rigorosos testes de excelência. Qualidade garantida em cada entrega!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Script-->
<script src="assets/js/produto.js"></script>