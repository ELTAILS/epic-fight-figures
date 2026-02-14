<?php 

namespace App\Repository;

use PDO;

class UsuarioRepository {
    public function __construct(private PDO $pdo){}
    //Criar conta
    public function criarConta(string $nome, string $email, string $senha): void{
        $sql = "INSERT INTO usuarios (nome,email,senha,criado_em,atualizado_em) VALUES (:n, :e, :s, NOW(), NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':n',$nome);
        $stmt->bindValue(':e',$email);
        $stmt->bindValue(':s',$senha);
        $stmt->execute();
    }
    //Validar se o email é diferente
    public function buscarEmail(string $email): bool {
        $sql = "SELECT email FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':e',$email);
        $stmt->execute();
        return $stmt->fetch() ?: false;
    }
    //Buscar o nome do usuario para mostrar no header
    public function buscarNome(int $id): string {
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Login
    public function usuarioLogin(string $senha, string $email): ?array {
        $sql = "SELECT * FROM usuarios WHERE senha = :s AND email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':s',$senha);
        $stmt->bindValue(':e',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}