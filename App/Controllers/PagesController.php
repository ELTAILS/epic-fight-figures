<?php

namespace App\Controllers;

class PagesController {
    public function index(): void {
        include_once __DIR__ . "/../Views/pages/index.php";
    }

    public function erro(): void {
        include_once __DIR__ . "/../Views/pages/erro.php";
    }
    
    public function mangas(): void {
        include_once __DIR__ . "/../Views/pages/mangas.php";
    }

    public function actionFigures(): void {
        include_once __DIR__ . "/../Views/pages/ActionFigures.php";
    }

    public function sobreMim(): void {
        include_once __DIR__ . "/../Views/pages/sobreMim.php";
    }

    public function legal(): void {
        include_once __DIR__ . "/../Views/pages/legal.php";
    }

}