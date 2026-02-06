<?php

use App\Controllers\PagesController;

//chama todos os pacotes
require_once __DIR__ . "/../vendor/autoload.php";

//Pega a Url
$url = $_GET['url'] ?? '/';

//Chama o controller
$controllerPages = new PagesController;

//Escolhe a pagina baseado na URL
switch($url){
    case '/':
        $controllerPages->index(); // Home do site
        break;
    case 'mangas':
        $controllerPages->mangas(); // parte de vendas de mángas
        break;
    case 'actionFigures':
        $controllerPages->actionFigures(); //parte de vendas de Action Figures
        break;
    case 'sobreMim':
        $controllerPages->sobreMim(); // sobre mim e meu curriculo
        break;
    case 'legal':
        $controllerPages->legal(); // sobre a parte legal do site
        break;
    case 'buscar':
        $controllerPages->buscar();
        break;
    default:
        $controllerPages->erro(); // Pagina de erro
        break;
}