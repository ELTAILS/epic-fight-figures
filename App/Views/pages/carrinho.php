<?php if(isset($_SESSION['sucesso'])): ?>
    <div class="alert alert-success text-center">
        <?= $_SESSION['sucesso']; unset($_SESSION['sucesso']); ?>
    </div>
<?php endif; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Seu carrinho de compras 🛒🛍️</h2>
    <!-- Tabela de produtos -->
    <div class="table-responsive">
        <table class="table table-dark table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Excluir</th>
                </tr>
            </thead>
                <tbody>
                    <?php $total = 0 ?>
                    
                    <?php if(empty($itens)): ?>
                        <tr>
                            <td colspan="6">
                            Seu carrinho está vazio
                            </td>
                        </tr>
                    <?php else:
                        $total = 0;
                        foreach($itens as $index => $item):
                        $total += $item['subtotal'];

                    ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($item['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>R$ <?= number_format($item['preco_unitario'],2,',','.') ?></td>
                            <td><?= $item['quantidade'] ?></td>
                            <td>R$ <?= number_format($item['subtotal'],2,',','.') ?></td>
                            <td>
                            <a href="carrinho/remover?produto=<?= $item['produto_id'] ?>">
                            Excluir
                            </a>
                            </td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
        </table>
    </div>
    <!-- Resumo do carrinho -->
    <div class="row justify-content-center mt-4" style="margin-bottom: 1rem;">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Resumo do pedido</h5>
                    <p class="mb-1">Subtotal: <strong>R$<?= number_format($total, 2 , ",",".") ?></strong></p>
                    <p class="text-success">Frete grátis</p>
                    <hr>
                    <h5>Total: <strong>R$<?= number_format($total, 2 , ",",".") ?></strong></h5>
                    <a href="<?= BASE_URL ?>carrinho/finalizar" class="btn btn-primary w-100 mt-3">
                        Finalizar Compra
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>