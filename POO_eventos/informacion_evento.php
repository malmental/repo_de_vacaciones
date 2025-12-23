<?php
require_once 'empresa.php';
require_once 'evento.php';

// Primero verificamos que los datos fueron recibidos
 if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header ('Location: index.php');
    exit;
}

// Capturamos los datos
$nombre = $_POST['nombre'] ?? '';
$fecha = $_POST['fecha'] ?? '';
$hora = $_POST['hora'] ?? '';
$lugar = $_POST['lugar'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$empresa_nombre = $_POST['empresa_nombre'] ?? '';
$empresa_direccion = $_POST['empresa_direccion'] ?? '';

// Crear los objetos
$empresa = new Empresa($empresa_nombre, $empresa_direccion);
$evento = new Evento($nombre, $fecha, $hora, $lugar, $descripcion, $empresa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info del evento registrada</title>
    <link rel="stylesheet" href="./style.css" class="style">
</head>
<body>
    <div class="container">
        <h1>Informacion del evento registrado</h1>

        <div class="resultado">
            <div class="campo-resultado">
                <strong>Nombre:</strong>
                <p><?= htmlspecialchars($evento->getNombre()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Fecha:</strong>
                <p><?= htmlspecialchars($evento->getFecha()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Hora:</strong>
                <p><?= htmlspecialchars($evento->getHora()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Lugar:</strong>
                <p><?= htmlspecialchars($evento->getLugar()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Descripción:</strong>
                <p><?= htmlspecialchars($evento->getDescripcion()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Organizador:</strong>
                <p><?= htmlspecialchars($evento->getOrganizador()->getNombre()) ?></p>
            </div>

            <div class="campo-resultado">
                <strong>Dirección del organizador:</strong>
                <p><?= htmlspecialchars($evento->getOrganizador()->getDireccion()) ?></p>
            </div>
        </div>
        
        <div class="botones">
            <a href="index.php" class="boton">← Crear otro evento</a>
        </div>
    </div>
</body>
</html>