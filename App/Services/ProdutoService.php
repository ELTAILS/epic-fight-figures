<?php

namespace App\Services;

use App\Repository\ProdutosRepository;

class ProdutoService {
    public function __construct(private ProdutosRepository $repo){}

    public function listarDestaques(): array {
        $produtos = $this->repo->listarProdutos();
        shuffle($produtos);
        return $produtos;
    }

    public function listarPorCategoria(string $categoria): array {
        $categoria = $this->repo->listarPorCategoria($categoria);
        shuffle($categoria);
        return $categoria;
    }

    public function buscar(string $nome): array {
        return $this->repo->buscarPorNome($nome);
    }

    public function produtoPorId(int $id): ?array {
        return $this->repo->buscarPorId($id);
    }

    // public function produtoFilter(string $genero, float $min, float $max, int $idade): ?array {
    //     return $this->repo->buscarFilter($genero,$min,$max,$idade);
    // }

    public function produtoFilter(array $dados): array {
        $genero = trim($dados['genero'] ?? '') ?: null;
        $min    = isset($dados['min']) && $dados['min'] !== '' ? (float)$dados['min'] : null;
        $max    = isset($dados['max']) && $dados['max'] !== '' ? (float)$dados['max'] : null;
        $idade  = isset($dados['idade']) && $dados['idade'] !== '' ? (int)$dados['idade'] : null;

        return $this->repo->buscarFilter($genero, $min, $max, $idade);
    }
}