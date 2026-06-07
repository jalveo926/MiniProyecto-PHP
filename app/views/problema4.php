<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 4 - Suma de Pares e Impares</title>
    <link rel="stylesheet" href="App/styles/global.css">
    <link rel="stylesheet" href="App/styles/problema4.css">
</head>
<body>
    <h2>Problema 4: Suma de Pares e Impares del 1 al 200</h2>

    <section class="resumen-grid">

        <!-- Tarjeta pares -->
        <div class="tarjeta tarjeta-pares">
            <div class="tarjeta-icono">2n</div>
            <h3>Números Pares</h3>
            <p class="cantidad"><?= $resultado['totalPares'] ?> números</p>
            <p class="suma-label">Suma total</p>
            <p class="suma-valor"><?= number_format($resultado['sumaPares']) ?></p>
        </div>

        <!-- Tarjeta impares -->
        <div class="tarjeta tarjeta-impares">
            <div class="tarjeta-icono">2n+1</div>
            <h3>Números Impares</h3>
            <p class="cantidad"><?= $resultado['totalImpares'] ?> números</p>
            <p class="suma-label">Suma total</p>
            <p class="suma-valor"><?= number_format($resultado['sumaImpares']) ?></p>
        </div>

        <!-- Tarjeta total -->
        <div class="tarjeta tarjeta-total">
            <div class="tarjeta-icono">Σ</div>
            <h3>Suma Total</h3>
            <p class="cantidad">200 números (1–200)</p>
            <p class="suma-label">Pares + Impares</p>
            <p class="suma-valor"><?= number_format($resultado['sumaTotal']) ?></p>
        </div>
    </section>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>