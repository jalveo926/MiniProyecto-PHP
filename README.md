# Mini Proyecto PHP - Estructura POO con Utilidades

![Universidad Tecnológica de Panamá](https://img.shields.io/badge/UTP-Universidad%20Tecnológica%20de%20Panamá-blue)
![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-purple)
![Status](https://img.shields.io/badge/Status-Completado-green)

---

## 📋 Información del Proyecto

### 📌 Detalles Generales
- **Nombre del Proyecto:** Mini Proyecto PHP - DS VII
- **Institución:** Universidad Tecnológica de Panamá (UTP)
- **Curso:** Desarrollo de Software VII
- **Fecha de Realización:** 2026
- **Tipo de Proyecto:** Aplicación Web - Resolución de Problemas Matemáticos y de Lógica

### 👥 Grupo de Estudiantes
- **Integrantes:** Jesús Alveo, Guillermo Siuki y Roniel Quintero
- **Carrera:** Licenciatura en Desarrollo y Gestión de Software

---

## 🎯 Introducción

Este proyecto es una **aplicación web desarrollada en PHP** que implementa la resolución de **9 problemas matemáticos y lógicos** utilizando **Programación Orientada a Objetos (POO)**. La aplicación demuestra buenas prácticas de desarrollo incluyendo:

- ✅ Arquitectura MVC (Model-View-Controller)
- ✅ Encapsulación mediante métodos estáticos
- ✅ Validación y sanitización de datos
- ✅ Gestión de errores mediante logs
- ✅ Uso de Composer para autoloading con PSR-4

La aplicación resuelve diversos problemas que incluyen desde **cálculos estadísticos** hasta **clasificación de datos** y **operaciones matemáticas avanzadas**.

---

## 🛠️ Tecnologías Utilizadas

| Tecnología | Versión | Descripción |
|-----------|---------|------------|
| **PHP** | 7.4+ | Lenguaje de programación principal |
| **Composer** | Latest | Gestor de dependencias y autoloading |
| **HTML5** | Estándar | Estructura de vistas |
| **CSS3** | Estándar | Estilos y diseño responsivo |
| **JavaScript** | ES6+ | Gráficos y interactividad (Problema 5) |
| **Apache/WAMP** | Latest | Servidor web |

### 📦 Dependencias
```json
{
  "name": "mini-proyecto/app",
  "description": "Mini proyecto DS VII",
  "type": "project",
  "autoload": {
    "psr-4": {
      "App\\": "app/"
    }
  }
}
```

---

## 🏗️ Arquitectura del Proyecto

### Estructura de Carpetas
```
MiniProyecto-PHP/
├── App/
│   ├── assets/              # Recursos estáticos (imágenes, fonts)
│   ├── controllers/         # Controladores (9 problemas + menu)
│   ├── models/              # Modelos (clases de datos)
│   ├── utils/               # Clases de utilidad (Validación, Sanitización, Matemática)
│   ├── views/               # Vistas (plantillas PHP)
│   ├── styles/              # Estilos CSS (9 hojas de estilos)
│   └── logs/                # Logs de errores
├── vendor/                  # Librerías de Composer
├── composer.json            # Configuración de Composer
├── index.php                # Punto de entrada
├── footer.php               # Pie de página
└── README.md                # Documentación
```

### Patrón de Diseño: MVC
```
index.php
    ↓
[Validar acción GET]
    ↓
Controllers/[Problema]Controller.php
    ↓
Models/ → Procesar datos
    ↓
Utils/ → Validación, Sanitización, Matemática
    ↓
views/[problema].php → Mostrar resultado
```

---

## 🎓 Programación Orientada a Objetos (POO)

El proyecto utiliza **POO** en todos sus componentes principales:

### 1️⃣ Clases Principales

#### **Clase Persona** (`App\Models\Persona.php`)
Gestiona clasificación de personas por categorías de edad.

```php
class Persona {
    private $personasEdad = [];
    private $personasXCategoria = [/*...*/];
    
    public function agregarPersona($edad)
    public function clasificarPersonas()
    public function getPersonasXCategoria()
}
```

**Características POO:**
- ✅ **Encapsulación:** Propiedades privadas
- ✅ **Métodos público/privado:** Control de acceso
- ✅ **Responsabilidad única:** Solo gestiona personas

---

### 2️⃣ Clases de Utilidad con Métodos Estáticos

Las clases de utilidad utilizan **métodos estáticos** para proporcionar funcionalidad sin necesidad de instancia:

#### **Clase Matematica** (`App\Utils\Matematica.php`)
Encapsula operaciones matemáticas comunes.

```php
public static function media(array $numeros): float
public static function desviacionEstandar(array $numeros): float
public static function sumarRango(int $inicio, int $fin): int
public static function minimoMaximo(array $numeros): array
public static function cuadrado($numero): float
public static function raizCuadrada($numero): float
public static function potencia(float $base, int $exponente): float
```

#### **Clase Validador** (`App\Utils\Validador.php`)
Valida diferentes tipos de entrada de datos.

```php
public static function esNumeroPositivo($dato): bool
public static function esEmailValido($email): bool
public static function esSoloLetras($texto): bool
public static function esNumeroEnRango($dato, $minimo, $maximo): bool
```

#### **Clase Sanitizador** (`App\Utils\Sanitizador.php`)
Limpia y sanitiza datos de entrada para seguridad.

```php
public static function limpiarHTML($dato): string
public static function sanitizarEntrada($dato): string
public static function sanitizarNumero($dato): string
public static function sanitizarParaBD($dato): string
```

---

## 📐 Funciones Matemáticas Documentadas

### Función: `media(array $numeros): float`
**Propósito:** Calcula el promedio de un conjunto de números.

**Fórmula:** $\frac{\sum_{i=1}^{n} x_i}{n}$

**Implementación:**
```php
public static function media(array $numeros): float {
    if (empty($numeros)) return 0;
    return array_sum($numeros) / count($numeros);
}
```

**Uso:**
```php
$numeros = [10, 20, 30, 40, 50];
$promedio = Matematica::media($numeros); // Resultado: 30
```

---

### Función: `desviacionEstandar(array $numeros): float`
**Propósito:** Calcula la desviación estándar (dispersión de datos).

**Fórmula:** $\sigma = \sqrt{\frac{\sum_{i=1}^{n} (x_i - \mu)^2}{n}}$

**Implementación:**
```php
public static function desviacionEstandar(array $numeros): float {
    if (empty($numeros)) return 0;
    $media = self::media($numeros);
    $sumaCuadrados = 0;
    foreach ($numeros as $n) {
        $sumaCuadrados += pow($n - $media, 2);
    }
    return sqrt($sumaCuadrados / count($numeros));
}
```

**Uso:** Para analizar la variabilidad de datos en Problema 1.

---

### Función: `sumarRango(int $inicio, int $fin): int`
**Propósito:** Calcula la suma de números en un rango optimizadamente.

**Fórmula (Gauss):** $\text{suma}(n) = \frac{n(n+1)}{2}$

**Implementación:**
```php
public static function sumarRango(int $inicio, int $fin): int {
    if ($inicio > $fin) return 0;
    $sumaHastaFin = $fin * ($fin + 1) / 2;
    $sumaAntesInicio = ($inicio - 1) * $inicio / 2;
    return $sumaHastaFin - $sumaAntesInicio;
}
```

**Ejemplo:**
```php
$suma = Matematica::sumarRango(1, 1000); // Resultado: 500500
```

**Problema relacionado:** Problema 2 - Suma de números del 1 al 1000.

---

### Función: `cuadrado($numero): float`
**Propósito:** Eleva un número al cuadrado.

**Fórmula:** $x^2 = x \times x$

**Implementación:**
```php
public static function cuadrado($numero): float {
    return pow($numero, 2);
}
```

---

### Función: `raizCuadrada($numero): float`
**Propósito:** Calcula la raíz cuadrada de un número.

**Fórmula:** $\sqrt{x}$

**Implementación:**
```php
public static function raizCuadrada($numero): float {
    if ($numero < 0) return 0;
    return sqrt($numero);
}
```

**Validación:** Retorna 0 si el número es negativo (evita errores).

---

### Función: `minimoMaximo(array $numeros): array`
**Propósito:** Encuentra el mínimo y máximo en una pasada.

**Implementación:**
```php
public static function minimoMaximo(array $numeros): array {
    if (empty($numeros)) return ['min' => 0, 'max' => 0];
    return ['min' => min($numeros), 'max' => max($numeros)];
}
```

**Retorno:**
```php
['min' => valor_minimo, 'max' => valor_maximo]
```

---

## 🔐 Validación y Sanitización de Datos

### Sistema de Validación (`App\Utils\Validador.php`)

#### `esNumeroPositivo($dato): bool`
Valida que el dato sea un número positivo.

**Técnica:** `filter_var()` con `FILTER_VALIDATE_FLOAT`

```php
if (Validador::esNumeroPositivo($_POST['edad'])) {
    $edad = (int)$_POST['edad'];
} else {
    $error = "Edad debe ser un número positivo";
}
```

---

#### `esSoloLetras($texto): bool`
Valida que el texto contenga solo letras y espacios.

**Expresión Regular:**
```regex
/^[a-zA-Z\u00E1\u00E9\u00ED\u00F3\u00FA\u00FC\u00F1\u00C1\u00C9\u00CD\u00D3\u00DA\u00DC\u00D1\s]+$/u
```

**Soporta:**
- ✅ Minúsculas: a-z
- ✅ Mayúsculas: A-Z
- ✅ Acentos: á, é, í, ó, ú, ü, ñ (y mayúsculas)
- ✅ Espacios en blanco

**Ejemplo:**
```php
if (Validador::esSoloLetras($nombre)) {
    // Nombre válido
}
```

---

#### `esNumeroEnRango($dato, $minimo, $maximo): bool`
Valida que un número esté dentro de un rango.

```php
if (Validador::esNumeroEnRango($calificacion, 0, 100)) {
    // Calificación válida
}
```

---

### Sistema de Sanitización (`App\Utils\Sanitizador.php`)

#### `limpiarHTML($dato): string`
Convierte caracteres HTML especiales para prevenir **XSS**.

**Funciones usadas:** `htmlspecialchars()`, `ENT_QUOTES`, UTF-8

```php
$entrada = "<script>alert('XSS')</script>";
$limpia = Sanitizador::limpiarHTML($entrada);
// Resultado: &lt;script&gt;alert(&#039;XSS&#039;)&lt;/script&gt;
```

---

#### `sanitizarEntrada($dato): string`
Remueve espacios en blanco y etiquetas HTML.

**Funciones usadas:** `trim()`, `strip_tags()`

```php
$entrada = "  <p>Hola Mundo</p>  ";
$limpia = Sanitizador::sanitizarEntrada($entrada);
// Resultado: "Hola Mundo"
```

---

#### `sanitizarNumero($dato): string`
Extrae solo dígitos y puntos (decimal).

**Expresión Regular:** `/[^0-9.]/`

```php
$entrada = "Precio: $150.50 USD";
$numero = Sanitizador::sanitizarNumero($entrada);
// Resultado: "150.50"
```

---

#### `sanitizarParaBD($dato): string`
Prepara datos para insertar en base de datos.

**Funciones usadas:** `limpiarHTML()`, `addslashes()`

```php
$nombre = "O'Brien";
$seguro = Sanitizador::sanitizarParaBD($nombre);
// Resultado: O\'Brien (escapado para BD)
```

---

## 📝 Descripción de Problemas Resueltos

### Problema 1: Análisis Estadístico
**Descripción:** Calcula media, desviación estándar, mínimo y máximo de 5 números.

**Funciones usadas:**
- `Validador::esNumeroPositivo()`
- `Matematica::media()`
- `Matematica::desviacionEstandar()`

---

### Problema 2: Suma de Rango
**Descripción:** Calcula la suma de números del 1 al 1000 usando fórmula de Gauss.

**Resultado:** 500,500

**Funciones usadas:**
- `Matematica::sumarRango(1, 1000)`

---

### Problema 3: Distribución de Presupuesto
**Descripción:** Distribuye un presupuesto entre 3 áreas hospitalarias según porcentajes.

**Áreas:**
- Ginecología: 40%
- Traumatología: 35%
- Pediatría: 25%

**Funciones usadas:**
- `Validador::esNumeroPositivo()`

---

### Problema 4: Suma de Números Pares e Impares
**Descripción:** Clasifica números del 1 al 200 como pares o impares, calcula sus sumas independientes.

**Resultados:**
- Suma de pares: 1 + 2 + 4 + 6 + ... + 200
- Suma de impares: 1 + 3 + 5 + 7 + ... + 199
- Total de pares y total de impares
- Suma total

**Patrón utilizado:** Switch statement para clasificación

**Ejemplo de salida:**
- Suma Pares: 10,100
- Suma Impares: 10,000
- Total Pares: 100 números
- Total Impares: 100 números

---

### Problema 5: Clasificación de Personas por Edad
**Descripción:** Clasifica personas según su edad en categorías.

**Categorías:**
- Niño: 0-12 años
- Adolescente: 13-17 años
- Adulto: 18-64 años
- Adulto Mayor: 65+ años

**POO utilizada:**
- Clase `Persona` con métodos:
  - `agregarPersona($edad)`
  - `clasificarPersonas()`
  - `getPersonasXCategoria()`

**Características:**
- ✅ Persistencia mediante sesiones PHP
- ✅ Validación de edad (0-120)
- ✅ Reseteo de datos

---

### Problema 6: Múltiplos de 4
**Descripción:** Genera los N primeros múltiplos de 4 donde N es ingresado por el usuario.

**Funciones usadas:**
- `Sanitizador::sanitizarNumero()` - Extrae solo números
- `Validador::esNumeroPositivo()` - Valida entrada

**Ejemplo:**
- Entrada: N = 10
- Salida: 4, 8, 12, 16, 20, 24, 28, 32, 36, 40
- Suma total: 220

---

### Problema 7: Cálculo de Notas y Promedio
**Descripción:** Permite al usuario ingresar múltiples notas (entre 1 y 100) y calcula:
- Promedio aritmético
- Nota mínima
- Nota máxima
- Desviación estándar

**Características:**
- ✅ Validación de cantidad de notas (1-100)
- ✅ Validación de rango de notas (0-100)
- ✅ Persistencia mediante sesiones
- ✅ Uso de métodos estáticos de `Matematica`

**Funciones usadas:**
- `Validador::esNumeroEnRango()`
- `Matematica::media()`
- `Matematica::desviacionEstandar()`

---

### Problema 8: Determinación de Estación del Año
**Descripción:** Recibe una fecha y determina la estación del año correspondiente.

**Estaciones (Hemisferio Norte):**
- Invierno: 21 Dic - 20 Mar
- Primavera: 21 Mar - 20 Jun
- Verano: 21 Jun - 20 Sep
- Otoño: 21 Sep - 20 Dic

**Funciones usadas:**
- `DateTime::createFromFormat()` - Parsing de fechas
- Lógica condicional para rangos de fechas

**Ejemplo:**
- Entrada: 2026-06-15
- Salida: Verano

---

### Problema 9: Potencias de un Número
**Descripción:** Solicita un número base (1-9) y genera sus 15 primeras potencias.

**Funciones usadas:**
- `Sanitizador::sanitizarNumero()` - Limpia entrada
- `Validador::esNumeroEnRango()` - Valida rango (1-9)
- `Matematica::potencia()` - Calcula potencias

**Ejemplo:**
- Base: 2
- Salida: 2¹=2, 2²=4, 2³=8, ..., 2¹⁵=32768

**Uso de bucle for:**
```php
for ($exp = 1; $exp <= 15; $exp++) {
    $potencias[] = Matematica::potencia($base, $exp);
}
```

---

## 🚀 Instalación y Ejecución

### 1. Clonar o descargar el proyecto
```bash
cd c:/wamp64/www/Mini Proyecto PHP/MiniProyecto-PHP
```

### 2. Instalar dependencias (si es necesario)
```bash
composer install
```

### 3. Acceder a través del navegador
```
http://localhost/Mini%20Proyecto%20PHP/MiniProyecto-PHP/
```

### 4. Estructura de URLs
```
?action=menu      → Menú principal
?action=problema1 → Problema 1
?action=problema2 → Problema 2
... etc
```

---

## 📂 Archivos Clave

| Archivo | Propósito |
|---------|-----------|
| [index.php](index.php) | Punto de entrada, enrutador |
| [App/controllers/MenuController.php](App/controllers/MenuController.php) | Menú principal |
| [App/utils/Matematica.php](App/utils/Matematica.php) | Funciones matemáticas |
| [App/utils/Validador.php](App/utils/Validador.php) | Validación de datos |
| [App/utils/Sanitizador.php](App/utils/Sanitizador.php) | Sanitización de datos |
| [App/models/Persona.php](App/models/Persona.php) | Modelo de clasificación |

---

## 🔍 Seguridad

El proyecto implementa múltiples capas de seguridad:

### ✅ Validación de Entrada
- Uso de `filter_var()` para validación de tipos
- Expresiones regulares para caracteres específicos
- Validación de rangos

### ✅ Sanitización de Datos
- Uso de `htmlspecialchars()` contra XSS
- Uso de `strip_tags()` para remover HTML
- Uso de `addslashes()` para escapar caracteres

### ✅ Enrutamiento Seguro
```php
$allowed = ['menu', 'problema1', 'problema2', /*...*/];
if (!in_array($action, $allowed)) {
    $action = 'menu'; // Fallback seguro
}
```

### ✅ Logging de Errores
```php
error_log($error, 3, __DIR__ . '/../logs/errores.log');
```

---

## 📊 Estadísticas del Proyecto

| Métrica | Cantidad |
|---------|----------|
| Controladores | 10 (1 menú + 9 problemas) |
| Clases de Utilidad | 3 (Matematica, Validador, Sanitizador) |
| Métodos Estáticos | 20+ |
| Vistas | 10 |
| Hojas de Estilos | 10 |
| Líneas de Código | 1000+ |

---

## 📚 Referencias Técnicas

### Documentación usada
- [PHP Official Documentation](https://www.php.net/manual/)
- [Composer Documentation](https://getcomposer.org/doc/)
- [PSR-4 Autoloading Standard](https://www.php-fig.org/psr/psr-4/)
- [OWASP Security Guidelines](https://owasp.org/)

---

## 📄 Licencia

Este proyecto es de uso académico en la **Universidad Tecnológica de Panamá**.

---

## 👨‍💼 Contacto y Soporte

Para preguntas o sugerencias sobre este proyecto, contactar a:
- **Institución:** Universidad Tecnológica de Panamá (UTP)
- **Curso:** Estructuras de Datos VII (DS VII)

---

## 📝 Notas Finales

Este proyecto demuestra principios fundamentales de:
- ✅ **Programación Orientada a Objetos**
- ✅ **Buenas prácticas de seguridad web**
- ✅ **Arquitectura MVC**
- ✅ **Encapsulación mediante métodos estáticos**
- ✅ **Validación y sanitización de datos**
- ✅ **Manejo de errores y logs**

---

**Última actualización:** Junio 2026  
**Versión:** 1.0

