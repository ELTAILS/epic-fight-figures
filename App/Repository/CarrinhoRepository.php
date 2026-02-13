<?php 

namespace App\Repository;

use PDO;

class CarrinhoRepository {
    public function __construct(private PDO $pdo){}

    public function buscarCarrinhoAtivoPorUsuario(int $id_usuario): ?array {
        $sql = "SELECT * from carrinhos WHERE usuario_id = :id AND status = 'ativo' LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function criarCarrinho(int $id_usuario): int {
        $sql = "INSERT INTO carrinhos (usuario_id, status, total) VALUES (:id, 'ativo', 0.00)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $this->pdo->lastInsertId();
    }

    public function adicionarProduto(int $carrinho_id, int $produto_id, int $quantidade, float $preco_unitario): void {
        $subtotal = $quantidade * $preco_unitario;
        $sql = "INSERT INTO carrinho_itens (carrinho_id,produto_id,quantidade,preco_unitario,subtotal) VALUES (:id_c,:id_p,:q,:pu,sub)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c',$carrinho_id,PDO::PARAM_INT);
        $stmt->bindValue(':id_p',$produto_id,PDO::PARAM_INT);
        $stmt->bindValue(':q',$quantidade);
        $stmt->bindValue(':pu',$preco_unitario);      
        $stmt->bindValue(':sub', $subtotal);
        $stmt->execute();
    }

    public function removerProduto(int $carrinho_id, int $produto_id): void {
        $sql = "DELETE FROM carrinho_itens WHERE carrinho_id = :id_c AND produto_id = :id_p";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c',$carrinho_id,PDO::PARAM_INT);
        $stmt->bindValue(':id_p',$produto_id,PDO::PARAM_INT);
        $stmt->execute();
    }

    public function atualizarTotalCarrinho(int $carrinho_id): array {
        $sql = "SELECT SUM(subtotal) FROM carrinho_itens WHERE carrinho_id = :id_c";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c',$carrinho_id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarItensDoCarrinho(int $carrinho_id): array {
        $sql = "SELECT * FROM carrinho_itens WHERE carrinho_id = :id_c";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c',$carrinho_id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarQuantidade(int $carrinho_id, int $produto_id, int $novaQuantidade, float $preco_unitario): void {
        $novoSubtotal = $novaQuantidade * $preco_unitario;
        $sql = "UPDATE carrinho_itens SET quantidade = :q, subtotal = :sub WHERE carrinho_id = :id_c AND produto_id = :id_p";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c', $carrinho_id, PDO::PARAM_INT);
        $stmt->bindValue(':id_p', $produto_id, PDO::PARAM_INT);
        $stmt->bindValue(':q', $novaQuantidade, PDO::PARAM_INT);
        $stmt->bindValue(':sub', $novoSubtotal);
        $stmt->execute();
    }

    public function buscarItemNoCarrinho(int $carrinho_id, int $produto_id): ?array {
        $sql = "SELECT * FROM carrinho_itens WHERE carrinho_id = :id_c AND produto_id = :id_p";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_c',$carrinho_id,PDO::PARAM_INT);
        $stmt->bindValue(':id_p',$produto_id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

}