<?php

class Usuario
{
    public $nombre = "Salem";
    public $apellido = "del Caldero";

    public function __toString()
    {
        return "Usuario: {$this->nombre} {$this->apellido}";
    }
}

$user = new Usuario();
echo $user;