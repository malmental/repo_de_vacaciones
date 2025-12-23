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
        <form method="post" action="">
                <div>
                    <label for="nombre">Nombre del evento:</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>

                <div>
                    <label for="fecha">Fecha: </label>
                    <input type="text" name="fecha" id="fecha">
                </div>

                <div>
                    <label for="hora">Hora:</label>
                    <input type="text" name="hora" id="hora">
                </div>

                <div>
                    <label for="lugar">Lugar:</label>
                    <input type="text" name="lugar" id="lugar">
                </div>

                <div>
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion">
                </div>
                <div>
                    <label for="organizador">Organizador:</label>
                    <input type="text" name="empresa_nombre" value="BCN Eventos">
                </div>
            <button>Enviar</button>
        </form>

        <!--RESULTADOS MOSTRADOS-->
        <?php
        if (isset($_POST['nombre'])): ?>
            <?php
            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $lugar = $_POST['lugar'];
            $descripcion = ['descripcion'];
            $empresa_nombre = ['empresa_nombre'];
        
            // Creamos los objetos
            $empresa1 = new Empresa("Event Land", "Av. Litoral 84");
            $evento = new Evento($nombre, $fecha, $hora, $lugar, $descripcion, $empresa1);
            
            // Mostramos resultado
            ?>
            <div class="resultado">
                <strong>✅ Evento creado correctamente:</strong>
                <p><?= $evento ?></p>
            </div>
        <?php endif; ?>






    </div>
</body>
</html>