<?php
require_once 'empresa.php';
require_once 'evento.php';
require_once 'sistema_de_eventos_festival.php';

// Creando un sistema o lo que podría ser un festival: eventos y empresas
$festival1 = new SistemaDeEventosFestival();
$festival2 = new SistemaDeEventosFestival();

// Registrar empresas y eventos
$empresa1 = new Empresa("Eventos SorpresasBCN Ltda", "Av. Litoral 84");
$empresa2 = new Empresa("TerraConcert", "Av. Parallel 8");

$evento1 = new Evento(
    "Cena Navideña",
    "24 de Diciembre",
    "19:00",
    "Sala Principal",                       
    "Evento familiar",
    $empresa1
);

$evento2 = new Evento(
    "Conferencia de Video juegos 2025",
    "1 de Enero",
    "09:00",
    "Centro de Convenciones Barcelona",
    "Conferencia sobre las últimas tendencias en desarrollo web y aplicaciones móviles",
    $empresa2
);

$evento3 = new Evento(
    "Concierto de Jazz",
    "1 de Febrero",
    "21:30",
    "Auditorio Municipal",
    "Noche de jazz en vivo con artistas locales e internacionales",
    $empresa1
);



$festival1->registrarEvento($evento1);
$festival1->mostrarDatosEvento();

$festival2->registrarEvento($evento2);
$festival2->registrarEvento($evento3);
$festival2->mostrarDatosEvento();