<?php

require_once 'pelicula.php';
require_once 'cine.php';

$peliculas1 = [
    new Pelicula("El Padrino", 175, "Francis Ford Coppola"),
    new Pelicula("Pulp Fiction", 154, "Quentin Tarantino"),
    new Pelicula("El Señor de los Anillos: La Comunidad del Anillo", 178, "Peter Jackson"),
    new Pelicula("Origen", 148, "Christopher Nolan"),
    new Pelicula("Forrest Gump", 142, "Robert Zemeckis"),
];

$peliculas2 = [
    new Pelicula("La lista de Schindler", 195, "Steven Spielberg"),
    new Pelicula("Matrix", 136, "Lana y Lilly Wachowski"),
    new Pelicula("Interstellar", 169, "Christopher Nolan"),
    new Pelicula("Gladiator", 155, "Ridley Scott"),
    new Pelicula("Parásitos", 132, "Bong Joon-ho")
];

$cine1 = new Cine ("Cinesa", "Barcelona", $peliculas1);
$cine2 = new Cine ("Multiplex", "Valencia", $peliculas2);

$cines = [$cine1, $cine2];

// Programa:
echo ".- CATALOGO DE CINES: " . PHP_EOL;
foreach ($cines as $cine) {
    $cine->mostrarPelisCine();
}

echo ".- Peliculas mas largas por cine: " . PHP_EOL;
foreach ($cines as $cine) {
    $peliMasLarga = $cine->mostrarPeliMasLarga();
    echo $peliMasLarga->mostrarDatosPeli();
}

function buscarDirectorEnCines(array $cines, string $directorBuscar): array 
{
    $peliculasEncontradas = [];
    $nombresPelicula = []; // Evita duplicados

    foreach ($cines as $cine) {
        foreach ($cine->getPeliculas() as $pelicula) {
            if ($pelicula->getDirector() === $directorBuscar && !in_array($pelicula->mostrarDatosPeli(), $nombresPelicula)) {

                $peliculasEncontradas[] = $pelicula;
                $nombresPelicula[] = $pelicula->mostrarDatosPeli();
            }
        }
    }
    return $peliculasEncontradas;
}

// Busqueda
echo ".- Busqueda: Christopher Nolan" . PHP_EOL;
$pelisNolan = buscarDirectorEnCines($cines, "Christopher Nolan");
foreach ($pelisNolan as $peliculas) {
    echo $peliculas->mostrarDatosPeli();
}

?>
