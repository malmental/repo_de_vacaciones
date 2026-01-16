<?php
require_once 'Archivo.php';
require_once 'TipoArchivo.php';

// Aregando algunos archivos
$archivo1 = new Archivo("nueva_foto.jpg", TipoArchivo::FOTOGRAFIA, "2024-05-10");
$archivo2 = new Archivo("video_vacaciones_1999.mov", TipoArchivo::AUDIOVISUAL, "1999-12-01");
$archivo3 = new Archivo("foto_navidad_2001.jpg", TipoArchivo::FOTOGRAFIA, "2001-12-24");
$archivo4 = new Archivo("apuntes de catalan", TipoArchivo::DOCUMENTO, "2005-31-02");
$archivo5 = new Archivo("viejo_log.txt", TipoArchivo::DOCUMENTO, "2020-01-01");

$archivos = [$archivo1, $archivo2, $archivo3, $archivo4, $archivo5];

// Mostrar todos los archivos
foreach ($archivos as $archivo) {
    echo $archivo->mostrarDatos() . PHP_EOL;
}

// Mostrar el archivo mas antiguo recorriendo el Array
$masAntiguo = $archivos[0];
foreach ($archivos as $archivo) {
    if ($archivo->archivoMasAntiguo($masAntiguo)) {
        $masAntiguo = $archivo;
    }
}
echo "Archivo más antiguo: {$masAntiguo->getNombre()} ({$masAntiguo->getFecha()})" . PHP_EOL . PHP_EOL;

// Verificar tipos
if ($archivo1->esDeTipo(TipoArchivo::FOTOGRAFIA)) {
    echo "{$archivo1->getNombre()} es una fotografía" . PHP_EOL;
}

if ($archivo2->esDeTipo(TipoArchivo::DOCUMENTO)) {
    echo "{$archivo2->getNombre()} es un documento". PHP_EOL;
} else {
    echo "{$archivo2->getNombre()} NO es un documento". PHP_EOL;
}