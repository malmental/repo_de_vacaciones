<?php

class Pelicula
{
    private string $nombre;
    private int $duracion;
    private TipoPelicula $tipo;

    public function __construct(string $nombre, int $duracion, TipoPelicula $tipo)
    {
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->tipo = $tipo;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDuracion(): int
    {
        return $this->duracion;
    }

    public function getTipo(): TipoPelicula
    {
        return $this->tipo;
    }

    public function mostrarDatosPelicula(): string
    {
        return "{$this->nombre} - {$this->duracion} min - {$this->tipo->value}" . PHP_EOL;
    }
}