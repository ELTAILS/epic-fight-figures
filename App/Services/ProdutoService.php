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

    public function listarPorGenero(string $genero): array {
        $genero = $this->repo->buscarPorGenero($genero);
        shuffle($genero);
        return $genero;
    }

    public function buscar(string $nome): array {
        return $this->repo->buscarPorNome($nome);
    }

    public function produtoPorId(int $id): ?array {
        return $this->repo->buscarPorId($id);
    }

    public function listarPorIdade(int $idade): array {
        return $this->repo->buscarPorIdade($idade);
    }

    public function listarPorPreco(float $preco): array {
        return $this->repo->buscarPorPreco($preco);
    }

}