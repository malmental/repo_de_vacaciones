<?php

class ValidadorReserva
{
    private array $errores = [];
    private array $datos = [];

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    public function validar(): bool // Hay que validar TODOS los datos
    {
        // VALIDAR DATOS CLIENTE
        $this->validarNombre();
        $this->validarTelefono();
        $this->validarEmail();

        // VALIDAR DATOS RESERVA
        $this->validarFecha();
        $this->validarHora();
        $this->validarNumPersonas();

        // VALIDAR DATOS MESA
        $this->validarNumeroMesa();
        $this->validarUbicacion();

        // VALIDAR OBSERVACIONES
        $this->validarObservaciones();

        return empty($this->errores);
    }

    // ====================
    // VALIDACIONES CLIENTE
    // ====================
    private function validarNombre()
    {
        $nombre = $this->datos['nombre'] ?? '';

        if (empty(trim($nombre))) {
            $this->errores['nombre'] = "El nombre no puede estar vacio";
            return;
        }

        if (strlen($nombre) < 3) {
            $this->errores['nombre'] = "El nombre no puede contener menos de 3 caracteres";
            return;
        }

        if (strlen($nombre) > 12) {
            $this->errores['nombre'] = "El nombre no puede contener mas de 12 caracteres";
            return;
        }
    }

    private function validarTelefono()
    {
        $telefono = $this->datos['telefono'] ?? '';

        if (empty($telefono)) {
            $this->errores['telefono'] = "Debe proporcionar un telefono de contacto";
        }

        if (!preg_match('/^[0-9]{9}$/', $telefono))
            $this->errores['telefono'] = "El telefono debe tener un formato valido";
    }

    private function validarEmail()
    {
        $email = $this->datos['email'] ?? '';

        if (empty($email)) {
            $this->errores['email'] = "El email es obligatorio";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errores['email'] = "El email debe tener un formato valido hola@email.net";
            return;
        }
    }

    // ===============
    // VALIDAR RESEVRA
    // ===============
    private function validarFecha()
    {
        $fecha = $this->datos['fecha'] ?? '';

        if (empty($fecha)) {
            $this->errores['fecha'] = "La fecha es obligatoria";
            return;
        }

        // Verificar formato YYYY-MM-DD
        $fechaObj = \DateTime::createFromFormat('Y-m-d', $fecha);
        if (!$fechaObj || $fechaObj->format('Y-m-d') !== $fecha) {
            $this->errores['fecha'] = "La fecha no tiene un formato válido";
            return;
        }

        // Verificar que la fecha no sea anterior a hoy
        $hoy = new \DateTime();
        $hoy->setTime(0, 0, 0);
        
        if ($fechaObj < $hoy) {
            $this->errores['fecha'] = "La fecha no puede ser anterior a hoy";
            return;
        }
    }

    private function validarHora(): void
    {
        $hora = $this->datos['hora'] ?? '';

        if (empty($hora)) {
            $this->errores['hora'] = "La hora no puede estar vacia";
            return;
        }

        if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $hora)) {
            $this->errores['hora'] = "La hora debe tener el formato especificado";
            return;
        }
    }

    private function validarNumPersonas()
    {
        $numPersonas = $this->datos['numero_personas'] ?? '';

        if (empty($numPersonas) ||$numPersonas !== '0') {
            $this->errores['numero_personas'] = "Debe ingresar un valor valido";
            return;
        }

        // Convertir entero positivo y maximo 10 personas
        $numPersonas = (int)$numPersonas;

        if ($numPersonas <= 0) {
            $this->errores['num_personas'] = "Debe haber al menos 1 persona";
            return;
        }

        if ($numPersonas > 10) {
            $this->errores['num_personas'] = "El número máximo de personas es 10";
            return;
        }
    }

    // ============ 
    // VALIDAR MESA
    // ============
    private function validarNumeroMesa(): void
    {
        $numMesa = $this->datos['numero_mesa'] ?? '';

        if (empty($numMesa) && $numMesa !== 0) {
            $this->errores['numero_mesa'] = "Debe seleccionar una mesa";
            return;
        }

        if ($numMesa < 1 || $numMesa > 10) {
            $this->errores['numero_mesa'] = "Las mesas pueden ser entre la 1 y las 9";
            return;
        }
    }

    private function validarUbicacion()
    {
        $ubicacion = $this->datos['ubicacion'] ?? '';

        if (empty($ubicacion)) {
            $this->errores['ubicacion'] = "La ubicacion no puede estar vacia";
            return;
        }

         $ubicacionesValidas = ['terraza', 'interior', 'ventana'];
         if (!in_array($ubicacion, $ubicacionesValidas)) {
            $this->errores['ubicacion'] = "La ubicación seleccionada no es válida";
            return;
        }
    }
    
    // =====================
    // VALIDAR OBSERVACIONES
    // =====================
    private function validarObservaciones()
    {
        $observaciones = $this->datos['observaciones'];

        // Las observaciones son opcionales, solo validar si hay algo escrito
        if (!empty($observaciones)) {
            if (strlen($observaciones) > 200) {
                $this->errores['observaciones'] = "Las observaciones no pueden tener ser de 200 caracteres";
                return;
            }
        }
    }

    // =====================================================
    // METODOS PUBLICOS PARA ACCEDER A LOS MENSAJES DE ERROR
    // =====================================================
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

    // =============================
    // LIMPIAR Y SANITIZAR LOS DATOS
    // =============================
    public function getDatosLimpios(): array
    {
        return [
            'nombre' => trim($this->datos['nombre'] ?? ''),
            'telefono' => trim($this->datos['telefono'] ?? ''),
            'email' => trim($this->datos['email'] ?? ''),
            'fecha' => trim($this->datos['fecha'] ?? ''),
            'hora' => trim($this->datos['hora'] ?? ''),
            'num_personas' => (int)($this->datos['num_personas'] ?? 0),
            'numero_mesa' => (int)($this->datos['numero_mesa'] ?? 0),
            'ubicacion' => trim($this->datos['ubicacion'] ?? ''),
            'observaciones' => trim($this->datos['observaciones'] ?? '')
        ];
    }
}