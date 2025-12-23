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
            echo "Nombre: " . $evento->getNombre() . PHP_EOL;
            echo "Fecha: " . $evento->getFecha() . PHP_EOL;
            echo "Hora: " . $evento->getHora() . PHP_EOL;
            echo "Lugar: " . $evento->getLugar() . PHP_EOL;
            echo "Descripcion: " . $evento->getDescripcion() . PHP_EOL;
            echo "Organizador: ". $evento->getOrganizador()->getNombre() . PHP_EOL;
            echo str_repeat("-", 50) . PHP_EOL;
        }
    }
}

?>