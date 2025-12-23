<?php

class Evento
{
    protected string $nombre;
    protected string $fecha;
    protected string $hora;
    protected string $lugar;
    protected string $descripcion;
    protected Empresa $organizador;
    

    public function __construct(string $nombre, string $fecha, string $hora, string $lugar, string $descripcion, Empresa $organizador)
    {
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->lugar = $lugar;
        $this->descripcion = $descripcion;
        $this->organizador = $organizador;
    }

    public function getNombre(): string{return $this->nombre;}

    public function getFecha(): string{return $this->fecha;}

    public function getHora(): string{return $this->hora;}

    public function getLugar(): string{return $this->lugar;}

    public function getDescripcion(): string{return $this->descripcion;}

    public function getOrganizador(): Empresa{return $this->organizador;}

    public function __toString() {
        return [
             "=== EVENTO ===",
            "Nombre: $this->nombre",
            "Fecha: $this->fecha",
            "Hora: $this->hora",
            "Lugar: $this->lugar",
            "Organizador: " . $this->organizador->getNombre(),
            "---------------"
        ];
    }
}  

?>

