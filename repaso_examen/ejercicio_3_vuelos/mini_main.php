<?php
require_once 'Vuelo.php';

$vuelo1 = new Vuelo('Santiago de Chile', 'Barcelona', 899.00, 'Andianca');
$vuelo2 = new Vuelo('Dubai', 'Shanghai', 349.00, 'CieloChina');
$vuelo3 = new Vuelo('Los Angeles', 'Londres', 689.00, 'UkFly');
$vuelo4 = new Vuelo('Islandia', 'Dinamarka', 249.00, 'AeroLinea Hielo');

$vuelos = [$vuelo1, $vuelo2, $vuelo3, $vuelo4];

// Recorrer el Array
foreach ($vuelos as $vuelo) {
    echo $vuelo;
}

// Devolver el vuelo mas barato.
function vueloMasBarato(array $vuelos): ?Vuelo
{
    if(empty($vuelos)) {
        return null;
    }

    $masBarato = $vuelos[0];
    foreach ($vuelos as $vuelo) {
        if ($vuelo->getPrecio() < $masBarato->getPrecio()) {
            $masBarato = $vuelo;
        }
    }
    return $masBarato;
}

$vueloMasBarato = vueloMasBarato($vuelos);
if ($vueloMasBarato !== null) {
    echo 'El vuelo mas barato es: ' . $vueloMasBarato->__toString();
}

// Dado un destino, devolver los vuelos.
function buscadorDestino(array $vuelos, string $destino): array
{
    $resultado = [0];
    foreach ($vuelos as $vuelo) {
        if ($vuelo->getDestino() === $destino) {
            $resultado[] = $vuelo;
        }
    }
    return $resultado;
}

$vueloBarcelona = buscadorDestino($vuelos, 'Barcelona');
if (empty($vueloBarcelona)) {
    echo 'No hay vuelos a Barcelona';
} else {
    echo 'Vuelos a Barcelona: ';
    foreach ($vuelos as $vuelo) {
        echo $vuelo->__toString();
    }
    return $vueloMasBarato;
}