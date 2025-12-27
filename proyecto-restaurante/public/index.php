<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVA DE MESAS</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <h1>RESERVA DE MESAS</h1>

    <?php if (!empty($errores)): ?>
            <div class="alerta-errores">
                <strong>Corrige los siguientes errores: </strong>
            </div>
        <?php endif; ?>

    <form method="post" action="informacion_reserva.php">


        
        <div class="campo">
            <label for="cliente">Nombre de cliente:</label>
            <input type="text" name="cliente" id="cliente">
        </div>

        <div class="campo">
            <label for="telefono">Numero de teléfono: </label>
            <input type="text" name="telefono" id="numero_de_telefono" placeholder="YYYY/MM/DD">
        </div>

        <div class="campo">
            <label for="email">Corrreo electrónico: </label>
            <input type="text" name="email" id="email" placeholder="hola@email.net">
        </div>

        <div class="campo">
            <label for="fecha_de_reserva">Fecha para su reserva: </label>
            <input type="text" name="fecha_reserva" id="fecha_reserva">
        </div>

        <div class="campo">
            <label for="hora">Hora de reserva: </label>
            <input type="text" name="hora_reserva" id="hora" placeholder="HH:MM">
        </div>

        <div class="campo">
            <label for="numero_de_personas">Numero de personas: </label>
            <input type="text" name="numero_de_personas" id="num_personas">
        </div>

        <div class="campo">
            <label for="numero_de_mesa">Numero de mesa 1-9: </label>
            <input type="text" name="numero_de_mesa" id="numero_mesa">
        </div>

        <div class="campo">
            <label for="ubicacion">'Terraza', 'Interior', 'Ventana': </label>
            <input type="text" name="ubicacion" id="ubicacion">
        </div>

        <div class="campo">
            <label for="observaciones">Observaciones: </label>
            <textarea name="descripcion" id="descripcion" rows="3"></textarea>
        </div>

        <button>Enviar</button>
     </form>
     </div>
</body>
</html>