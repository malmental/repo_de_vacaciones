<?php
require_once 'Libro.php';

// ===================
// Agregando 4 libros.
// ===================
$libro1 = new Libro("Antígona", 120, "Tragedia Griega", "Sófocles", -441);
$libro2 = new Libro("Dune", 704, "Ciencia Ficción", "Frank Herbert", 1965);
$libro3 = new Libro("1984", 328, "Distopía", "George Orwell", 1949);
$libro4 = new Libro("El Hobbit", 310, "Fantasía", "J.R.R. Tolkien", 1937);

$libros = [$libro1, $libro2, $libro3, $libro4];

// ==============================================
// Devuelva libros que empiecen por la letra "A".
// ==============================================
function empiezaConLetraA(array $libros): array
{
    $resultado = [];
    foreach($libros as $libro) {
        if (str_starts_with($libro->getTitulo(), "A")) {
            $resultado[] = $libro;
        }
    }
    return $resultado;
}

echo "===============================" . PHP_EOL;
echo "** Libros que empiezan con A**: " . PHP_EOL;

$librosA = empiezaConLetraA($libros);
foreach ($librosA as $libro)
    echo $libro->mostrarDatosLibro();

// =============================================
// Una lógica que devuelva el libro más antiguo.
// =============================================
function masAntiguo(array $libros): Libro
{
    $masAntiguo = $libros[0];
    foreach ($libros as $libro) {
        if ($libro->getAnoPulicacion() < $masAntiguo->getAnoPulicacion()) {
            $masAntiguo = $libro;
        }   
    }
    return $masAntiguo;
}

echo "===============================" . PHP_EOL;
echo "**Libro mas antiguo**: " .PHP_EOL;
echo masAntiguo($libros)->mostrarDatosLibro();

// =========================
// Mostrar todos los libros.
// =========================
echo "===============================" . PHP_EOL;
echo "**Todos los libros**: " .PHP_EOL;
foreach ($libros as $libro) {
    echo $libro->mostrarDatosLibro();
}