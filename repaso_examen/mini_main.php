<?php

require_once 'Archivo.php';

function filtrarPorTipo($archivos, $tipo) {
    $resultado = [];
    foreach ($archivos as $archivo) {
        if ($archivo->getTipoSoporte() === $tipo) {
            $resultado[] = $archivo;
        }
    }
    return $resultado;
}

function existeArchivo($archivos, $archivoBuscado) {
    foreach ($archivos as $archivo) {
        if ($archivo->getNombre() === $archivoBuscado->getNombre()) {
            return true;
        }
    }
    return false;
}

function obtenerMasAntiguo($archivos) {
    if (empty($archivos)) {
        return null;
    }
    
    $masAntiguo = $archivos[0];
    foreach ($archivos as $archivo) {
        if ($archivo->getFechaCreacion() < $masAntiguo->getFechaCreacion()) {
            $masAntiguo = $archivo;
        }
    }
    return $masAntiguo;
}

$archivos = [];

$archivo1 = new Archivo("video.mp4", "contenido video", "DVD", TipoSoporte::AUDIOVISUAL);
sleep(1);
$archivo2 = new Archivo("documento.pdf", "contenido documento", "PDF", TipoSoporte::DOCUMENTO);
sleep(1);
$archivo3 = new Archivo("foto.jpg", "contenido foto", "JPEG", TipoSoporte::FOTOGRAFICO);
sleep(1);
$archivo4 = new Archivo("presentacion.ppt", "contenido presentacion", "PPT", TipoSoporte::DOCUMENTO);

$archivos[] = $archivo1;
$archivos[] = $archivo2;
$archivos[] = $archivo3;
$archivos[] = $archivo4;

echo "=== TODOS LOS ARCHIVOS ===\n";
foreach ($archivos as $archivo) {
    echo $archivo->getInformacion() . "\n";
}

echo "\n=== ARCHIVOS DE TIPO DOCUMENTO ===\n";
$documentos = filtrarPorTipo($archivos, TipoSoporte::DOCUMENTO);
foreach ($documentos as $doc) {
    echo "- " . $doc->getNombre() . "\n";
}

echo "\n=== ¿EXISTE video.mp4? ===\n";
$existe = existeArchivo($archivos, $archivo1);
echo $existe ? "Sí existe\n" : "No existe\n";

echo "\n=== ¿EXISTE archivo_inexistente.txt? ===\n";
$archivoInexistente = new Archivo("archivo_inexistente.txt", "contenido", "TXT", TipoSoporte::DOCUMENTO);
$existe2 = existeArchivo($archivos, $archivoInexistente);
echo $existe2 ? "Sí existe\n" : "No existe\n";

echo "\n=== ARCHIVO MÁS ANTIGUO ===\n";
$masAntiguo = obtenerMasAntiguo($archivos);
if ($masAntiguo) {
    echo $masAntiguo->getInformacion() . "\n";
}

?>