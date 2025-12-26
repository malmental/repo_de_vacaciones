# 💡 PISTAS Y ESTRUCTURA BASE - Proyecto Restaurante

Este documento contiene **pistas** y una **estructura inicial** para ayudarte a empezar. ¡No es hacer trampa, es tener un buen punto de partida!

---

## 🗂️ Estructura de Directorios Inicial

Crea esta estructura antes de empezar a programar:

```bash
mkdir proyecto-restaurante
cd proyecto-restaurante
mkdir src public public/css
touch src/Cliente.php
touch src/Mesa.php
touch src/Reserva.php
touch src/ValidadorReserva.php
touch public/index.php
touch public/procesar_reserva.php
touch public/css/style.css
touch README.md
```

---

## 📝 Plantilla Base para Cliente.php

```php
<?php

class Cliente
{
    private string $nombre;
    private string $telefono;
    private string $email;

    public function __construct(string $nombre, string $telefono, string $email)
    {
        // TODO: Validar nombre (mínimo 3, máximo 50)
        // TODO: Validar teléfono (exactamente 9 dígitos)
        // TODO: Validar email (formato válido)
        
        $this->nombre = trim($nombre);
        $this->telefono = trim($telefono);
        $this->email = trim($email);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    // TODO: Agregar otros getters

    public function __toString(): string
    {
        // TODO: Retornar string con información del cliente
        return "";
    }
}
```

---

## 🔍 Pistas para las Validaciones

### Validar Teléfono (9 dígitos)
```php
// Pista: Usa preg_match con esta expresión regular
if (!preg_match('/^[0-9]{9}$/', $telefono)) {
    throw new \InvalidArgumentException("El teléfono debe tener 9 dígitos");
}
```

### Validar Email
```php
// Pista: PHP tiene una función nativa para esto
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    throw new \InvalidArgumentException("Email inválido");
}
```

### Validar Fecha Futura
```php
// Pista: Convierte la fecha a DateTime y compárala con hoy
$fechaObj = \DateTime::createFromFormat('Y-m-d', $fecha);
$hoy = new \DateTime();
$hoy->setTime(0, 0, 0);

if ($fechaObj < $hoy) {
    // Error: fecha en el pasado
}
```

### Validar Rango de Hora (12:00 - 23:00)
```php
// Pista: Convierte la hora a minutos desde medianoche
list($horas, $minutos) = explode(':', $hora);
$minutosDesdeMedianoche = ($horas * 60) + $minutos;

$medioDia = 12 * 60;  // 720 minutos
$once = 23 * 60;       // 1380 minutos

if ($minutosDesdeMedianoche < $medioDia || $minutosDesdeMedianoche > $once) {
    // Error: fuera del horario permitido
}
```

---

## 🎨 Paleta de Colores Sugerida

```css
/* Colores de restaurante elegante */
:root {
    --color-primario: #C41E3A;      /* Rojo vino */
    --color-secundario: #FFD700;     /* Dorado */
    --color-fondo: #FFF8F0;          /* Crema */
    --color-texto: #2C2C2C;          /* Gris oscuro */
    --color-error: #DC3545;          /* Rojo error */
    --color-exito: #28A745;          /* Verde éxito */
}

body {
    background-color: var(--color-fondo);
    color: var(--color-texto);
    font-family: 'Georgia', serif;
}

.boton-principal {
    background-color: var(--color-primario);
    color: white;
    border: 2px solid var(--color-secundario);
}

.boton-principal:hover {
    background-color: #A01829;
    transform: scale(1.05);
}
```

---

## 📋 Plantilla HTML del Formulario

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva tu Mesa - Restaurante Gourmet</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>🍽️ Reserva tu Mesa</h1>
        
        <form method="post" action="procesar_reserva.php">
            
            <!-- Sección: Datos del Cliente -->
            <fieldset>
                <legend>👤 Datos del Cliente</legend>
                
                <div class="campo">
                    <label for="nombre">Nombre completo:</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                
                <!-- TODO: Agregar campo teléfono -->
                <!-- TODO: Agregar campo email -->
            </fieldset>
            
            <!-- Sección: Detalles de la Reserva -->
            <fieldset>
                <legend>📅 Detalles de la Reserva</legend>
                
                <!-- TODO: Agregar campos de fecha, hora, personas, etc. -->
            </fieldset>
            
            <button type="submit">Hacer Reserva</button>
        </form>
    </div>
</body>
</html>
```

---

## 🔄 Flujo de Procesamiento

```
┌─────────────────┐
│   index.php     │  ← Usuario llena formulario
│   (Formulario)  │
└────────┬────────┘
         │
         │ POST
         ↓
┌──────────────────────┐
│ procesar_reserva.php │
└──────────┬───────────┘
           │
           ├─→ Validar con ValidadorReserva
           │
           ├─→ ¿Hay errores?
           │       │
           │       ├─ SÍ → Guardar en sesión, redirigir a index.php
           │       │
           │       └─ NO → Crear objetos Cliente, Mesa, Reserva
           │                    ↓
           │              Mostrar confirmación
           │
           └─────────────────────────────────────────
```

---

## 🧪 Archivo de Pruebas

Crea `test.php` para probar tus clases sin el formulario:

```php
<?php
require_once 'src/Cliente.php';
require_once 'src/Mesa.php';
require_once 'src/Reserva.php';

echo "=== PRUEBA 1: Crear Cliente ===\n";
try {
    $cliente = new Cliente("Juan Pérez", "612345678", "juan@email.com");
    echo "✅ Cliente creado: " . $cliente . "\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== PRUEBA 2: Cliente con teléfono inválido ===\n";
try {
    $cliente = new Cliente("Ana García", "12345", "ana@email.com");
    echo "✅ Cliente creado: " . $cliente . "\n";
} catch (Exception $e) {
    echo "❌ Error esperado: " . $e->getMessage() . "\n";
}

// TODO: Agregar más pruebas
```

**Ejecuta:** `php test.php`

---

## 🎯 Orden Recomendado de Desarrollo

### Día 1 (2-3 horas)
1. ✅ Crear estructura de carpetas
2. ✅ Implementar clase `Cliente` con validaciones
3. ✅ Implementar clase `Mesa` con validaciones
4. ✅ Probar ambas clases con `test.php`

### Día 2 (2-3 horas)
5. ✅ Implementar clase `Reserva`
6. ✅ Crear clase `ValidadorReserva`
7. ✅ Probar validador con datos de prueba

### Día 3 (2 horas)
8. ✅ Crear formulario HTML (`index.php`)
9. ✅ Crear archivo de procesamiento (`procesar_reserva.php`)
10. ✅ Conectar todo y hacer pruebas

### Día 4 (1-2 horas)
11. ✅ Agregar estilos CSS
12. ✅ Pulir detalles y corregir bugs
13. ✅ (Opcional) Implementar desafíos extra

---

## 🐛 Errores Comunes y Cómo Evitarlos

### Error 1: "Call to undefined function"
```php
// ❌ Mal
$fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);

// ✅ Bien
$fechaObj = \DateTime::createFromFormat('Y-m-d', $fecha);
```

### Error 2: "Cannot access private property"
```php
// ❌ Mal (desde fuera de la clase)
echo $cliente->nombre;

// ✅ Bien
echo $cliente->getNombre();
```

### Error 3: Variables no definidas
```php
// ❌ Mal
$nombre = $_POST['nombre'];  // Si no existe, da error

// ✅ Bien
$nombre = $_POST['nombre'] ?? '';
```

### Error 4: No se guardan los errores en sesión
```php
// ❌ Mal (olvidas iniciar sesión)
$_SESSION['errores'] = $errores;

// ✅ Bien
session_start();  // Primero esto
$_SESSION['errores'] = $errores;
```

---

## 📚 Recursos Útiles

### Documentación PHP
- [Clases y Objetos](https://www.php.net/manual/es/language.oop5.php)
- [DateTime](https://www.php.net/manual/es/class.datetime.php)
- [Expresiones Regulares](https://www.php.net/manual/es/function.preg-match.php)
- [Validación de Email](https://www.php.net/manual/es/function.filter-var.php)

### HTML Forms
- [MDN: Formularios HTML](https://developer.mozilla.org/es/docs/Learn/Forms)
- [Input Types](https://www.w3schools.com/html/html_form_input_types.asp)

### CSS
- [Flexbox Guide](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
- [CSS Grid](https://css-tricks.com/snippets/css/complete-guide-grid/)

---

## ✅ Mini Checklist por Clase

### Cliente.php
- [ ] Propiedad `nombre` declarada
- [ ] Propiedad `telefono` declarada
- [ ] Propiedad `email` declarada
- [ ] Constructor valida nombre (3-50 caracteres)
- [ ] Constructor valida teléfono (9 dígitos)
- [ ] Constructor valida email (formato válido)
- [ ] Getter `getNombre()`
- [ ] Getter `getTelefono()`
- [ ] Getter `getEmail()`
- [ ] Método `__toString()` implementado

### Mesa.php
- [ ] Propiedad `numero` declarada
- [ ] Propiedad `capacidad` declarada
- [ ] Propiedad `ubicacion` declarada
- [ ] Constructor valida número (positivo)
- [ ] Constructor valida capacidad (2-10)
- [ ] Constructor valida ubicación (terraza/interior/ventana)
- [ ] Método `puedeAcomodar(int $personas)` implementado
- [ ] Getters implementados
- [ ] Método `__toString()` implementado

### Reserva.php
- [ ] Todas las propiedades declaradas
- [ ] Constructor valida fecha (no pasada)
- [ ] Constructor valida hora (formato correcto)
- [ ] Constructor valida que mesa acomoda a personas
- [ ] Método `confirmar()` implementado
- [ ] Método `cancelar()` implementado
- [ ] Getters implementados
- [ ] Método `__toString()` implementado

---

## 🎮 Comandos Útiles

```bash
# Ver errores de PHP en tiempo real
tail -f /var/log/apache2/error.log

# Verificar sintaxis de un archivo PHP
php -l src/Cliente.php

# Ejecutar archivo de pruebas
php test.php

# Iniciar servidor PHP local
php -S localhost:8000 -t public
# Luego abre: http://localhost:8000
```

---

## 🏆 Cuando Termines

Crea un archivo `COMPLETADO.md` con:

1. **Capturas de pantalla** del formulario y la confirmación
2. **Cosas que aprendiste** haciendo el proyecto
3. **Dificultades que encontraste** y cómo las resolviste
4. **Desafíos extra** que completaste (si hiciste alguno)
5. **Ideas de mejora** para futuras versiones

---

**¡Ahora sí, manos a la obra! 💪**

Recuerda: **No hay prisa, pero tampoco pausa.** Toma tu tiempo para entender cada parte.

**¡Mucho éxito! 🚀**