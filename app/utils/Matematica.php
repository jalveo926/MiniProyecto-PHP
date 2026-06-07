<?php

namespace App\Utils;

/**
 * Clase de utilidades matemáticas
 * Encapsula funciones matemáticas comunes como métodos estáticos
 * Evita que funciones como sqrt(), pow() y otras estén "contra la piel" del código
 * 
 * @package App\Utils
 */
class Matematica {
    
    /**
     * Calcula la media (promedio) de un conjunto de números
     * Utiliza: array_sum() y count()
     * 
     * @param array $numeros Array de números
     * @return float Media de los números
     */
    public static function media(array $numeros): float {
        if (empty($numeros)) return 0;
        return array_sum($numeros) / count($numeros);
    }

    /**
     * Calcula la desviación estándar de un conjunto de números
     * Encapsula el uso de sqrt() y pow() para operaciones estadísticas
     * Fórmula: √(Σ(x - media)² / n)
     * 
     * @param array $numeros Array de números
     * @return float Desviación estándar
     */
    public static function desviacionEstandar(array $numeros): float {
        if (empty($numeros)) return 0;
        $media = self::media($numeros);
        $sumaCuadrados = 0;
        foreach ($numeros as $n) {
            $sumaCuadrados += pow($n - $media, 2);
        }
        return sqrt($sumaCuadrados / count($numeros));
    }

    /**
     * Suma de números en un rango
     * Fórmula optimizada: suma(1..n) = n(n+1)/2
     * 
     * @param int $inicio Inicio del rango
     * @param int $fin Final del rango
     * @return int Suma del rango
     */
    public static function sumarRango(int $inicio, int $fin): int {
        if ($inicio > $fin) return 0;
        $sumaHastaFin = $fin * ($fin + 1) / 2;
        $sumaAntesInicio = ($inicio - 1) * $inicio / 2;
        return $sumaHastaFin - $sumaAntesInicio;
    }
    
    /**
     * Calcula mínimo y máximo de un array en una sola pasada
     * Optimiza operaciones cuando necesitas ambos valores
     * 
     * @param array $numeros Array de números
     * @return array ['min' => valor_mínimo, 'max' => valor_máximo]
     */
    public static function minimoMaximo(array $numeros): array {
        if (empty($numeros)) return ['min' => 0, 'max' => 0];
        return ['min' => min($numeros), 'max' => max($numeros)];
    }
    
    /**
     * Calcula el cuadrado de un número
     * Encapsula pow() para evitar su uso directo en el código
     * 
     * @param float $numero Número a elevar al cuadrado
     * @return float Número elevado al cuadrado
     */
    public static function cuadrado($numero): float {
        return pow($numero, 2);
    }
    
    /**
     * Calcula la raíz cuadrada de un número
     * Encapsula sqrt() para evitar su uso directo en el código
     * 
     * @param float $numero Número del cual calcular raíz
     * @return float Raíz cuadrada
     */
    public static function raizCuadrada($numero): float {
        if ($numero < 0) return 0;
        return sqrt($numero);
    }

    /**
     * Calcula la potencia de un número
     * Encapsula pow() para evitar su uso directo en el código
     *
     * @param float $base     Número base
     * @param int   $exponente Exponente
     * @return float Resultado de base^exponente
     */
    public static function potencia($base, $exponente): float {
        return pow($base, $exponente);
    }
}
?>