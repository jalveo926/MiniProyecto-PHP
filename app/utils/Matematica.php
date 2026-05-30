<?php

namespace App\Utils;

class Matematica {
    public static function media(array $numeros): float {
        if (empty($numeros)) return 0;
        return array_sum($numeros) / count($numeros);
    }

    public static function desviacionEstandar(array $numeros): float {
        $media = self::media($numeros);
        $sumaCuadrados = 0;
        foreach ($numeros as $n) {
            $sumaCuadrados += pow($n - $media, 2);
        }
        return sqrt($sumaCuadrados / count($numeros));
    }

    public static function sumarRango(int $inicio, int $fin): int {
        if ($inicio > $fin) return 0;
        $sumaHastaFin = $fin * ($fin + 1) / 2;
        $sumaAntesInicio = ($inicio - 1) * $inicio / 2;
        return $sumaHastaFin - $sumaAntesInicio;
    }
}
?>