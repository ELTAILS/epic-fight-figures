<?php

namespace App\Helpers;

class Response {
    public static function jsonResponse(int $statusCode, bool $status, $data = null, $erro = null) {
        http_response_code($statusCode);

        echo json_encode(['status' => $status, 'data' => $data, 'erro' => $erro]);
        exit;
    }
}