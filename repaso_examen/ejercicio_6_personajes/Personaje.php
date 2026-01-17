<?php

class Personaje
{
    public function __construct(
        private string $nombre,
        private int $edad,
        private string $profesion,
        private string $habilidad,
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function getHabilidad(): string
    {
        return $this->habilidad;
    }

    public function __toString(): string
    {
        return 'El personaje: ' . $this->getNombre() . PHP_EOL .
                'Edad: ' . $this->getEdad() . PHP_EOL . 
                'Habilidad: ' . $this->getHabilidad() . PHP_EOL;
    }
}