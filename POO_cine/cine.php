<?php

class cine
{
    protected string $nombre;
    protected string $poblacion;
    protected array $peliculas = [];

    public function __construct(string $nombre, string $poblacion, array $peliculas = [])
    {
        $this->nombre = $nombre;
        $this->poblacion = $poblacion;
        $this->peliculas = $peliculas;
    }

    public function getPeliculas(): array
    {
        return $this->peliculas;
    }

    public function mostrarPelisCine(): void
    {
        echo "Cine: {$this->nombre} _ {$this->poblacion}" . PHP_EOL;
        foreach ($this->peliculas as $pelicula) {
            echo "- " . $pelicula->mostrarDatosPeli();
        }
    }

    public function mostrarPeliMasLarga(): pelicula
    {
        $peliMasLarga = $this->peliculas[0];
        foreach ($this->peliculas as $pelicula) {
            if ($pelicula->getDuracion() > $peliMasLarga->getDuracion()){
                $peliMasLarga = $pelicula;
            }
        }
        return $peliMasLarga;
    }
    /*
    Metodo auxiliar para buscar peliculas por director en ESTE cine
    public function buscarPorDirector (string $directorBuscar): array
    {
        $peliculasEncontradas = [];

        foreach ($this->peliculas as $pelicula) {
            if ($pelicula->getDirector() === $directorBuscar) {
                $peliculasEncontradas[] = $pelicula;
            }
        }
        return $peliculasEncontradas;
    } */
}

?>