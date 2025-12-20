<?php

class pelicula
{
    protected string $nombre;
    protected int $duracion;
    protected string $director;

    public function __construct(string $nombre, int $duracion, string $director)
    {
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->director = $director;
    }

    public function getDuracion(): int
    {
        return $this->duracion;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function mostrarDatosPeli(): string
    {
        return "Peli: {$this->nombre} por {$this->director} y dura: {$this->duracion} minutos" . PHP_EOL;
    }
}

?>