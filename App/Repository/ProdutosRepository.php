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

    public function buscarPorId(int $id): ?array {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        $produto = $stmt->fetch();
        return $produto ?: null;
    }

    // public function buscarFilter(string $genero, float $min, float $max, int $idade): ?array {
    //     $sql = "SELECT * FROM produtos WHERE genero = :g AND preco BETWEEN :min AND :max AND idade_recomendada = :i_r";
    //     $stmt = $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue(':g',$genero);
    //     $stmt->bindValue(':min',$min);
    //     $stmt->bindValue(':max',$max);
    //     $stmt->bindValue(':i_r',$idade);
    //     $stmt->execute();
    //     return $stmt->fetchAll() ?: null;
    // }

    public function buscarFilter(?string $genero, ?float $min, ?float $max, ?int $idade): array {
        $sql = "SELECT * FROM produtos WHERE 1=1";
        $params = [];

        if (!empty($genero)) {
            $sql .= " AND genero = :genero";
            $params[':genero'] = $genero;
        }

        if (!is_null($min)) {
            $sql .= " AND preco >= :min";
            $params[':min'] = $min;
        }

        if (!is_null($max)) {
            $sql .= " AND preco <= :max";
            $params[':max'] = $max;
        }

        if (!is_null($idade)) {
            $sql .= " AND idade_recomendada = :idade";
            $params[':idade'] = $idade;
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }


    //criar,excluir e editar vai ser criado quando fazer a pagina ADM

}