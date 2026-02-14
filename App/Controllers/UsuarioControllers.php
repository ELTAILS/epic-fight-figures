<?php

namespace App\Controllers;

use App\Database\Conexao;
use App\Helpers\Response;
use App\Repository\UsuarioRepository;
use App\Services\UsuarioService;
use Exception;

class UsuarioControllers {
    private UsuarioService $service;

    public function __construct(){
        $conexao = new Conexao;
        $repo = new UsuarioRepository($conexao->getPdo());
        $this->service = new UsuarioService($repo);
    }


    public function render(string $views): void {
        require_once __DIR__ . "/../Views/layouts/header.php";
        require_once __DIR__ . "/../Views/pages/login/$views.php";
        require_once __DIR__ . "/../Views/layouts/footer.php";
    }

    public function loginPage(): void {
        $this->render('login');
    }

    public function registroPage(): void {
        $this->render('registro');
    }

    public function registroUsuario(): void {
        
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            Response::jsonResponse(405,false,null,'Método invalido!');
        }

        $dados = json_decode(file_get_contents("php://input"), true);

        try {
            $this->service->UsuarioCriado($dados);
            Response::jsonResponse(201,true,'Usuario cadastrado com sucesso!');
        } catch (Exception $e) {
            Response::jsonResponse(500,false,null,'Erro interno: ' . $e->getMessage());
        }
    }

}