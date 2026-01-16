<?php

class Vuelo
{
    private string $origen;
    private string $destino;
    private float $precio;
    private string $compania;

    public function __construct(string $origen, string $destino, float $precio, string $compania)
    {
        $this->origen = $origen;
        $this->destino = $destino;
        $this->precio = $precio;
        $this->compania = $compania;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getDestino(): string
    {
        return $this->destino;
    }

    public function __toString(): string
    {
        return 'Origen: ' . $this->origen . PHP_EOL .
                'Destino: ' . $this->destino .  PHP_EOL .
                'Compañia: ' . $this->compania . PHP_EOL .
                '___________________' . PHP_EOL;
    }



}