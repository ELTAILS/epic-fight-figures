<?php

namespace App\Controllers;

use App\Database\Conexao;
use App\Repository\CarrinhoRepository;
use App\Repository\ProdutosRepository;
use App\Services\CarrinhoService;

class CarrinhoController {

    private CarrinhoService $service;

    public function __construct() {
        $conexao = new Conexao();
        $repo = new CarrinhoRepository($conexao->getPdo());
        $repoProduto = new ProdutosRepository($conexao->getPdo());
        $this->service = new CarrinhoService($repo, $repoProduto);
    }

    // 🔐 Simulação de usuário logado (até implementar login)
    private function getUsuarioId(): int {
        // Futuramente será: return $_SESSION['usuario_id'];
        return 1; // Usuário fixo para testes
    }

    public function carrinhoPage(): void {

        $usuario_id = $this->getUsuarioId();

        $carrinho = $this->service->buscarCarrinhoAtivoPorUsuario($usuario_id);
        $itens = [];

        if ($carrinho) {
            $itens = $this->service->listarItensDoCarrinho($carrinho['id']);
        }

        require_once __DIR__ . "/../Views/layouts/header.php";
        require_once __DIR__ . "/../Views/pages/carrinho.php";
        require_once __DIR__ . "/../Views/layouts/footer.php";
    }

    public function adicionar(): void {

        $usuario_id = $this->getUsuarioId();

        $produto_id = (int) ($_GET['produto'] ?? 0);
        $quantidade = (int) ($_GET['qtd'] ?? 1);

        $this->service->adicionarProduto($usuario_id, $produto_id, $quantidade);

        header("Location: ?url=carrinho");
        exit;
    }

    public function remover(): void {

        $usuario_id = $this->getUsuarioId();
        $produto_id = (int) ($_GET['produto'] ?? 0);

        $this->service->removerProduto($usuario_id, $produto_id);

        header("Location: ?url=carrinho");
        exit;
    }
}