<?php

namespace App\Services;

use App\Repository\ProdutosRepository;

class ProdutoService {
    public function __construct(private ProdutosRepository $repo){}

    public function listarDestaques(int $limite = 4): array {
        $produtos = $this->repo->listarProdutos();
        shuffle($produtos);
        return array_slice($produtos, 0, $limite);
    }

    public function listarPorCategoria(string $categoria): array {
        return $this->repo->listarPorCategoria($categoria);
    }

    public function buscar(string $nome): array {
        return $this->repo->buscarPorNome($nome);
    }

    public function produtoPorId(int $id): ?array {
        return $this->repo->buscarPorId($id);
    }

    public function listarPorIdade(int $idade): array{
        return $this->repo->buscarPorIdade($idade);
    }

    public function listarPorGenero(string $genero): array{
        return $this->repo->buscarPorGenero($genero);
    }

    public function listarPorPreco(float $preco): array{
        return $this->repo->buscarPorPreco($preco);
    }

}