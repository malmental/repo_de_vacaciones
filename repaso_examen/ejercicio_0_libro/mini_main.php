<?php
require_once 'libro.php';
require_once 'EnumTipoLibro.php';

$libro1 = new Libro('Novela Policiaca', 471, TipoLibro::FICCION, 'Stan Don', 1967);
$libro2 = new Libro('Reiki Pro', 328, TipoLibro::AUTOAYUDA, 'Master Zen', "1949");
$libro3 = new Libro('Algebra Avanzada', 863, TipoLibro::ACADEMICO, 'Universitaris', 1605);
$libro4 = new Libro('Aventuras Perdidas', 223, TipoLibro::FICCION, 'Raul Rolo', 1997);
$libro5 = new Libro('Meditacion al reves', 223, TipoLibro::AUTOAYUDA, 'Dragon Negro', 1865);
$libro6 = new Libro('Historia Universal', 864, TipoLibro::ACADEMICO, 'Profesor Cerebron', 1877);

echo $libro1 . PHP_EOL;
echo $libro2 . PHP_EOL;
echo $libro3 . PHP_EOL;
echo $libro4 . PHP_EOL;

$libros = [$libro1, $libro2, $libro3, $libro4, $libro5, $libro6];

// Libros que empiezan por 'A'
function librosConLetraA(array $libros): array
{
    $resultado = [];
    foreach ($libros as $libro) {
        if (str_starts_with($libro->getTitulo(), 'A')) {
            $resultado[] = $libro;
        }
    }
    return $resultado;
}

function libroMasAntiguo(array $libros): libro
{
    $masAntiguo = $libros[0];
    foreach ($libros as $libro) {
        if ($libro->getAnoPublicacion() < $masAntiguo->getAnoPublicacion()) {
            $masAntiguo = $libro;
        }
    }
    return $masAntiguo;
}

// Probar las funciones
echo " Libros que empiezan con A: ";
$librosA = librosConLetraA($libros);
foreach ($librosA as $libro) {
    echo $libro . PHP_EOL;
}

echo " Libro más antiguo: ";
echo libroMasAntiguo($libros);

?>