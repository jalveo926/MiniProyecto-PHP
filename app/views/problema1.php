<!DOCTYPE html>
<html lang="es">
<head>
    <title>Problema 1 - Estadísticas</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema1.css">
</head>
<body>
<div class="page-wrap">

    <h1>Problema 1</h1>
    <h2>Estadísticas de 5 números positivos</h2>

    <form method="POST">
        <div class="inputs-grid">
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="input-field">
                <label for="num<?= $i ?>">Nº <?= $i ?></label>
                <input type="number" id="num<?= $i ?>" name="num<?= $i ?>"
                       step="any" min="0" required
                       value="<?= isset($_POST['num'.$i]) ? htmlspecialchars($_POST['num'.$i]) : '' ?>">
            </div>
            <?php endfor; ?>
        </div>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)): ?>
        <p class="error">⚠️ <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-label">Media</div>
                <div class="stat-card-value"><?= number_format($resultado['media'], 2) ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">Desviación</div>
                <div class="stat-card-value"><?= number_format($resultado['desviacion'], 2) ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">Mínimo</div>
                <div class="stat-card-value"><?= $resultado['min'] ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">Máximo</div>
                <div class="stat-card-value"><?= $resultado['max'] ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>

</div>
<?php include 'footer.php'; ?>
</body>
</html>