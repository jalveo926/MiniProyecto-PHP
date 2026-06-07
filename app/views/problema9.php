<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 9 - Potencias</title>
    <link rel="stylesheet" href="App/styles/global.css">
    <link rel="stylesheet" href="App/styles/problema9.css">
</head>
<body>
    <div class="page-wrap">
    <h1>Problema 9</h1>
    <h2>15 primeras potencias de un número</h2>

    <section>
        <form method="POST">
            <label for="base">Ingresa un número base (1 al 9):</label>
            <input
                type="number"
                id="base"
                name="base"
                min="1"
                max="9"
                value="<?= htmlspecialchars($base ?? '') ?>"
                required
            >
            <button type="submit">Generar Potencias</button>
        </form>
    </section>

    <?php if ($error): ?>
        <p class="error">ERROR<?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <section>
            <h3>15 primeras potencias de <?= $resultado['base'] ?></h3>

            <table>
                <thead>
                    <tr>
                        <th>Expresión</th>
                        <th>Resultado</th>
                        <th>Representación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado['potencias'] as $item): ?>
                        <tr>
                            <td class="expresion">
                                <?= $resultado['base'] ?><sup><?= $item['exponente'] ?></sup>
                            </td>
                            <td class="valor">
                                <?= number_format($item['valor']) ?>
                            </td>
                            <td class="barra-celda">
                                <div class="barra-mini" style="width: <?= min($item['exponente'] * 6, 100) ?>%"></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    <?php endif; ?>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
    </div>
</body>
</html>