<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use InvalidArgumentException;

class UsuarioService {
    public function __construct(private UsuarioRepository $repo){}

    public function UsuarioCriado(array $dados): void {
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

    }

    public function usuarioLogin(array $dados): void {

        $email = filter_var($dados['email'] ?? null, FILTER_VALIDATE_EMAIL);
        $senha = $dados['senha'] ?? null;
        
        if(!$email){
            throw new InvalidArgumentException('Email inválido!');
        }

        $usuario = $this->repo->buscarUsuarioPorEmail($email);

        if(!$usuario){
            throw new InvalidArgumentException('Email não encontrado!');
        }

        if(!password_verify($senha, $usuario['senha'])){
            throw new InvalidArgumentException('Senha incorreta!');
        }

        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];

    }


}