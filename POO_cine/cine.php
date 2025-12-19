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

    public function mostrarPelisCine(): void
    {
        echo "Cine: {$this->nombre} _ {$this->poblacion}";
        foreach ($this->peliculas as $pelicula) {
            echo "- " . $pelicula->mostrarDatosPeli;
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
}

?>