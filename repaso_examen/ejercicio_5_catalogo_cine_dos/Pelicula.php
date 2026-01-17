<?php

class Pelicula 
{
    public function __construct(
        private string $nombre,
        private int $durcion,
        private TipoPelicula $genero,
        private int $ano_estreno,
        private string $pais
    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getGenero(): TipoPelicula
    {
        return $this->genero;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function __toString(): string
    {
        return 'Pelicula: ' . $this->nombre . PHP_EOL .
                'Genero: ' . $this->genero->value . PHP_EOL .
                'Produccion: ' . $this->pais . PHP_EOL;
    }
}