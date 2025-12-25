<?php

class ValidarDatosEvento
{
    private array $errores = [];
    private array $datos = [];

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    // Retornar true si todos los campos del formulario son válidos
    public function validar(): bool
    {
        $this->validarNombre();
        $this->validarFecha();
        $this->validarHora();
        $this->validarLugar();
        $this->validarDescripcion();
        $this->validarOrganizador();

        return empty($this->errores);
    }

    private function validarNombre(): void
    {
        $nombre = $this->datos['nombre'] ?? '';

        if(empty(trim($nombre))) {
            $this->errores['nombre'] = "el nombre es un campo obligatorio";
            return;
        }

        if(strlen($nombre) < 3) {
            $this->errores['nombre'] = "el nombre debe tener al menos 3 letras";
            return;
        }
    }
    
    private function validarFecha(): void
    {

    }

    private function validarHora(): void
    {
        $hora = $this->datos['hora'] ?? '';

        if(empty($hora)) {
            $this->errores['hora'] = "la hora no puede estar vacia";
            return;
        }

        if(!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $hora)) {
            $this->errores['hora'] = "la hora debe tener el formato especificado";
            return;
        }
    }

    private function validarLugar(): void
    {
        $lugar = $this->datos['lugar'] ?? '';

        if(empty($lugar)) {
            $this->errores['lugar'] = "el lugar es obligatorio";
            return;
        }

        if(strlen($lugar) < 3) {
            $this->errores['lugar'] = "el lugar debe contener minimo 3 caracteres";
            return;
        }
    }

    private function validarDescripcion(): void
    {
        $descripcion = $this->datos['descripcion'] ?? '';

        if(empty($descripcion)) {
            $this->errores['descripcion'] = "la descripcion no puede estar vacia";
            return;
        }

        if(strlen($descripcion) < 3) {
            $this->errores['descripcion'] = "la descripcion debe tener minimo tres caracteres";
            return;
        }
    }

    private function validarOrganizador(): void 
    {
        $organizador = $this->datos['organizador'] ?? '';

        if(empty($organizador)) {
            $this->errores['organizador'] = "el organizador no puede estar vacio";
            return;
        }

        if(strlen($organizador) < 1) {
            $this->errores['organizador'] = "el organizador debe tener al menos UN caracter";
            return;
        }
    }

    public function getErrores(): bool
    {
        return !empty($this->errores);
    }

     // Retorna el error de un campo específico
    public function getError(string $campo): ?string
    {
        return $this->errores[$campo] ?? null;
    }


    // Limpia los datos
    public function getDatosLimpios(): array
    {
        return [
            'nombre' => trim($this->datos['nombre'] ?? ''),
            'fecha' => trim($this->datos['fecha'] ?? ''),
            'hora' => trim($this->datos['hora'] ?? ''),
            'lugar' => trim($this->datos['lugar'] ?? ''),
            'descripcion' => trim($this->datos['descripcion'] ?? ''),
            'empresa_nombre' => trim($this->datos['empresa_nombre'] ?? ''),
            'empresa_direccion' => trim($this->datos['empresa_direccion'] ?? '')
        ];
    }

}  