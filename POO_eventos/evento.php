<?php

class Evento
{
    public string $nombre;
    public string $fecha;
    public string $hora;
    public string $lugar;
    public string $descripcion;
    public Empresa $organizador;
    

    public function __construct(string $nombre, string $fecha, string $hora, string $lugar, string $descripcion, Empresa $organizador)
    {
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->lugar = $lugar;
        $this->descripcion = $descripcion;
        $this->organizador = $organizador;
    }

    public function __toString(): string
    {
        return "Nombre: $this->nombre, Fecha: $this->fecha, Hora: $this->hora, Lugar: $this->lugar, Descripcion: $this->descripcion, Organizador: $this->organizador->nombre";
    }
}  