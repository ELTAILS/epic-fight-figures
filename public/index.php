<?php

use App\Controllers\PagesController;

//chama todos os pacotes
require_once __DIR__ . "/../vendor/autoload.php";

//Pega a Url
$url = $_GET['url'] ?? '/';

//Chama o controller
$controller = new PagesController;

//header inicio do site
include_once __DIR__ . "/../App/Views/layouts/header.php";

//Escolhe a pagina baseado na URL
switch($url){
    case '/':
        $controller->index(); // Home
        break;
    default:
        $controller->erro(); // Pagina de erro
        break;
}

//Footer
include_once __DIR__ . "/../App/Views/layouts/footer.php";