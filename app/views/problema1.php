<!DOCTYPE html>
<html>
<head>
    <title>Problema 1 - Estadísticas</title>
    <link rel="stylesheet" href="app/styles/global.css">
</head>
<body>
    <h2>Problema 1: Calcular media, desviación, mínimo y máximo de 5 números positivos</h2>
    <form method="POST">
        <?php for($i=1;$i<=5;$i++): ?>
            Número <?= $i ?>: <input type="number" name="num<?= $i ?>" step="any" required><br>
        <?php endfor; ?>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)): ?>
        <p class="error">⚠️ Error: <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <h3>Resultados:</h3>
        <ul>
            <li>Media: <?= number_format($resultado['media'], 2) ?></li>
            <li>Desviación estándar: <?= number_format($resultado['desviacion'], 2) ?></li>
            <li>Mínimo: <?= $resultado['min'] ?></li>
            <li>Máximo: <?= $resultado['max'] ?></li>
        </ul>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include 'footer.php'; ?>
</body>
</html>