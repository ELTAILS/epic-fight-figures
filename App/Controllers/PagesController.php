<?php

namespace App\Controllers;

use App\Database\Conexao;
use App\Services\ProdutoService;
use App\Repository\ProdutosRepository;

class PagesController {

    private ProdutoService $service;

    public function __construct() {
        $conexao = new Conexao;
        $repo = new ProdutosRepository($conexao->getPdo());
        $this->service = new ProdutoService($repo); 
    }

    private function render(string $view, array $dados = []) {
        extract($dados);

        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . "/../Views/pages/$view.php";
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }
    
    public function index(): void {
        $produtos = $this->service->listarDestaques(4);
        $this->render('index', ['produtos' => $produtos]);
    }

    public function erro(): void {
        $this->render('erro');
    }
    
    public function mangas(): void {
        $produtos = $this->service->listarPorCategoria('mangas');
        $this->render('mangas', ['produtos' => $produtos]);
    }

    public function actionFigures(): void {
        $produtos = $this->service->listarPorCategoria('actionFigures');
        $this->render('actionFigures', ['produtos' => $produtos]);
    }

    public function sobreMim(): void {
        $this->render('sobreMim');
    }

    public function legal(): void {
        $this->render('legal');
    }

    public function buscar(): void {
        $nome = $_GET['busca'] ?? '';
        $produtos = $this->service->buscar($nome);
        $this->render('buscar',['produtos' => $produtos]);
    }

}