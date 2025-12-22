<?php 

class SistemaDeEventosFestival
{
    public array $eventos = [];

    public function __construct(array $eventos = [])
    {
        $this->eventos = $eventos;
    }

    public function registrarEvento(Evento $evento): void
    {
        $this->eventos[] = $evento;
    }

    public function mostrarDatosEvento()
    {
        foreach($this->eventos as $evento) {
            echo "Nombre: " . $evento->nombre . PHP_EOL;
            echo "Fecha: " . $evento->fecha . PHP_EOL;
            echo "Hora: " . $evento->hora . PHP_EOL;
            echo "Lugar: " . $evento->lugar . PHP_EOL;
            echo "Descripcion: " . $evento->descripcion . PHP_EOL;
            echo "Organizador: ". $evento->organizador->nombre . PHP_EOL;
            echo str_repeat("-", 50) . PHP_EOL;
        }
    }
}