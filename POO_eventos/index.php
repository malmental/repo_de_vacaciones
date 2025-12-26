<?php
require_once 'empresa.php';
require_once 'evento.php';

session_start();

// Obtiene los errores del formulario si llegarán a existir
$errores = $_SESSION['errores'] ?? [];
$datosFormulario = $_SESSION['datos_formulario'] ?? [];

// LIMPIA LAS VARIABLES DE SESION
unset($_SESSION['errores']);
unset($_SESSION['datos_formulario']);

function mostrar_error($campo, $errores) {
    if (isset($errores[$campo])) {
        echo '<span class="error">' . htmlspecialchars($errores[$campo]) . '</span>';
    }
}

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

        <?php if (!empty($errores)):?>
            <div class="alerta-errores">
                <strong>⚠️ Por favor, corrige los siguientes errores:</strong>
            </div>
        <?php endif; ?>

        <!--FORMULARIO DE CREACION DE EVENTOS-->
        <form method="post" action="informacion_evento.php">

                <div class="campo">
                    <label for="nombre">Nombre del evento:</label>
                    <input type="text" name="nombre" id="nombre"
                        class="<?= isset($errores['nombre']) ? 'input-error' : '' ?>">
                    <?php mostrar_error('nombre', $errores); ?>
                </div>
                
                <div class="campo">
                    <label for="fecha">Fecha: </label>
                    <input type="text" name="fecha" id="fecha" placeholder="Año / Mes / Día"
                        class="<?= isset($errores['fecha']) ? 'input-error' : '' ?>">
                    <?php mostrar_error('fecha', $errores); ?>
                </div>

                <div class="campo">
                    <label for="hora">Hora:</label>
                    <input type="text" name="hora" id="hora" placeholder="hh:mm"
                        class="<?= isset($errores['hora']) ? 'input-error' : '' ?>">
                    <?php mostrar_error('hora', $errores); ?>
                </div>

                <div class="campo">
                    <label for="lugar">Lugar:</label>
                    <input type="text" name="lugar" id="lugar"
                        class="<?= isset($errores['lugar']) ? 'input-error' : '' ?>">
                    <?php mostrar_error('lugar', $errores); ?>
                </div>

                <div class="campo">
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" rows="3" 
                        class="<?= isset($errores['descripcion']) ? 'input-error' : '' ?>"></textarea>
                    <?php mostrar_error('descripcion', $errores); ?></textarea> 
                </div>

                <div class="campo">
                    <label for="organizador">Organizador:</label>
                    <input type="text" name="empresa_nombre"
                        class="<?= isset($errores['empresa_nombre']) ? 'input-error' : '' ?>">
                <?php mostrar_error('empresa_nombre', $errores); ?>
                </div>

                <div class="campo">
                    <label for="empresa_direccion"> Direccion del organizador</label>
                    <input type="text" name="empresa_direccion" id="empresa_direccion"
                        class="<?= isset($errores['empresa_direccion']) ? 'input-error' : '' ?>">
                <?php mostrar_error('empresa_direccion', $errores); ?>
                </div>

            <button>Enviar</button>
        </form>
    </div>
</body>
</html>