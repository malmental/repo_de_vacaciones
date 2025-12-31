<?php

class cliente
{
    private string $nombre;
    private string $telefono;
    private string $email;

    public function __construct(string $nombre, string $telefono, string $email)
    {
        if (strlen(trim($nombre)) < 3) {
            throw new \InvalidArgumentException("El nombre debe tener al menos 3 caracteres");
        }

        if (!preg_match('/^[0-9]{9}$/', $telefono)) {
            throw new \InvalidArgumentException("El telfono debe tener un valor de 9 digitos '123 456 789'");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("El email debe tener un formato valido 'hola@contacto.net'");
        }
        
        $this->nombre = trim($nombre);
        $this->telefono = trim($telefono);
        $this->email = trim($email);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function __toString()
    {
        return 
            "CLIENTE: " . PHP_EOL .
            "Nombre: {$this->nombre}" . PHP_EOL .
            "Telefono: {$this->telefono}" . PHP_EOL .
            "Email: {$this->email}" . PHP_EOL .
            "--------------------------" . PHP_EOL;
    }
}