<?php

class reserva
{
    private Cliente $cliente;
    private Mesa $mesa;
    private string $fecha;
    private string $hora;
    private int $numPersonas;
    private string $observaciones;
    private string $estado;

    public function __construct(cliente $cliente, mesa $mesa, string $fecha, string $hora, int $numPersonas, string $observaciones, string $estado)
    {
        throw new \Exception('Not implemented');
    }
}