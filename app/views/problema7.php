<!DOCTYPE html>
<html>

<head>
    <title>Problema 7 - Calculadora de Datos Estadísticos</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema7.css">
</head>

<body>
    <div class="page-wrap">
    <h1>Problema 7</h1>
    <h2>Calculadora de Datos Estadísticos</h2>

    <?php if ($error): ?>
    <p class="error">⚠️ <?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Paso 1: Establecer cantidad de notas -->
    <?php if (empty($_SESSION['cantidad_notas']) || $_SESSION['cantidad_notas'] === 0): ?>
    <div class="resultados-box">
        <h3>Paso 1: ¿Cuántas notas deseas ingresar?</h3>
        <form method="POST">
            <label>Cantidad de notas (1-100):</label>
            <input type="number" name="cantidad" min="1" max="100" required>
            <button type="submit" name="accion" value="establecer_cantidad">Establecer Cantidad</button>
        </form>
    </div>
    <?php else: ?>
    <!-- Paso 2: Ingresar las notas -->
    <div class="resultados-box">
        <h3>Paso 2: Ingresa las <?php echo $_SESSION['cantidad_notas']; ?> notas (0-20)</h3>
        <form method="POST">
            <div class="notas-container">
                <?php for ($i = 1; $i <= $_SESSION['cantidad_notas']; $i++): ?>
                <div>
                    <label>Nota <?php echo $i; ?>:</label>
                    <input type="number" name="nota_<?php echo $i; ?>" min="0" max="20" step="0.1" class="nota-input"
                        value="<?php echo isset($notas[$i-1]) ? $notas[$i-1] : ''; ?>">
                </div>
                <?php endfor; ?>
            </div>
            <button type="submit" name="accion" value="agregar_notas">Calcular Estadísticas</button>
            <button type="submit" name="accion" value="limpiar">Limpiar Datos</button>
        </form>
    </div>
    <?php endif; ?>

    <!-- Mostrar resultados -->
    <?php if (isset($resultado_mensaje)): ?>
    <p class="success">✅ <?php echo htmlspecialchars($resultado_mensaje); ?></p>
    <?php endif; ?>

    <?php if (is_array($resultado)): ?>
    <div class="resultados-box">
        <h3>Resultados Estadísticos:</h3>
        <div class="stats-grid">

            <div class="stat-card">
                <div class="titulo">Cantidad</div>
                <div class="valor">
                    <?php echo $resultado['cantidad']; ?>
                </div>
            </div>

            <div class="stat-card">
                <div class="titulo">Promedio</div>
                <div class="valor">
                    <?php echo number_format($resultado['promedio'], 2); ?>
                </div>
            </div>

            <div class="stat-card">
                <div class="titulo">Desv. Estándar</div>
                <div class="valor">
                    <?php echo number_format($resultado['desviacion'], 2); ?>
                </div>
            </div>

            <div class="stat-card">
                <div class="titulo">Mínima</div>
                <div class="valor">
                    <?php echo number_format($resultado['minima'], 2); ?>
                </div>
            </div>

            <div class="stat-card">
                <div class="titulo">Máxima</div>
                <div class="valor">
                    <?php echo number_format($resultado['maxima'], 2); ?>
                </div>
            </div>

        </div>

        <h3>Detalle de Notas Ingresadas</h3>

        <div class="notas-lista">
            <?php foreach ($resultado['notas'] as $index => $nota): ?>
            <span class="nota-chip">
                Nota <?php echo $index + 1; ?>:
                <?php echo number_format($nota, 2); ?>
            </span>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    </div>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>

</html>