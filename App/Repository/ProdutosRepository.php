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

    //criar,excluir e editar vai ser criado quando fazer a pagina ADM

}