<?php

class Archivo
{
    private string $nombre;
    private TipoArchivo $tipo;
    private string $fecha; // Formato 'Y-m-d'

    public function __construct(string $nombre, TipoArchivo $tipo, string $fecha)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
    
    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function esDeTipo(TipoArchivo $tipo): bool
    {
        return $this->tipo === $tipo;
    }

    public function archivoMasAntiguo(Archivo $otroArchivo): bool
    {
        return $this->fecha < $otroArchivo->getFecha();
    }

    public function mostrarDatos(): string
    {
        return "Archivo: " . PHP_EOL .
                "Nombre: {$this->nombre}" . PHP_EOL .
                "Tipo: {$this->tipo->value}" . PHP_EOL .
                "Fecha: {$this->fecha}" . PHP_EOL;
    }
}