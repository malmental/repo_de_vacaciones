<?php

class Evento
{
    protected string $nombre;
    protected string $fecha;
    protected string $hora;
    protected string $lugar;
    protected string $descripcion;

    public function __construct(string $nombre, string $fecha, string $hora, string $lugar, string $descripcion)
    {
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->lugar = $descripcion;
    }

    public function mostrarDatosEvento(): string
    {
        return "EVENTO: {$this->nombre} - 
        FECHA: {$this->fecha} - 
        HORA: {$this->hora} - 
        LUGAR: {$this->lugar} - 
        DESCRIPCION: {$this->descripcion}";
    }
}