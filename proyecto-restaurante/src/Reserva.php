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
        // Para poder validar la fecha se deberá crear un fechaObj
        $fechaObj = \DateTime::createFromFormat('Y-m-d', $fecha);
        $hoy = new \DateTime();
        $hoy->setTime(0, 0, 0);

        if (!$fechaObj || $fechaObj->format('Y-m-d') !== $fecha) {
            throw new \InvalidArgumentException("La fecha no tiene un formato válido (Y-m-d)");
        }

        if ($fechaObj < $hoy) {
            throw new \InvalidArgumentException("La fecha no puede ser anterior a hoy");
        }

        if ($numPersonas <= 0) {
            throw new \InvalidArgumentException("El número de personas debe ser mayor que 0");
        }

        if (strlen($observaciones) > 200) {
            throw new \InvalidArgumentException("Las observaciones no pueden ser mas de 200 caracteres");
        }

        // Validamos con el metodo puedeAcomodar
        if (!$mesa->puedeAcomodar($numPersonas)) {
            throw new \InvalidArgumentException("La mesa {$mesa->getNumero()} no puede acomodar {$numPersonas} personas (capacidad: {$mesa->getCapacidad()})");
        }

        // Si pasa todas estas validaciones asignamos los valores a las propiedade de la clase
        $this->cliente = $cliente;
        $this->mesa = $mesa;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->numPersonas = $numPersonas;
        $this->observaciones = $observaciones;
        $this->estado = $estado;
    }

    public function confirmar(): void
    {
        $this->estado = 'Confirmada';
    }

    public function cancelar(): void
    {
        $this->estado = 'Cancelado';
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getMesa(): Mesa
    {
        return $this->mesa;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function getHora(): string
    {
        return $this->hora;
    }

    public function getNumPersonas(): int
    {
        return $this->numPersonas;
    }

    public function getObservacion(): string
    {
        return $this->observaciones;
    }

    public function getEstado(): string 
    {
        return $this->estado;
    }

    public function __toString(): string
    {
        return 
            "Cliente: {$this->cliente->getNombre()}" . PHP_EOL .
            "Mesa: {$this->mesa->getNumero()} ({$this->mesa->getUbicacion()})" . PHP_EOL .
            "Fecha: {$this->fecha} a las {$this->hora}" . PHP_EOL .
            "Personas: {$this->numPersonas}" . PHP_EOL .
            "Estado: {$this->estado}" . PHP_EOL .
            "Observaciones: {$this->observaciones}";
    }
}