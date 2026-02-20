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
            $usuario = $this->service->UsuarioCriado($dados);
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            Response::jsonResponse(201,true,'Usuario cadastrado com sucesso!');
        } catch (Exception $e) {
            Response::jsonResponse(500,false,null,'Dados invalidos!');
        }
    }

    public function loginUsuario(): void {

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            Response::jsonResponse(405,false,null,'Método invalido!');
            exit;
        }

        $dados = json_decode(file_get_contents("php://input"), true);

        if(!$dados || !isset($dados['email'], $dados['senha'])){
            Response::jsonResponse(400,false,null,'Dados inválidos');
            exit;
        }

        try {
            $this->service->usuarioLogin($dados);
            session_regenerate_id(true);
            Response::jsonResponse(200,true,null,'Usuario logado com sucesso!');
            exit;
        } catch (Exception $e) {
            Response::jsonResponse(401,false,null,'Email ou senha inválidos');
            exit;
        }

    }

    public function deslogarUsuario(): void {
        session_start();
        $_SESSION = array();
        session_destroy();
        $home = BASE_URL;

        header("Location: " . BASE_URL);
        exit;
    }

}