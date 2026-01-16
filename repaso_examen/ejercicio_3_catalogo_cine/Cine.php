<?php

class Cine
{
    private string $nombre;
    private string $poblacion;
    private array $peliculas = [];

    public function __construct(string $nombre, string $poblacion, array $peliculas = [])
    {
        $this->nombre = $nombre;
        $this->poblacion = $poblacion;
        $this->peliculas = $peliculas;
    }

    public function agregarPelicula(Pelicula $pelicula): void
    {
        $this->peliculas[] = $pelicula;
    }

    public function mostrarCatalogo(): void
    {
        echo "Cine: {$this->nombre} en {$this->poblacion}" . PHP_EOL;
        echo "Peliculas: ". PHP_EOL;

        foreach ($this->peliculas as $pelicula) {
            echo $pelicula->mostrarDatosPelicula();
        }
    }

    public function peliculaMasLarga(): Pelicula
    {
        $peliMasLarga = $this->peliculas[0];
        foreach ($this->peliculas as $pelicula) {
            if ($pelicula->getDuracion() > $peliMasLarga->getDuracion()) {
                $peliMasLarga = $pelicula;
            }
        }
        return $peliMasLarga;
    }

    public function mostrarDatosCine(): string
    {
        return "{$this->nombre} - {$this->poblacion}" . PHP_EOL;
    }
}