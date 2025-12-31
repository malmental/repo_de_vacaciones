<?php
require_once 'Cliente.php';
require_once 'Mesa.php';
require_once 'Reserva.php';

echo "SISTEMA DE RESERVA: " . PHP_EOL;

// ================================
// Sistema 1: Este cliente no falla
// ================================
try {
    $cliente1 = new Cliente("Edgar", "666666666", "allan@poe.net");
    $mesa1 = new Mesa(3, 6, "interior");    
    $reserva1 = new Reserva($cliente1, $mesa1, "2025-12-31", "21:00", 4, "Reserva vegetariana", "Pendiente");
    echo $reserva1 . PHP_EOL;

} catch (Exception $e) {
    echo "Algo ha pasado, revise nuevamente sus datos {$e->getMessage()}" . PHP_EOL;
}

// ======================================================
// Sistema 2: Aqui se intenta ocupar una mesa mas pequeña
// =====================================================
try {
    $cliente2 = new Cliente("María", "612345678", "maria@email.com");
    $mesa2 = new Mesa(5, 4, "terraza");
    $reserva2 = new Reserva($cliente2, $mesa2, "2026-01-15", "20:00", 6, "Cumpleaños",);
    echo $reserva2 . PHP_EOL;

} catch (Exception $e) {
    echo "Se esperaba que fallara: {$e->getMessage()}" . PHP_EOL . PHP_EOL;
}
// ==================================
// Sistema 3: test metodo confirmar()
// ==================================
try {
    $cliente3 = new Cliente("Saga", "648629754", "saga@gmail.com");
    $mesa3 = new Mesa(4, 10, "interior");
    $reserva3 = new reserva($cliente3, $mesa3, "2026-02-14", "19:30", 6, "Tres parejas", "pendiente");
    echo $reserva3 . PHP_EOL;

    echo "Estado inicial: {$reserva3->getEstado()}" . PHP_EOL;
    
    $reserva3->confirmar();
    echo "Después de confirmar: {$reserva3->getEstado()}" . PHP_EOL;
    
    $reserva3->cancelar();
    echo "Después de cancelar: {$reserva3->getEstado()}" . PHP_EOL . PHP_EOL;

} catch (Exception $e) {
    echo "Algo ha pasado, revise nuevamente sus datos {$e->getMessage()}" . PHP_EOL;
}

// ================================
// Sistema 4: puedeAcomodar() mesas
// ================================
$mesa5 = new Mesa(7, 6, "terraza");

echo "Mesa {$mesa5->getNumero()} tiene capacidad para {$mesa5->getCapacidad()} personas" . PHP_EOL;
echo "¿Puede acomodar 5 personas? " . ($mesa5->puedeAcomodar(5) ? "SÍ" : "NO") . PHP_EOL;
echo "¿Puede acomodar 6 personas? " . ($mesa5->puedeAcomodar(6) ? "SÍ" : "NO") . PHP_EOL;
echo "¿Puede acomodar 9 personas? " . ($mesa5->puedeAcomodar(9) ? "SÍ" : "NO") . PHP_EOL . PHP_EOL;