<?php
require_once 'Cliente.php';
require_once 'Mesa.php';
require_once 'Reserva.php';

echo "SISTEMA DE RESERVA: " . PHP_EOL;

try {
    $cliente1 = new Cliente("Edgar", "666666666", "allan@poe.net");
    echo "Cliente creado!" . PHP_EOL;
    
    $mesa1 = new Mesa(3, 6, "interior");
    echo "Mesa creada" . PHP_EOL;
    
    $reserva1 = new Reserva($cliente1, $mesa1, "2025-12-31", "21:00", 4, "Reserva vegetariana", "Pendiente");
    echo "Reserva registrada!" . PHP_EOL;

    echo "Reserva creada!" . PHP_EOL;
    echo "Datos: ". PHP_EOL ;
    echo $reserva1;
} catch (Exception $e) {
    echo "Algo ha pasado, revise nuevamente sus datos {$e->getMessage()}" . PHP_EOL;
}

