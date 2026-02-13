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
                <!-- Exemplo de item -->
                <tr>
                    <td>1</td>
                    <td>Action Figure Touka Kirishima</td>
                    <td>R$ 139,90</td>
                    <td>2</td>
                    <td>R$ 279,80</td>
                    <td>
                        <a href="#" class="text-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Resumo do carrinho -->
    <div class="row justify-content-center mt-4" style="margin-bottom: 1rem;">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Resumo do pedido</h5>
                    <p class="mb-1">Subtotal: <strong>R$ 279,80</strong></p>
                    <p class="text-success">Frete grátis</p>
                    <hr>
                    <h5>Total: <strong>R$ 279,80</strong></h5>
                    <a href="#" class="btn btn-primary w-100 mt-3">Finalizar Compra</a>
                </div>
            </div>
        </div>
    </div>
</div>