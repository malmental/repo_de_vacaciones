<?php
require_once 'Pelicula.php';
require_once 'EnumPelicula.php';

$pelicula1 = new Pelicula('Inception', 148, TipoPelicula::CIENCIA_FICCION, 2010, 'USA');
$pelicula2 = new Pelicula('The Godfather', 175, TipoPelicula::DRAMA, 1972, 'USA');
$pelicula3 = new Pelicula('Parasite', 132, TipoPelicula::DRAMA, 2019, 'South Korea');
$pelicula4 = new Pelicula('The Dark Knight', 152, TipoPelicula::ACCION, 2008, 'USA');
$pelicula5 = new Pelicula('La La Land', 128, TipoPelicula::COMEDIA, 2016, 'USA');
$pelicula6 = new Pelicula('Get Out', 104, TipoPelicula::TERROR, 2017, 'USA');

$catalogo = [$pelicula1, $pelicula2, $pelicula3, $pelicula4, $pelicula5, $pelicula6];

// -------------------
// Busqueda por genero
// -------------------
function busquedaPorGenero(array $catalogo, TipoPelicula $genero): array
{
    $resultado = [];

    foreach ($catalogo as $pelicula) {
        if ($pelicula->getGenero() === $genero) {
            $resultado[] = $pelicula; 
        }
    }
    return $resultado;
}

echo 'Buscamos pelculas de accion: ' . PHP_EOL;
$peliculasAccion = busquedaPorGenero($catalogo, TipoPelicula::ACCION);

if (empty($peliculasAccion)) {
    echo 'No existen peliculas de Accion. ' . PHP_EOL;
} else {
    foreach($peliculasAccion as $pelicula) {
        echo $pelicula->__toString() . PHP_EOL;
    }
}


