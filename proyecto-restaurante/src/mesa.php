<?php

class Mesa
{
    private int $numero;
    private int $capacidad;
    private string $ubicacion;

    public function __construct(int $numero, int $capacidad, string $ubicacion)
    {
        if($numero <= 0) {
            throw new \InvalidArgumentException("El numero de la mesa debe ser un valor numerico positivo");
        }

        if($capacidad < 2 || $capacidad > 10) {
            throw new \InvalidArgumentException("La capacidad de la mesa debe entre 2 y 10");
        }

        $ubicacionesValidas = ['terraza', 'interior', 'ventana'];
        if (!in_array($ubicacion, $ubicacionesValidas)) {
            throw new \InvalidArgumentException("La ubicación debe ser 'terraza', 'interior' o 'ventana'");
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

    public function puedeAcomodar(int $personas): bool
    {
        // Simple: ¿Las personas que vienen son menos o igual a la capacidad?
        return $personas <= $this->capacidad;
    }

    public function __toString()
    {
        return [
            "MESA" . PHP_EOL .
            "Numero: $this->numero" . PHP_EOL .
            "Capacidad: $this->capacidad" . PHP_EOL .
            "Ubicacion: $this->ubicacion" . PHP_EOL .
            "--------------------------" . PHP_EOL
        ];
    }
}