<?php
require_once 'empresa.php';
require_once 'evento.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de eventos</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <div class="container">
        <h1>Gestor de enventos</h1>

        <!--FORMULARIO DE CREACION DE EVENTOS-->
        <form method="post" action="informacion_evento.php">

                <div class="campo">
                    <label for="nombre">Nombre del evento:</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                
                <div class="campo">
                    <label for="fecha">Fecha: </label>
                    <input type="text" name="fecha" id="fecha" required>
                </div>

                <div class="campo">
                    <label for="hora">Hora:</label>
                    <input type="text" name="hora" id="hora" required>
                </div>

                <div class="campo">
                    <label for="lugar">Lugar:</label>
                    <input type="text" name="lugar" id="lugar" required>
                </div>

                <div class="campo">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" rows="3" required></textarea>
                </div>

                <div class="campo">
                    <label for="organizador">Organizador:</label>
                    <input type="text" name="empresa_nombre" required>
                </div>

            <button>Enviar</button>
        </form>
    </div>
</body>
</html>