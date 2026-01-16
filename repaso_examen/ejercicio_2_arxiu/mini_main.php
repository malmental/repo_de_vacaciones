<?php
require_once 'Archivo.php';
require_once 'EnumTipoArchivo.php';

// Aregando algunos archivos
$archivo1 = new Archivo("nueva_foto.jpg", TipoArchivo::FOTOGRAFIA, "2024-05-10");
$archivo2 = new Archivo("video_vacaciones_1999.mov", TipoArchivo::AUDIOVISUAL, "1999-12-01");
$archivo3 = new Archivo("foto_navidad_2001.jpg", TipoArchivo::FOTOGRAFIA, "2001-12-24");
$archivo4 = new Archivo("apuntes de catalan", TipoArchivo::DOCUMENTO, "2005-31-02");
$archivo5 = new Archivo("viejo_log.txt", TipoArchivo::DOCUMENTO, "2020-01-01");

$archivos = [$archivo1, $archivo2, $archivo3, $archivo4, $archivo5];

foreach ($archivos as $archivo) {
    echo $archivo->mostrarDatos() . PHP_EOL;
}




