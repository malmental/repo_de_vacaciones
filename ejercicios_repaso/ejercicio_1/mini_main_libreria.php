<?php
require_once 'libro.php';

$libro1 = new Libro("Cien años de soledad", 471, "Realismo mágico", "Gabriel García Márquez", "1967");
$libro2 = new Libro("1984", 328, "Distopía", "George Orwell", "1949");
$libro3 = new Libro("El Quijote", 863, "Novela", "Miguel de Cervantes", "1605");
$libro4 = new Libro("Harry Potter y la piedra filosofal", 223, "Fantasía", "J.K. Rowling", "1997");
$libro5 = new Libro("Alicia en el país de las maravillas", 223, "Fantasía", "Lewis Carroll", "1865");
$libro6 = new Libro("Anna Karenina", 864, "Novela", "León Tolstói", "1877");

echo $libro1->mostrarDatosLibro() . PHP_EOL;
echo $libro2->mostrarDatosLibro() . PHP_EOL;
echo $libro3->mostrarDatosLibro() . PHP_EOL;
echo $libro4->mostrarDatosLibro() . PHP_EOL;

$libros = [$libro1, $libro2, $libro3, $libro4, $libro5, $libro6];

function librosConLetraA(array $libros): array
{
    $resultado = [];
    foreach ($libros as $libro) {
        if (str_starts_with($libro->getTitulo(), "A")) {
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
    echo $libro->mostrarDatosLibro() . PHP_EOL;
}

echo " Libro más antiguo: ";
echo libroMasAntiguo($libros)->mostrarDatosLibro();

?>
