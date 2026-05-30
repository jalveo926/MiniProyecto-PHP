# Clases de Utilidad - Especificaciones Técnicas

## Resumen de Implementación

Se han implementado **3 clases de utilidad** con métodos estáticos siguiendo buenas prácticas de encapsulación y seguridad.

---

## 1. **Validador.php** (`App\Utils`)

### Propósito
Validar diferentes tipos de entrada de datos de forma centralizada.

### Métodos Estáticos Disponibles

#### `esNumeroPositivo($dato): bool`
- **Función:** Valida que el dato sea un número positivo
- **Técnica:** Usa `filter_var()` con `FILTER_VALIDATE_FLOAT`
- **Ejemplo:**
  ```php
  if (Validador::esNumeroPositivo($_POST['edad'])) { ... }
  ```

#### `esEmailValido($email): bool`
- **Función:** Valida formato de email
- **Técnica:** Usa `filter_var()` con `FILTER_VALIDATE_EMAIL`
- **Ejemplo:**
  ```php
  if (Validador::esEmailValido($email)) { ... }
  ```

#### `esSoloLetras($texto): bool`
- **Función:** Valida que contenga solo letras y espacios
- **Técnica:** Usa `preg_match()` con expresión regular Unicode
- **Soporta:** a-z, A-Z, acentos (á, é, í, ó, ú, ü, ñ)
- **Ejemplo:**
  ```php
  if (Validador::esSoloLetras($nombre)) { ... }
  ```

#### `esNumeroEnRango($dato, $minimo, $maximo): bool`
- **Función:** Valida que número esté en rango específico
- **Técnica:** Usa `filter_var()` + comparación lógica
- **Ejemplo:**
  ```php
  if (Validador::esNumeroEnRango($calificacion, 0, 20)) { ... }
  ```

---

## 2. **Sanitizador.php** (`App\Utils`)

### Propósito
Limpiar y sanitizar datos de entrada para prevenir XSS, inyección SQL y otros ataques.

### Métodos Estáticos Disponibles

#### `limpiarHTML($dato): string`
- **Función:** Convierte caracteres HTML especiales
- **Técnica:** Usa `htmlspecialchars()` con `ENT_QUOTES` y UTF-8
- **Protege contra:** XSS (Cross-Site Scripting)
- **Ejemplo:**
  ```php
  $nombre_seguro = Sanitizador::limpiarHTML($_POST['nombre']);
  ```

#### `sanitizarEntrada($dato): string`
- **Función:** Remueve espacios y etiquetas HTML
- **Técnica:** Usa `trim()` + `strip_tags()`
- **Ejemplo:**
  ```php
  $entrada = Sanitizador::sanitizarEntrada($dato);
  ```

#### `sanitizarNumero($dato): string`
- **Función:** Deja solo dígitos y puntos
- **Técnica:** Usa `preg_replace()` eliminando caracteres no numéricos
- **Útil para:** Precios, cantidades, valores decimales
- **Ejemplo:**
  ```php
  $precio = Sanitizador::sanitizarNumero($_POST['monto']);
  ```

#### `sanitizarParaBD($dato): string`
- **Función:** Prepara dato para insertar en base de datos
- **Técnica:** Combina limpieza HTML + `addslashes()`
- **Protege contra:** Inyección SQL
- **Ejemplo:**
  ```php
  $query = "INSERT INTO usuarios VALUES ('" . Sanitizador::sanitizarParaBD($nombre) . "')";
  ```

---

## 3. **Matematica.php** (`App\Utils`)

### Propósito
Encapsular operaciones matemáticas para evitar que funciones como `sqrt()`, `pow()` estén "contra la piel" del código.

### Métodos Estáticos Disponibles

#### `media(array $numeros): float`
- **Función:** Calcula el promedio
- **Fórmula:** Σ(x) / n
- **Ejemplo:**
  ```php
  $promedio = Matematica::media([85, 90, 78, 92]);
  ```

#### `desviacionEstandar(array $numeros): float`
- **Función:** Calcula la desviación estándar
- **Fórmula:** √(Σ(x - media)² / n)
- **Encapsula:** `sqrt()` y `pow()`
- **Ejemplo:**
  ```php
  $desv = Matematica::desviacionEstandar($calificaciones);
  ```

#### `sumarRango(int $inicio, int $fin): int`
- **Función:** Suma números en un rango
- **Optimización:** Usa fórmula matemática en lugar de loop
- **Fórmula:** n(n+1)/2
- **Ejemplo:**
  ```php
  $suma = Matematica::sumarRango(1, 1000); // = 500500
  ```

#### `minimoMaximo(array $numeros): array`
- **Función:** Obtiene mínimo y máximo en una pasada
- **Retorna:** `['min' => X, 'max' => Y]`
- **Ejemplo:**
  ```php
  $rango = Matematica::minimoMaximo([5, 3, 8, 1]);
  // ['min' => 1, 'max' => 8]
  ```

#### `cuadrado($numero): float`
- **Función:** Eleva al cuadrado
- **Encapsula:** `pow($numero, 2)`
- **Ejemplo:**
  ```php
  $cuad = Matematica::cuadrado(5); // 25
  ```

#### `raizCuadrada($numero): float`
- **Función:** Calcula raíz cuadrada
- **Encapsula:** `sqrt()`
- **Protección:** Verifica número no negativo
- **Ejemplo:**
  ```php
  $raiz = Matematica::raizCuadrada(16); // 4
  ```

---

## Uso en Controladores

### Patrón Correcto (✅)
```php
<?php
use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Matematica;

// Validar entrada
if (!Validador::esNumeroEnRango($_POST['nota'], 0, 20)) {
    $error = "Nota inválida";
} else {
    // Sanitizar
    $nota = (float) Sanitizador::sanitizarNumero($_POST['nota']);
    
    // Calcular (sin sqrt(), pow() directo)
    $promedio = Matematica::media($notas);
    $desviacion = Matematica::desviacionEstandar($notas);
}
?>
```

### Patrón Incorrecto (❌)
```php
<?php
// NO usar funciones directamente
$promedio = array_sum($notas) / count($notas);  // ❌ Duplicar lógica
$desv = sqrt(...);  // ❌ Función nativa suelta
echo htmlspecialchars($entrada);  // ❌ Mezclar sanitización con lógica

// NO usar métodos privados o sin utilidades
pow(5, 2);  // ❌ Usar Matematica::cuadrado()
preg_match(...);  // ❌ Usar Validador::esSoloLetras()
?>
```

---

## Ventajas de esta Arquitectura

| Aspecto | Beneficio |
|--------|-----------|
| **Encapsulación** | Lógica de validación/sanitización centralizada |
| **Reutilización** | Llamar métodos en múltiples controladores |
| **Mantenimiento** | Cambios en un solo lugar afectan todo el proyecto |
| **Seguridad** | Prácticas estándar (filter_var, htmlspecialchars) |
| **Legibilidad** | Código limpio sin funciones nativas "sueltas" |
| **Testing** | Fácil de testear métodos estáticos |

---

## Características Técnicas

✅ **Métodos estáticos** - Acceso sin instanciar clase
✅ **Validaciones con filter_var** - Funciones PHP estándar
✅ **Regex con preg_match** - Expresiones regulares Unicode-safe
✅ **Sanitización con htmlspecialchars** - Prevención XSS
✅ **Funciones matemáticas encapsuladas** - sqrt(), pow() dentro de la clase
✅ **Documentación PHPDoc** - Comentarios detallados en cada método
✅ **Type hints** - Declaración de tipos en parámetros y retorno
✅ **Namespace consistente** - `App\Utils` en todas las clases

