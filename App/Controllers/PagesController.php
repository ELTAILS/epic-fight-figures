<?php

namespace App\Controllers;

class PagesController {
    public function index(): void {
        include_once __DIR__ . "/../Views/pages/index.php";
    }

    public function erro(): void {
        include_once __DIR__ . "/../Views/pages/erro.php";
    }
}