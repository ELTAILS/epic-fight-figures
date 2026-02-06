<?php

namespace App\Repository;

use PDO;

class ProdutosRepository {
    public function __construct(private PDO $pdo){}

    public function listarProdutos(): array {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listarPorCategoria(string $categoria): array {
        $sql = "SELECT * FROM produtos WHERE categoria = :c";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':c', $categoria);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function buscarPorNome(string $busca): array {
        $sql = "SELECT * FROM produtos WHERE nome LIKE :busca";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':busca', "%$busca%");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //criar,excluir e editar vai ser criado quando fazer a pagina ADM

}