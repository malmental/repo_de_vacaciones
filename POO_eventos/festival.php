<?php 

class Festival
{
    protected string $nombre_empresa;
    protected string $direccion_empresa;
    protected array $eventos = [];

    public function __construct(string $nombre_empresa, string $direccion_empresa, array $eventos = [])
    {
        $this->nombre_empresa = $nombre_empresa;
        $this->direccion_empresa = $direccion_empresa;
        $this->eventos = $eventos;
    }

    public function setEventoNuevo()
    {
        $this->eventos = $eventos[];
    }
}