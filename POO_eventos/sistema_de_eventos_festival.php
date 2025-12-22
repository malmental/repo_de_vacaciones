<?php 

class SistemaDeEventosFestival
{
    public array $eventos = [];

    public function __construct(array $eventos = []) // Es realmente necesario que este constructor reciba como argumento un array vacio?
    {
        $this->eventos = $eventos;
    }

    public function registrarEvento()
    {
        array_push($this->eventos, $evento); // Que pasa con esta variable 4evento, donde la inicializo?
    }

    public function mostrarDatosEvento()
    {
        foreach($this->eventos as $evento) {
            echo "Nombre: " . $evento->nombre . PHP_EOL;
            echo "Fecha: " . $evento->fecha . PHP_EOL;
            echo "Hora: " . $evento->hora . PHP_EOL;
            echo "Lugar: " . $evento->lugar . PHP_EOL;
            echo "Descripcion: ". $evento->descripcion . PHP_EOL;
            
        }
    }

}