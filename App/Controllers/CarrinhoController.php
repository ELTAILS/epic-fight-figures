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

    private function getUsuarioId(): int {

        if(!isset($_SESSION['usuario_id'])){
            header("Location: " . BASE_URL);
            exit;
        }

        return $_SESSION['usuario_id'];
    }


    public function carrinhoPage(): void {

        if(!isset($_SESSION['usuario_id'])){
            header("Location: " . BASE_URL . "login");
            exit;
        }

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

        if(!isset($_SESSION['usuario_id'])){
            header("Location: " . BASE_URL . "login");
            exit;
        }

        $usuario_id = $this->getUsuarioId();

        $produto_id = (int) ($_GET['produto'] ?? 0);
        $quantidade = (int) ($_GET['qtd'] ?? 1);

        $this->service->adicionarProduto($usuario_id, $produto_id, $quantidade);

        header("Location: " . BASE_URL . "carrinho");
        exit;
    }

    public function remover(): void {
        $usuario_id = $this->getUsuarioId();
        $produto_id = (int) ($_GET['produto'] ?? 0);
        $carrinho = $this->service->buscarCarrinhoAtivoPorUsuario($usuario_id);
        if($carrinho){
            $this->service->removerProduto($carrinho['id'], $produto_id);
        }
        header("Location: " . BASE_URL . "carrinho");
        exit;
    }

    public function finalizar(): void {
        if(!isset($_SESSION['usuario_id'])){
            header("Location: " . BASE_URL . "login");
            exit;
        }

        $usuario_id = $_SESSION['usuario_id'];
        $this->service->finalizarCarrinho($usuario_id);
        // mensagem temporária
        $_SESSION['sucesso'] = "Obrigado por comprar conosco! 🎉";
        header("Location: " . BASE_URL . "carrinho");
        exit;
    }


}