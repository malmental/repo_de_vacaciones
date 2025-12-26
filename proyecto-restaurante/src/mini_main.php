<?php
require_once 'cliente.php';
require_once 'mesa.php';

$cliente1 = new cliente("Edgar", "666 666 666", "allan@poe.net");
$mesa1 = new Mesa(3, 6, "int");

echo "El cliente 1 es: ". PHP_EOL ;
echo $cliente1;