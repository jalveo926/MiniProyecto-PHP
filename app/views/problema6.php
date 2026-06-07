<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema 6 - Múltiplos de 4</title>
    <link rel="stylesheet" href="App/styles/global.css">
    <link rel="stylesheet" href="App/styles/problema6.css">
</head>
<body>
    <div class="page-wrap">
    <h1>Problema 6</h1>
    <h2>Problema 6: N primeros múltiplos de 4</h2>

    <section>
        <form method="POST">
            <label for="n">¿Cuántos múltiplos de 4 deseas generar? (N):</label>
            <input
                type="number"
                id="n"
                name="n"
                min="1"
                max="1000"
                value="<?= htmlspecialchars($n ?? '') ?>"
                required
            >
            <button type="submit">Generar</button>
        </form>
    </section>

    <?php if ($error): ?>
        <p class="error">ERROR<?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <section>
            <h3>Los <?= $resultado['n'] ?> primeros múltiplos de 4</h3>

            <!-- Tabla de múltiplos -->
            <div class="tabla-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Operación</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado['multiplos'] as $item): ?>
                            <tr>
                                <td><?= $item['indice'] ?></td>
                                <td class="operacion">4 × <?= $item['indice'] ?></td>
                                <td class="valor"><?= number_format($item['valor']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Suma total</strong></td>
                            <td class="valor"><strong><?= number_format($resultado['suma']) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    <?php endif; ?>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
    </div>
</body>
</html>