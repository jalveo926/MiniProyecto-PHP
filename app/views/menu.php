<!DOCTYPE html>
<html>
<head>
    <title>Mini Proyecto - Menú</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/menu.css">
</head>
<body>

<div class="menu-hero">
    <div class="menu-hero-label">Mini Proyecto</div>
    <h1>Problemas 1 – 9</h1>
    <p class="menu-hero-sub">Selecciona un problema para ejecutarlo</p>
</div>

<div class="menu-grid">

    <a href="index.php?action=problema1" class="menu-card">
        <span class="menu-num">01</span>
        <span class="menu-title">Estadísticas de 5 números</span>
        <span class="menu-desc">Media, mínimo, máximo y rango</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema2" class="menu-card">
        <span class="menu-num">02</span>
        <span class="menu-title">Suma de 1 a 1000</span>
        <span class="menu-desc">Acumulación con bucle</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema3" class="menu-card">
        <span class="menu-num">03</span>
        <span class="menu-title">Presupuesto del Hospital</span>
        <span class="menu-desc">Distribución porcentual por área</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema4" class="menu-card">
        <span class="menu-num">04</span>
        <span class="menu-title">Suma de Pares e Impares</span>
        <span class="menu-desc">Del 1 al 200 con comparativa</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema5" class="menu-card">
        <span class="menu-num">05</span>
        <span class="menu-title">Clasificación por Edad</span>
        <span class="menu-desc">Niño, adolescente, adulto, mayor</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema6" class="menu-card">
        <span class="menu-num">06</span>
        <span class="menu-title">Múltiplos de 4</span>
        <span class="menu-desc">N primeros múltiplos en tabla</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema7" class="menu-card">
        <span class="menu-num">07</span>
        <span class="menu-title">Datos Estadísticos</span>
        <span class="menu-desc">Media, mediana, moda y más</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema8" class="menu-card">
        <span class="menu-num">08</span>
        <span class="menu-title">Estación del Año</span>
        <span class="menu-desc">Determina la estación por fecha</span>
        <span class="menu-arrow">→</span>
    </a>

    <a href="index.php?action=problema9" class="menu-card">
        <span class="menu-num">09</span>
        <span class="menu-title">Potencias de un Número</span>
        <span class="menu-desc">Las 15 primeras potencias</span>
        <span class="menu-arrow">→</span>
    </a>

</div>

<?php include 'footer.php'; ?>
</body>
</html>