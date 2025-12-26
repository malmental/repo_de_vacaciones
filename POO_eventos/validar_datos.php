<?php

class ValidarDatosEvento
{
    private array $errores = [];
    private array $datos = [];

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    // Retornar true si todos los campos del formulario están bien
    public function validar(): bool
    {
        $this->validarNombre();
        $this->validarFecha();
        $this->validarHora();
        $this->validarLugar();
        $this->validarDescripcion();
        $this->validarEmpresaNombre();
        $this->validarEmpresaDireccion();

        return empty($this->errores);
    }

    private function validarNombre(): void
    {
        $nombre = $this->datos['nombre'] ?? '';

        if(empty(trim($nombre))) {
            $this->errores['nombre'] = "El nombre es un campo obligatorio";
            return;
        }

        if(strlen($nombre) < 3) {
            $this->errores['nombre'] = "El nombre debe tener al menos 3 letras";
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
            $this->errores['hora'] = "La hora no puede estar vacia";
            return;
        }

        if(!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $hora)) {
            $this->errores['hora'] = "La hora debe tener el formato especificado";
            return;
        }
    }

    private function validarLugar(): void
    {
        $lugar = $this->datos['lugar'] ?? '';

        if(empty($lugar)) {
            $this->errores['lugar'] = "El lugar es obligatorio";
            return;
        }

        if(strlen($lugar) < 3) {
            $this->errores['lugar'] = "El lugar debe contener minimo 3 caracteres";
            return;
        }
    }

    private function validarDescripcion(): void
    {
        $descripcion = $this->datos['descripcion'] ?? '';

        if(empty($descripcion)) {
            $this->errores['descripcion'] = "La descripcion no puede estar vacia";
            return;
        }

        if(strlen($descripcion) < 3) {
            $this->errores['descripcion'] = "La descripcion debe tener minimo tres caracteres";
            return;
        }
    }

    private function validarEmpresaNombre(): void 
    {
        $empresaNombre = $this->datos['empresa_nombre'] ?? '';

        if(empty($empresaNombre)) {
            $this->errores['empresa_nombre'] = "El organizador no puede estar vacio";
            return;
        }

        if(strlen($empresaNombre) < 1) {
            $this->errores['empresa_nombre)'] = "El organizador debe tener al menos UN caracter";
            return;
        }
    }

    public function validarEmpresaDireccion(): void
    {
        $empresaDireccion = $this->datos['empresa_direccion'] ?? '';

            if(empty(trim($empresaDireccion))) {
            $this->errores['empresa_direccion'] = "La dirección del organizador no puede estar vacía";
            return;
        }

        if(strlen($empresaDireccion) < 5) {
            $this->errores['empresa_direccion'] = "La dirección debe tener al menos 5 caracteres";
            return;
        }
        
    }
    
    public function getErrores(): array
    {
        return $this->errores;
    }

    public function hayErrores(): bool
    {
        return !empty($this->errores);
    }

    public function getError(string $campo): ?string
    {
        return $this->errores[$campo] ?? null;
    }

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