<?php

namespace App\Utils;

class Sanitizador {
    public static function limpiarHTML($dato): string {
        return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
    }
    public static function sanitizarEntrada($dato): string {
        return trim(strip_tags($dato));
    }
    public static function sanitizarNumero($dato): string {
        return preg_replace('/[^0-9.]/', '', $dato);
    }
}
?>