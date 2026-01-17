<?php
require_once 'Personaje.php';
require_once 'EnumHabilidad.php';

$personaje1 = new Personaje('Aragorn', 87, 'Guerrero', TipoHabilidad::FISICA->value);
$personaje2 = new Personaje('Gandalf', 2019, 'Mago', TipoHabilidad::MAGICA->value);
$personaje3 = new Personaje('Legolas', 2931, 'Arquero', TipoHabilidad::FISICA->value);
$personaje4 = new Personaje('Elrond', 6500, 'Sabio', TipoHabilidad::MENTAL->value);

$personajes = [$personaje1, $personaje2, $personaje3, $personaje4];

function elMasJoven(array $personajes): ?Personaje
{
    if(empty($personajes)) {
        return null;
    }

    $masJoven = $personajes[0];
    foreach ($personajes as $personaje) {
        if ($personaje->getEdad() < $masJoven->getEdad()) {
            $masJoven = $personaje;
        }
    }
    return $masJoven;
}

echo 'El personaje mas joven es: ' . PHP_EOL;
$personajeMasJoven = elMasJoven($personajes);
echo $personajeMasJoven->__toString();