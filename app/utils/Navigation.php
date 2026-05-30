<?php

namespace App\Utils;

class Navigation {
    /**
     * Genera un enlace para volver al menú principal
     * 
     * @param string $url URL del menú principal (ej: "index.php")
     * @return string HTML del enlace
     */
    public static function backToMenu($url = 'index.php'): string {
        $url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        return '<p><a href="' . $url . '">← Volver al menú</a></p>';
    }
    
    /**
     * Genera un enlace de navegación personalizado
     * 
     * @param string $url URL del destino
     * @param string $text Texto del enlace
     * @param string $class Clase CSS opcional
     * @return string HTML del enlace
     */
    public static function link($url, $text, $class = ''): string {
        $url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
        $classAttr = $class ? ' class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '"' : '';
        return '<a href="' . $url . '"' . $classAttr . '>' . $text . '</a>';
    }
}
?>
