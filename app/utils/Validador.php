<?php

namespace App\utils;

class Validador {
    public static function esNumeroPositivo($dato): bool {
        return filter_var($dato, FILTER_VALIDATE_FLOAT) !== false && $dato > 0;
    }
    public static function esEmailValido($email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public static function esSoloLetras($texto): bool {
        return preg_match('/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]+$/', $texto) === 1;
    }
}
?>