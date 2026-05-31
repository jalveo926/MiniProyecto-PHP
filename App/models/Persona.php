<?php

namespace App\models;

class Persona
{
    // Arreglo para almacenar las edades de las personas
    private $personasEdad = [];
    // Arreglo para almacenar personas clasificadas por categoría
    private $personasXCategoria = [
        'Niño' => [],
        'Adolescente' => [],
        'Adulto' => [],
        'Adulto Mayor' => []
    ];

    public function agregarPersona($edad)
    {
        $this->personasEdad[] = $edad;
    }

    public function clasificarPersonas()
    {
    
        if (empty($this->personasEdad) || count($this->personasEdad) < 5) {
            return; // No hay personas para clasificar
        }

        $this->limpiarCategorias(); // Limpiar categorías antes de clasificar
        
        // Clasificar cada persona según su edad
        foreach ($this->personasEdad as $edad) {

            if ($edad < 13) {
                $this->personasXCategoria['Niño'][] = $edad;

            } elseif ($edad < 18) {
                $this->personasXCategoria['Adolescente'][] = $edad;

            } elseif ($edad < 65) {
                $this->personasXCategoria['Adulto'][] = $edad;

            } else {
                $this->personasXCategoria['Adulto Mayor'][] = $edad;
            }
        }
    }

    private function limpiarCategorias()
    {
        $this->personasXCategoria = [
            'Niño' => [],
            'Adolescente' => [],
            'Adulto' => [],
            'Adulto Mayor' => []
        ];
    }

    public function getPersonasXCategoria()
    {
        return $this->personasXCategoria;
    }
    
    public function getCantidadPersonas()
    {
        return count($this->personasEdad);
    }
    
    public function getEdades()
    {
        return $this->personasEdad;
    }

    public function getCantidadPorCategoria()
    {
        $cantidades = [];

        foreach ($this->personasXCategoria as $categoria => $personas) {
            $cantidades[$categoria] = count($personas);
        }

        return $cantidades;
    }


}
?>