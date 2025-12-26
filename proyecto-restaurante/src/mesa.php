<?php

class Mesa
{
    private int $numero;
    private int $capacidad;
    private string $ubicacion;

    public function __construct(int $numero, int $capacidad, string $ubicacion)
    {
        if(!is_numeric($numero)) {
            throw new Exception("El numero de la mesa debe ser un valor numerico");
        }

        if(!is_numeric($capacidad)) {
            throw new Exception("La capacidad de la mesa debe ser un valor numerico");
        }

        if(!strlen($ubicacion) == 3) {
            throw new Exception("Escoja la ubicacion indicada: 'int / ext'");
        }

        $this->numero = $numero;
        $this->capacidad = $capacidad;
        $this->ubicacion = $ubicacion;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getCapacidad(): int
    {
        return $this->capacidad;
    }

    public function getUbicacion(): string
    {
        return $this->ubicacion;
    }
}