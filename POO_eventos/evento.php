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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function getLugar()
    {
        return $this->lugar;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getOrganizador()
    {
        return $this->organizador;
    }

    public function __toString(): string
    {
        return "Nombre: $this->nombre, Fecha: $this->fecha, Hora: $this->hora, Lugar: $this->lugar, Descripcion: $this->descripcion, Organizador: $this->organizador->nombre";
    }
}  