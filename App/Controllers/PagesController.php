<?php

namespace App\Controllers;

class PagesController {

    private function render(string $view) {
        require_once __DIR__ . '/../Views/layouts/header.php';
        require_once __DIR__ . "/../Views/pages/$view.php";
        require_once __DIR__ . '/../Views/layouts/footer.php';
    }

    public function index(): void {
        $this->render('index');
    }

    public function erro(): void {
        $this->render('erro');
    }
    
    public function mangas(): void {
        $this->render('mangas');
    }

    public function actionFigures(): void {
        $this->render('actionFigures');
    }

    public function sobreMim(): void {
        $this->render('sobreMim');
    }

    public function legal(): void {
        $this->render('legal');
    }

    public function buscar(): void {
        // $this->render('buscar');
    }

}