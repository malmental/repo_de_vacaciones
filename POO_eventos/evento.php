<?php

class Evento
{
    public string $nombre;
    public string $fecha;
    public string $hora;
    public string $lugar;
    public string $descripcion;
    public string $organizador;
    

    public function __construct(string $nombre, string $fecha, string $hora, string $lugar, string $descripcion, string $organizador)
    {
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->lugar = $descripcion;
        $this->organizador = $organizador;
    }
}  