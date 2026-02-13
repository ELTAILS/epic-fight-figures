<?php

namespace App\Services;

use App\Repository\CarrinhoRepository;
use App\Repository\ProdutosRepository;
use Exception;

class CarrinhoService {
    public function __construct(private CarrinhoRepository $repo, private ProdutosRepository $produtoRepo){}

    public function buscarCarrinhoAtivoPorUsuario(int $id_usuario): ?array {
        return $this->repo->buscarCarrinhoAtivoPorUsuario($id_usuario);
    }

    public function criarCarrinho(int $id_usuario): int {
        return $this->repo->criarCarrinho($id_usuario);
    }

    public function adicionarProduto(int $usuario_id, int $produto_id, int $quantidade): void {

        if ($quantidade < 1 || $quantidade > 9) {
            throw new Exception("Quantidade inválida.");
        }

        $carrinho = $this->repo->buscarCarrinhoAtivoPorUsuario($usuario_id);

        if (!$carrinho) {
            $carrinho_id = $this->repo->criarCarrinho($usuario_id);
        } else {
            $carrinho_id = $carrinho['id'];
        }

        $produto = $this->produtoRepo->buscarPorId($produto_id);

        if (!$produto) {
            throw new Exception("Produto não encontrado.");
        }

        $preco_unitario = $produto['preco'];

        $itemExistente = $this->repo->buscarItemNoCarrinho($carrinho_id, $produto_id);

        if ($itemExistente) {
            $novaQuantidade = $itemExistente['quantidade'] + $quantidade;

            if ($novaQuantidade > 9) {
                throw new Exception("Limite máximo por item atingido.");
            }

            $this->repo->atualizarQuantidade($carrinho_id, $produto_id, $novaQuantidade, $preco_unitario);
        } else {
            $this->repo->adicionarProduto($carrinho_id, $produto_id, $quantidade, $preco_unitario);
        }

        $this->repo->atualizarTotalCarrinho($carrinho_id);
    }


    public function removerProduto(int $carrinho_id, int $produto_id) {
        return $this->repo->removerProduto($carrinho_id,$produto_id);
    }

    public function atualizarTotalCarrinho(int $carrinho_id) {
        return $this->repo->atualizarTotalCarrinho($carrinho_id);
    }

    public function listarItensDoCarrinho(int $carrinho_id) {
        return $this->repo->listarItensDoCarrinho($carrinho_id);
    }

}