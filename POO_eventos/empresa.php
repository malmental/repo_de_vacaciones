<?php

class Empresa
{
    protected string $nombre;
    protected string $direccion;

    public function __construct(string $nombre, string $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function getNombre(){return $this->nombre;}

    public function getDireccion(){return $this->direccion;}
}

?>