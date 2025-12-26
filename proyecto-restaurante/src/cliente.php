<?php

class cliente
{
    // Propiedades:
    private string $nombre;
    private string $telefono;
    private string $email;

    public function __construct(string $nombre, string $telefono, string $email)
    {
        if(strlen(trim($nombre)) < 3) {
            throw new Exception("El nombre debe tener al menos 3 caracteres");
        }

        if(!is_numeric($telefono)|| (strlen($telefono)) == 9) {
            throw new Exception("El telfono debe tener un valor valido '123 456 789'");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El email debe tener un formato valido 'hola@contacto.net'");
        }
        
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getTelefono(): int
    {
        return $this->telefono;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function __toString()
    {
        return [
            "CLIENTE" . PHP_EOL .
            "Nombre: $this->nombre" . PHP_EOL .
            "Telefono: $this->telefono" . PHP_EOL .
            "Email: $this->email" . PHP_EOL .
            "--------------------------" . PHP_EOL
        ];
    }
}