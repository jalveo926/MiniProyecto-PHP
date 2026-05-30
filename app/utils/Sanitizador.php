<?php

namespace App\Utils;

/**
 * Clase de sanitización de datos
 * Utiliza métodos estáticos para limpiar entrada de datos de forma segura
 * Implementa: htmlspecialchars(), preg_replace() y strip_tags()
 * 
 * @package App\Utils
 */
class Sanitizador {
    
    /**
     * Limpia HTML y caracteres especiales
     * Utiliza htmlspecialchars() para evitar inyección XSS
     * 
     * @param string $dato Dato a limpiar
     * @return string Dato limpio y seguro
     */
    public static function limpiarHTML($dato): string {
        return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Sanitiza entrada removiendo etiquetas HTML
     * Utiliza trim() para remover espacios y strip_tags() para etiquetas
     * 
     * @param string $dato Dato a sanitizar
     * @return string Dato limpio sin etiquetas
     */
    public static function sanitizarEntrada($dato): string {
        return trim(strip_tags($dato));
    }
    
    /**
     * Sanitiza números removiendo caracteres no numéricos
     * Utiliza preg_replace() para mantener solo dígitos y puntos
     * Útil para: precios, cantidades, valores decimales
     * 
     * @param string $dato Dato a sanitizar
     * @return string Solo números y puntos
     */
    public static function sanitizarNumero($dato): string {
        return preg_replace('/[^0-9.]/', '', $dato);
    }
    
    /**
     * Sanitiza datos para insertar en base de datos
     * Combina limpieza de HTML y escape de caracteres especiales
     * 
     * @param string $dato Dato a sanitizar
     * @return string Dato listo para base de datos
     */
    public static function sanitizarParaBD($dato): string {
        return addslashes(self::limpiarHTML($dato));
    }
}
?>