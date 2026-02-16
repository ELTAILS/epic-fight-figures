<?php
define('BASE_URL', '/epic-fight-figures/public/');

use App\Controllers\CarrinhoController;
use App\Controllers\PagesController;
use App\Controllers\UsuarioControllers;

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

//chama todos os pacotes
require_once __DIR__ . "/../vendor/autoload.php";

//Pega a Url
$url = $_GET['url'] ?? '/';
$url = trim($url, '/');

//Chama o controller
$controllerPages = new PagesController;
$controllerCarrinho = new CarrinhoController;
$controllerUsuario = new UsuarioControllers;
//Escolhe a pagina baseado na URL
switch($url){
    case '':
        $controllerPages->index();
        break;
    case 'mangas':
        $controllerPages->mangas();
        break;
    case 'actionFigures':
        $controllerPages->actionFigures();
        break;
    case 'sobreMim':
        $controllerPages->sobreMim();
        break;
    case 'legal':
        $controllerPages->legal();
        break;
    case 'buscar':
        $controllerPages->buscar();
        break;
    case 'produto':
        $controllerPages->buscarPorId();
        break;
    case 'carrinho':
        $controllerCarrinho->carrinhoPage();
        break;
    case 'registro':
        $controllerUsuario->registroPage();
        break;
    case 'registro-salvar':
        $controllerUsuario->registroUsuario();
        break;
    case 'login':
        $controllerUsuario->loginPage();
        break;
    case 'usuarioLogar':
        $controllerUsuario->loginUsuario();
        break;
    case 'deslogar':
        $controllerUsuario->deslogarUsuario();
        break;
    default:
        $controllerPages->erro(); // Pagina de erro
        break;
}