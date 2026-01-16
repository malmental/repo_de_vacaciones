<?php
require_once 'Pelicula.php';
require_once 'Cine.php';
require_once 'EnumTipoPelicula.php';

$cine1 = new Cine("Cineplex Badalona", "Badalona");
$cine1->agregarPelicula(new Pelicula("Dos de tres", 180, TipoPelicula::FICCION));
$cine1->agregarPelicula(new Pelicula("Documental World", 114, TipoPelicula::DOCUMENTAL));
$cine1->agregarPelicula(new Pelicula("Cantando Dibujando", 166, TipoPelicula::ANIMACION));

$cine2 = new Cine("Multicines Barcelona", "Barcelona");
$cine2->agregarPelicula(new Pelicula("The Holdovers", 133, TipoPelicula::FICCION));
$cine2->agregarPelicula(new Pelicula("Poor Things", 141, TipoPelicula::DOCUMENTAL));

$cine1->mostrarCatalogo();
$cine2->mostrarCatalogo();

echo "Películas con mayor duración: " . PHP_EOL;
echo "Cine 1: " . $cine1->peliculaMasLarga()->mostrarDatosPelicula() . PHP_EOL;
echo "Cine 2: " . $cine2->peliculaMasLarga()->mostrarDatosPelicula() . PHP_EOL;