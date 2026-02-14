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
}