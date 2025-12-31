# 🍽️ PROYECTO: Sistema de Reservas de Restaurante

## 📋 Descripción del Proyecto

Vas a crear un **sistema de gestión de reservas para un restaurante** donde los clientes pueden hacer reservas de mesas indicando fecha, hora, número de personas y preferencias especiales.

---

## 🎯 Objetivos de Aprendizaje

- ✅ Programación Orientada a Objetos (POO)
- ✅ Validaciones de datos
- ✅ Formularios HTML con múltiples tipos de input
- ✅ Manejo de sesiones PHP
- ✅ Separación de responsabilidades (clases, validadores, vistas)
- ✅ CSS responsive y atractivo

---

## 📦 Requisitos Funcionales

### **PARTE 1: Clases Básicas (Modelos)** ⭐

Debes crear 3 clases:

#### 1. **Clase `Cliente`**
Representa a la persona que hace la reserva.

**Propiedades:**
- `nombre` (string): Nombre completo del cliente
- `telefono` (string): Teléfono de contacto (formato: 9 dígitos)
- `email` (string): Email del cliente

**Métodos:**
- `__construct()`: Constructor con las 3 propiedades
- Getters para todas las propiedades
- `__toString()`: Retorna información del cliente

**Validaciones internas (en el constructor):**
- Nombre: mínimo 3 caracteres, máximo 50
- Teléfono: exactamente 9 dígitos numéricos
- Email: formato válido de email

#### 2. **Clase `Mesa`**
Representa una mesa del restaurante.

**Propiedades:**
- `numero` (int): Número de la mesa
- `capacidad` (int): Cuántas personas caben
- `ubicacion` (string): "terraza", "interior" o "ventana"

**Métodos:**
- `__construct()`: Constructor con las 3 propiedades
- Getters para todas las propiedades
- `puedeAcomodar(int $personas)`: Retorna true si la capacidad es suficiente
- `__toString()`: Retorna información de la mesa

**Validaciones internas:**
- Número: debe ser positivo
- Capacidad: entre 2 y 10 personas
- Ubicación: solo puede ser "terraza", "interior" o "ventana"

#### 3. **Clase `Reserva`**
Representa una reserva completa.

**Propiedades:**
- `cliente` (Cliente): El cliente que reserva
- `mesa` (Mesa): La mesa reservada
- `fecha` (string): Fecha de la reserva (formato Y-m-d)
- `hora` (string): Hora de la reserva (formato H:i)
- `numPersonas` (int): Número de comensales
- `observaciones` (string): Comentarios adicionales (opcional)
- `estado` (string): "pendiente", "confirmada" o "cancelada"

**Métodos:**
- `__construct()`: Constructor con todas las propiedades (observaciones y estado opcionales)
- Getters para todas las propiedades
- `confirmar()`: Cambia el estado a "confirmada"
- `cancelar()`: Cambia el estado a "cancelada"
- `__toString()`: Retorna información completa de la reserva

**Validaciones internas:**
- Fecha: no puede ser anterior a hoy
- Hora: debe ser formato válido (HH:MM)
- Número de personas: debe ser mayor que 0
- La mesa debe poder acomodar al número de personas

---

### **PARTE 2: Sistema de Validación** ⭐⭐

#### Clase `ValidadorReserva`

Debe validar TODOS los datos del formulario antes de crear los objetos.

**Validaciones requeridas:**

**Cliente:**
- Nombre: obligatorio, mínimo 3 caracteres, máximo 50
- Teléfono: obligatorio, exactamente 9 dígitos numéricos
- Email: obligatorio, formato válido

**Reserva:**
- Fecha: obligatoria, no puede ser anterior a hoy, máximo 30 días en el futuro
- Hora: obligatoria, formato HH:MM, debe estar entre 12:00 y 23:00
- Número de personas: obligatorio, entre 1 y 10

**Mesa:**
- Número de mesa: obligatorio, entre 1 y 20
- Ubicación: obligatoria, solo "terraza", "interior" o "ventana"

**Observaciones:**
- Opcional, pero si se escribe, máximo 200 caracteres

**Métodos requeridos:**
```php
public function validar(): bool
public function getErrores(): array
public function getDatosLimpios(): array
```

---

### **PARTE 3: Formulario Web** ⭐⭐

Crear un formulario HTML con los siguientes campos:

#### **Sección: Datos del Cliente**
- Nombre completo (text)
- Teléfono (tel)
- Email (email)

#### **Sección: Detalles de la Reserva**
- Fecha (date)
- Hora (time)
- Número de personas (number)
- Ubicación preferida (select: terraza, interior, ventana)
- Número de mesa (select: 1-20)
- Observaciones (textarea - opcional)

**Botón:** "Hacer Reserva"

**Requisitos del formulario:**
- Debe mantener los valores si hay errores de validación
- Debe mostrar errores específicos debajo de cada campo
- Los campos con error deben resaltarse en rojo
- Diseño atractivo y responsive

---

### **PARTE 4: Procesamiento y Confirmación** ⭐

Crear `procesar_reserva.php` que:

1. Reciba los datos del formulario por POST
2. Valide usando `ValidadorReserva`
3. Si hay errores, vuelva al formulario con los errores
4. Si todo está bien:
   - Cree los objetos Cliente, Mesa y Reserva
   - Muestre una página de confirmación bonita
   - Opción para hacer otra reserva

---

## 🎨 Requisitos de Diseño (CSS)

- Usar una paleta de colores relacionada con restaurantes (ej: rojos, naranjas, dorados)
- Formulario centrado y con sombras
- Inputs con bordes redondeados
- Botón con efecto hover
- Página responsive (se ve bien en móvil)
- Iconos o emojis para mejorar la UX (🍽️ 📅 👤 📞)

---

## 🚀 DESAFÍOS EXTRA (Opcional - ¡Para que te luzcas!)

### **Desafío 1: Sistema de Horarios** ⭐⭐⭐
Crear un método en la clase `Reserva` llamado `validarHorario()` que:
- No permita reservas antes de las 12:00
- No permita reservas después de las 23:00
- Los viernes y sábados permita hasta las 00:00

### **Desafío 2: Disponibilidad de Mesas** ⭐⭐⭐⭐
Crear una clase `GestorReservas` que:
- Almacene múltiples reservas en un array
- Tenga un método `mesaDisponible(int $numeroMesa, string $fecha, string $hora): bool`
- Evite que se reserven mesas ya ocupadas en la misma fecha/hora

### **Desafío 3: Menú Especial** ⭐⭐
Agregar un campo en el formulario para seleccionar un "menú especial":
- Menú del día
- Menú degustación
- Menú vegetariano
- Sin menú especial

Agregar esta información a la reserva y mostrarla en la confirmación.

### **Desafío 4: Cálculo de Precio Estimado** ⭐⭐⭐
Crear un método en `Reserva` que calcule un precio estimado:
- Precio base por persona: 25€
- Si es fin de semana (viernes/sábado): +20%
- Si es menú degustación: +35€ por persona
- Si es terraza: +5€ por persona

### **Desafío 5: Generador de Código de Reserva** ⭐⭐
Crear un método que genere un código único de reserva:
- Formato: `RSV-AAAAMMDD-XXXX`
- Ejemplo: `RSV-20251226-A3F7`
- Los últimos 4 caracteres son aleatorios

### **Desafío 6: Exportar Reserva a JSON** ⭐⭐⭐
Agregar un método `toJSON()` en la clase `Reserva` que retorne todos los datos en formato JSON para poder guardarlo o enviarlo por API.

---

## 📁 Estructura de Archivos Esperada

```
proyecto-restaurante/
│
├── src/
│   ├── Cliente.php
│   ├── Mesa.php
│   ├── Reserva.php
│   └── ValidadorReserva.php
│
├── public/
│   ├── index.php (formulario)
│   ├── procesar_reserva.php (procesa y muestra confirmación)
│   └── css/
│       └── style.css
│
└── README.md (documenta tu proyecto)
```

---

## ✅ Checklist de Entrega

Antes de considerar el proyecto terminado, verifica:

### Funcionalidad Básica
- [ ] Las 3 clases (Cliente, Mesa, Reserva) están creadas
- [ ] Todas las clases tienen validaciones en el constructor
- [ ] La clase ValidadorReserva funciona correctamente
- [ ] El formulario tiene todos los campos requeridos
- [ ] Los errores se muestran específicamente bajo cada campo
- [ ] Los valores se mantienen al volver por errores
- [ ] La página de confirmación muestra todos los datos

### Validaciones
- [ ] No se puede reservar en el pasado
- [ ] El teléfono debe tener exactamente 9 dígitos
- [ ] El email debe tener formato válido
- [ ] La hora debe estar en el rango permitido (12:00-23:00)
- [ ] El número de personas no puede exceder la capacidad de la mesa
- [ ] Solo se permiten las ubicaciones válidas

### Diseño
- [ ] El CSS está en un archivo separado
- [ ] El diseño es responsive (se ve bien en móvil)
- [ ] Los campos con error se resaltan en rojo
- [ ] Los botones tienen efecto hover
- [ ] La tipografía es legible

### Código Limpio
- [ ] Los nombres de variables son descriptivos
- [ ] El código tiene comentarios explicativos
- [ ] No hay código duplicado
- [ ] Las clases tienen una sola responsabilidad

---

## 🎯 Criterios de Evaluación

| Aspecto | Peso | Descripción |
|---------|------|-------------|
| **Clases POO** | 30% | Correcta implementación de las 3 clases |
| **Validaciones** | 25% | Todas las validaciones funcionan |
| **Formulario** | 20% | Formulario completo y funcional |
| **UX/UI** | 15% | Diseño atractivo y usable |
| **Código limpio** | 10% | Código organizado y legible |
| **Desafíos extra** | +Bonus | Puntos extra por cada desafío completado |

---

## 💡 Consejos y Recomendaciones

1. **Empieza por las clases**: Primero crea Cliente, luego Mesa, luego Reserva
2. **Prueba cada clase**: Crea un archivo `test.php` para probar tus clases antes de hacer el formulario
3. **Usa el operador `??`**: Para evitar errores con datos no existentes
4. **Reutiliza código**: Si ves que repites código, crea una función
5. **Commits frecuentes**: Si usas Git, haz commits pequeños y frecuentes
6. **Lee los errores**: PHP te dice exactamente qué está mal, ¡léelos!
7. **Consulta la documentación**: [php.net](https://php.net) es tu mejor amigo
8. **No copies y pegues**: Escribe el código tú mismo para aprender

---

## 🆘 Si Te Atascas

1. **Revisa los tutoriales** que ya tienes sobre arquitectura y validaciones
2. **Compara con el proyecto de eventos** que ya hiciste
3. **Divide el problema**: Si algo es muy difícil, divídelo en partes más pequeñas
4. **Pregunta específicamente**: "¿Cómo valido un email?" es mejor que "No funciona"
5. **Busca en Google**: La mayoría de problemas ya los resolvió alguien

---

## 🎁 Bonus: Ideas de Expansión Futura

Una vez completado, podrías:
- Agregar base de datos MySQL para persistir las reservas
- Sistema de login para clientes
- Panel de administración para el restaurante
- Envío de emails de confirmación
- Integración con calendario (Google Calendar)
- Sistema de valoraciones de clientes
- Gestión de menús y platos
- Cálculo de estadísticas (reservas por día, mesas más populares)

---

## 🏁 ¿Listo para Empezar?

**Tiempo estimado:** 4-6 horas para la versión básica

**Nivel de dificultad:** ⭐⭐⭐ (Intermedio)

**Recompensa:** Un proyecto completo para tu portfolio + sólidos conocimientos de PHP POO

---