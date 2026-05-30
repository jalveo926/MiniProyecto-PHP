<!DOCTYPE html>
<html>
<head>
    <title>Problema 7 - Calculadora de Datos Estadísticos</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema7.css">
</head>
<body>
    <h2>Problema 7: Calculadora de Datos Estadísticos</h2>
    
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
                            <input type="number" name="nota_<?php echo $i; ?>" min="0" max="20" step="0.1" 
                                   class="nota-input" value="<?php echo isset($notas[$i-1]) ? $notas[$i-1] : ''; ?>">
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
            <table>
                <thead>
                    <tr>
                        <th>Métrica</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Cantidad de Notas</strong></td>
                        <td><?php echo $resultado['cantidad']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Promedio</strong></td>
                        <td><?php echo number_format($resultado['promedio'], 2); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Desviación Estándar</strong></td>
                        <td><?php echo number_format($resultado['desviacion'], 2); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nota Mínima</strong></td>
                        <td><?php echo number_format($resultado['minima'], 2); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nota Máxima</strong></td>
                        <td><?php echo number_format($resultado['maxima'], 2); ?></td>
                    </tr>
                </tbody>
            </table>
            
            <h3>Detalle de Notas Ingresadas:</h3>
            <p>
                <?php foreach ($resultado['notas'] as $index => $nota): ?>
                    Nota <?php echo ($index + 1); ?>: <strong><?php echo number_format($nota, 2); ?></strong>
                    <?php echo ($index < count($resultado['notas']) - 1) ? ' | ' : ''; ?>
                <?php endforeach; ?>
            </p>
        </div>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
