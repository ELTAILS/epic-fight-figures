<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use InvalidArgumentException;

class UsuarioService {
    public function __construct(private UsuarioRepository $repo){}

    public function UsuarioCriado(array $dados): array {
        $nome = trim($dados['nome'] ?? '');
        $senha = trim($dados['senha'] ?? '');
        $email = filter_var($dados['email'] ?? null, FILTER_VALIDATE_EMAIL);

        if($nome === '' || strlen($senha) < 6 || !$email){
            throw new InvalidArgumentException('Dados Invalidos!');
        }

        if($this->repo->buscarEmail($email)){
            throw new InvalidArgumentException('Email já cadastrado!');
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $this->repo->criarConta($nome,$email,$senha_hash);

        $usuario = $this->repo->buscarUsuarioPorEmail($email);

        return $usuario;

    }

    public function usuarioLogin(array $dados): void {
        $email = filter_var($dados['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $senha = $dados['senha'] ?? '';

        if(!$email || !$senha){
            throw new InvalidArgumentException("Email ou senha inválidos");
        }

        $usuario = $this->repo->buscarEmail($email);

        if(!$usuario){
            throw new InvalidArgumentException("Usuário não encontrado");
        }

        if(!password_verify($senha, $usuario['senha'])){
            throw new InvalidArgumentException("Senha incorreta");
        }

        $_SESSION['usuario'] = [

            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']

        ];
    }


}