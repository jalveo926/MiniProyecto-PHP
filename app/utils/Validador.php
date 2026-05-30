<?php

namespace App\Utils;

/**
 * Clase de validación de datos
 * Utiliza métodos estáticos para validar diferentes tipos de entrada
 * 
 * @package App\Utils
 */
class Validador {
    
    /**
     * Valida que un dato sea un número positivo
     * Utiliza filter_var con FILTER_VALIDATE_FLOAT
     * 
     * @param mixed $dato Dato a validar
     * @return bool True si es número positivo, false en caso contrario
     */
    public static function esNumeroPositivo($dato): bool {
        return filter_var($dato, FILTER_VALIDATE_FLOAT) !== false && $dato > 0;
    }
    
    /**
     * Valida que un email sea válido
     * Utiliza filter_var con FILTER_VALIDATE_EMAIL
     * 
     * @param string $email Email a validar
     * @return bool True si es válido, false en caso contrario
     */
    public static function esEmailValido($email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    /**
     * Valida que el texto contenga solo letras y espacios
     * Utiliza preg_match para validar caracteres alfabéticos
     * Soporta: a-z, A-Z, espacios, acentos (á,é,í,ó,ú,ü,ñ)
     * 
     * @param string $texto Texto a validar
     * @return bool True si contiene solo letras, false en caso contrario
     */
    public static function esSoloLetras($texto): bool {
        return preg_match('/^[a-zA-Z\u00E1\u00E9\u00ED\u00F3\u00FA\u00FC\u00F1\u00C1\u00C9\u00CD\u00D3\u00DA\u00DC\u00D1\s]+$/u', $texto) === 1;
    }
    
    /**
     * Valida que un dato sea un número en rango específico
     * 
     * @param mixed $dato Dato a validar
     * @param int $minimo Valor mínimo permitido
     * @param int $maximo Valor máximo permitido
     * @return bool True si está en rango, false en caso contrario
     */
    public static function esNumeroEnRango($dato, $minimo, $maximo): bool {
        $numero = filter_var($dato, FILTER_VALIDATE_FLOAT);
        return $numero !== false && $numero >= $minimo && $numero <= $maximo;
    }
}
?>