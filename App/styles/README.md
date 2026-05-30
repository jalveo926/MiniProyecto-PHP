# Estructura de Estilos CSS

Este directorio contiene la configuración de estilos para todo el proyecto.

## Archivos de Estilos

### `global.css`
**Hoja de estilos global** utilizada por todas las páginas.

Contiene:
- Reset y estilos base (body, html)
- Estilos de elementos comunes (h1-h6, p, a, form, input, button, table)
- Clases globales: `.error`, `.success`, `.info`
- Utilidades: márgenes, paddings, alineación de texto
- Estilos responsive para dispositivos móviles

**Incluir en todas las páginas:**
```html
<link rel="stylesheet" href="app/styles/global.css">
```

### `problema3.css`
**Estilos específicos para Problema 3** - Presupuesto del Hospital

Contiene:
- `.contenedor` - Contenedor para los gráficos de barras
- `.barra` - Barras visuales del gráfico de presupuesto

**Incluir en problema3.php:**
```html
<link rel="stylesheet" href="app/styles/global.css">
<link rel="stylesheet" href="app/styles/problema3.css">
```

### `problema5.css`
**Estilos específicos para Problema 5** - Clasificación de Personas por Edad

Contiene:
- `.categoria` - Contenedor para cada categoría de clasificación
- `.categoria-titulo` - Título de la categoría
- `.categoria-detalle` - Detalles de la categoría

**Incluir en problema5.php:**
```html
<link rel="stylesheet" href="app/styles/global.css">
<link rel="stylesheet" href="app/styles/problema5.css">
```

### `problema7.css`
**Estilos específicos para Problema 7** - Calculadora de Datos Estadísticos

Contiene:
- `.resultados-box` - Caja para mostrar resultados
- `.notas-container` - Grid responsivo para campos de notas
- `.nota-input` - Campo individual para ingresar notas

**Incluir en problema7.php:**
```html
<link rel="stylesheet" href="app/styles/global.css">
<link rel="stylesheet" href="app/styles/problema7.css">
```

## Jerarquía de Estilos

```
global.css (BASE - Todas las páginas)
    ├── problema3.css (Específico P3)
    ├── problema5.css (Específico P5)
    └── problema7.css (Específico P7)
```

## Márgenes de Referencia

El CSS global establece márgenes estándar:
- **Body padding:** 20px (desktop), 10px (mobile)
- **Main/Section/Article:** margin 20px auto, padding 20px
- **Heading margins:** Espaciado consistente
- **Form padding:** 15px
- **Table margins:** 15px top/bottom

### Utilidades de Espaciado Globales

```css
.mt-10  { margin-top: 10px; }
.mt-20  { margin-top: 20px; }
.mt-30  { margin-top: 30px; }
.mb-10  { margin-bottom: 10px; }
.mb-20  { margin-bottom: 20px; }
.mb-30  { margin-bottom: 30px; }

.p-10   { padding: 10px; }
.p-20   { padding: 20px; }
.p-30   { padding: 30px; }
```

## Ejemplo de Estructura HTML Correcta

```html
<!DOCTYPE html>
<html>
<head>
    <title>Problema X - Descripción</title>
    <!-- CSS Global (SIEMPRE) -->
    <link rel="stylesheet" href="app/styles/global.css">
    <!-- CSS Específico (si es necesario) -->
    <link rel="stylesheet" href="app/styles/problemaX.css">
</head>
<body>
    <h2>Problema X: Descripción del Problema</h2>
    
    <!-- Uso de clases globales -->
    <p class="info">Información general</p>
    
    <form method="POST">
        <!-- Formulario aquí -->
    </form>
    
    <?php if ($error): ?>
        <p class="error">⚠️ Error: <?php echo $error; ?></p>
    <?php endif; ?>
    
    <?php if ($resultado): ?>
        <p class="success">✅ Éxito</p>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
```

## Paleta de Colores

| Clase | Color Texto | Color Fondo | Color Borde |
|-------|-----------|-----------|-----------|
| `.error` | #c0392b | #fadbd8 | #c0392b |
| `.success` | #27ae60 | #d5f4e6 | #27ae60 |
| `.info` | #2980b9 | #d6eaf8 | #3498db |
| `.barra` | #ffffff | #3498db | — |

## Responsive Design

Todos los estilos cuentan con media queries para dispositivos móviles (@media max-width: 768px)

- Body padding reducido
- Main/section padding ajustado
- Tamaños de fuente reducidos
- Grid containers ajustados para mobile

## Notas Importantes

1. **No modificar estilos inline en HTML** - Use clases CSS
2. **Reutilizar global.css** - No duplicar estilos entre archivos
3. **Crear problema-X.css solo si:** Los estilos son específicos de ese problema
4. **Mantener orden de inclusión:** global.css primero, luego específicos
5. **Usar utilidades globales:** Prefiere .mt-20 en lugar de style="margin-top: 20px"
