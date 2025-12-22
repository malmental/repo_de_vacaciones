<?php

class Empresa
{
    public string $nombre;
    public string $direccion;

    public function __construct(string $nombre, string $direccion)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }
}

?>