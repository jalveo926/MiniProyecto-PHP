<!DOCTYPE html>
<html lang="es">
<head>
    <title>Problema 2 - Suma 1..1000</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema2.css">
</head>
<body>
<div class="page-wrap">

    <h1>Problema 2</h1>
    <h2>Suma de los números del 1 al 1,000</h2>

    <div class="resultado-simple">
        <span class="resultado-simple-label">Resultado</span>
        <span class="resultado-simple-valor"><?= number_format($total, 0) ?></span>
        <span class="resultado-simple-formula">Σ(1 + 2 + 3 + … + 1000)</span>
    </div>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>

</div>
<?php include 'footer.php'; ?>
</body>
</html>