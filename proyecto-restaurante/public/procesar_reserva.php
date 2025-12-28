<?php
require_once 'Cliente.php';
require_once 'Mesa.php';
require_once 'Reserva.php';
require_once 'ValidadorReserva.php';

// Verificar que los datos se recibieron
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header ('Location: index.php');
    exit;
}

// Creamos el validador para llamar a la funcioan validar()
$validador = new ValidadorReserva($_POST);

if (!$validador->validar()) {
    session_start();
    $_SESSION['errores'] = $validador->getErrores();
    $_SESSION['procesar_reserva'] = $_POST;
    header('Location: index.php');
    exit;
}

// Obtenemos los datos limpios
$datosLimpios = $validador->getDatosLimpios();

// Aquí deberías crear los objetos
$cliente = new Cliente(
    $datos['nombre'], 
    $datos['telefono'], 
    $datos['email']
);

// Crear mesa: por ahora usamos una capacidad fija de 6 personas
$capacidadMesa = 6;  // Puedes cambiarlo según la mesa
    
$mesa = new Mesa(
    $datos['numero_mesa'],
    $capacidadMesa,
    $datos['ubicacion']
);

// Crear reserva
$reserva = new Reserva(
    $cliente,
    $mesa,
    $datos['fecha'],
    $datos['hora'],
    $datos['num_personas'],
    $datos['observaciones']
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Reverva</title>
    <link rel="stylesheet" href="css/style.css" class="rel">
</head>
<body>
    <div class="container">
        <h1>Los datos ingresados: </h1>
    
            <div class="campo-resultado">Cliente: 
                <p><?= htmlspecialchars($cliente->getNombre()) ?></p>
            </div>

            <div class="campo-resultado">Telefono: 
                <p><?= htmlspecialchars($cliente->getTelefono()) ?></p>
            </div>

            <div class="campo-resultado">Emai:
                <p><?= htmlspecialchars($cliente->getEmail()) ?></p>
            </div>

            <div class="campo-resultado">Fecha para la reserva: 
                <p><?= htmlspecialchars($reserva->getFecha()) ?></p>
            </div>

            <div class="campo-resultado">Hora para la reserva:
                <p><?= htmlspecialchars($reserva->getHora()) ?></p>
            </div>

            <div class="campo-resultado">Numero de personas: 
                <p><?= htmlspecialchars($reserva->getNumPersonas()) ?></p>
            </div>

            <div class="campo-resultado">Numero de mesa:
                <p><?= htmlspecialchars($reserva->getNumeroDeMesa()) ?></p>
            </div>

            <div class="campo-resultado">Ubicacion: 
                <p><?= htmlspecialchars($mesa->getUbicacion()) ?></p>
            </div>

            <div class="campo-resultado">Observaciones
                <p><?= htmlspecialchars($reserva->getObservaciones()) ?></p>
            </div>

        <div class="boton">
            <a href="index.php" class="boton">← Crear otra reserva.</a>
        </div>
    </div>

</body>
</html>