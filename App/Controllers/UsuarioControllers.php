<?php

namespace App\Controllers;

class UsuarioControllers {

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

}