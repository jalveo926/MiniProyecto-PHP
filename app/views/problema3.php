<!DOCTYPE html>
<html>
<head>
    <title>Problema 3 - Presupuesto Hospital</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema3.css">
</head>
<body>
    <h2>Problema 3: Distribución del presupuesto del hospital</h2>
    <form method="POST">
        <label>Presupuesto anual total (USD):</label>
        <input type="number" name="presupuesto" step="any" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)): ?>
        <p class="error">⚠️ Error: <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($resultados): ?>
        <h3>Presupuesto por área:</h3>
        <table  cellpadding="8">
            <tr><th>Área</th><th>Porcentaje</th><th>Monto (USD)</th><th>Gráfico</th></tr>
            <?php foreach ($resultados as $area => $monto): ?>
                <?php 
                    $porcentaje = ($area == 'Ginecología') ? 40 : (($area == 'Traumatología') ? 35 : 25);
                    $ancho = $porcentaje * 2; // para que se vea proporcionado
                ?>
                <tr>
                    <td><?= $area ?></td>
                    <td><?= $porcentaje ?>%</td>
                    <td>$ <?= number_format($monto, 2) ?></td>
                    <td><div class="barra" style="width:<?= $ancho ?>px;"></div></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Gráfico de barras alternativo (más visual) -->
        <h3>Gráfico de barras:</h3>
        <?php foreach ($resultados as $area => $monto): 
            $porcentaje = ($area == 'Ginecología') ? 40 : (($area == 'Traumatología') ? 35 : 25);
        ?>
            <div class="contenedor">
                <strong><?= $area ?> (<?= $porcentaje ?>%)</strong><br>
                <div class="barra" style="width: <?= $porcentaje * 3 ?>px;">$ <?= number_format($monto, 2) ?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include 'footer.php'; ?>
</body>
</html>