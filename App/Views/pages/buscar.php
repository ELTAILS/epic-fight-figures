<div class="container-fluid pagina-produtos">
    <div class="row">
        <!-- 🔎 SIDEBAR DE FILTROS -->
        <aside class="col-lg-3 col-md-4 sidebar-filtros">
            
        <form method="GET" action="">
            <input type="hidden" name="url" value="buscar">

            <h5 class="titulo-filtro">
                <i class="fa-solid fa-filter"></i> Filtros
            </h5>

            <!-- PREÇO -->
            <div class="filtro-box">
                <h6><i class="fa-solid fa-dollar-sign"></i> Preço</h6>
                <input type="number" name="min" min="0" step="0.01" placeholder="Mínimo" class="form-control mb-2">
                <input type="number" name="max" min="0" step="0.01" placeholder="Máximo" class="form-control">
            </div>

            <!-- IDADE -->
            <div class="filtro-box">
                <h6><i class="fa-solid fa-child"></i> Idade recomendada</h6>
                <select class="form-select" name="idade">
                    <option value="">Todas</option>
                    <option value="10">+10</option>
                    <option value="12">+12</option>
                    <option value="14">+14</option>
                    <option value="16">+16</option>
                </select>
            </div>

            <!-- GÊNERO -->
            <div class="filtro-box">
                <h6><i class="fa-solid fa-book"></i> Gênero</h6>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="Ação" id="acao">
                    <label class="form-check-label" for="acao">Ação</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="Aventura" id="aventura">
                    <label class="form-check-label" for="aventura">Aventura</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="Fantasia" id="fantasia">
                    <label class="form-check-label" for="fantasia">Fantasia</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="Suspense" id="suspense">
                    <label class="form-check-label" for="suspense">Suspense</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="Terror" id="terror">
                    <label class="form-check-label" for="terror">Terror</label>
                </div>
            </div>

            <button type="submit" class="btn btn-warning w-100 mt-3">
                <i class="fa-solid fa-check"></i> Aplicar Filtros
            </button>
        </form>

        
        </aside>
        <!--Produto-->
        <section class="col-lg-9 col-md-8 area-produtos">
            <h2 class="h2 text-center">🔎Resultados🔎</h2>

            <?php
                $produtosPorVitrine = 5;
                $vitrines = array_chunk($produtos, $produtosPorVitrine);
            ?>

            <?php foreach ($vitrines as $index => $bloco): ?>
            <?php if ($index === 4) break; ?>

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
                                <a href="?url=produto&id=<?= $produto['id'] ?>">Comprar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <button class="vitrine-btn right" onclick="scrollVitrine(1, <?= $index ?>)">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

            </section>
            <?php endforeach; ?>

        </section>

    </div>
</div>

<script src="assets/js/carrosselProdutos.js"></script>
<script src="assets/js/produtoCartao.js"></script>