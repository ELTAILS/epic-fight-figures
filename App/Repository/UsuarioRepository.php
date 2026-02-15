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
    public function buscarNome(int $id): ?array {
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //Login
    public function usuarioLogin(string $email): ?array {
        $sql = "SELECT id, nome, senha FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':e',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    //senha
    public function senhaHashUsuario(string $email): ?string {
        $sql = "SELECT senha FROM usuairios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':e',$email);
        $stmt->execute();
        return $resultado['senha'] ?? null;
    }
    //buscar email
    public function buscarUsuarioPorEmail(string $email): ?array {
        $sql = "SELECT id, nome, senha FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}