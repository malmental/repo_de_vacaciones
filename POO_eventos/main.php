<?php
require_once 'empresa.php';
require_once 'evento.php';
require_once 'sistema_de_eventos_festival.php';

// Creando un sistema o lo que podría ser un festival: eventos y empresas
$festival1 = new SistemaDeEventosFestival();

// Registrar empresas y eventos
$empresa1 = new Empresa("Eventos SorpresasBCN Ltda", "Av. Litoral 84");
$evento1 = new Evento(
    "Cena Navideña",
    "24 de Diciembre",
    "19:00",
    "Sala Principal",
    "Evento familiar",
    $empresa1
);

$festival1->registrarEvento($evento1);
$festival1->mostrarDatosEvento();