<!DOCTYPE html>
<html>
<head>
    <title>Problema 5 - Clasificación de Personas</title>
    <style>
        .error { color: red; font-weight: bold; }
        .success { color: green; font-weight: bold; }
        .info { color: blue; }
        .categoria { margin: 10px 0; padding: 10px; border: 1px solid #ddd; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Problema 5: Clasificación de Personas por Edad</h2>
    
    <p class="info"><strong>Personas registradas: <?php echo $cantidadPersonas; ?>/5</strong></p>
    
    <form method="POST">
        Edad de la persona (0-120): <input type="number" name="edad" min="0" max="120">
        <button type="submit" name="accion" value="agregar">Agregar Persona</button>
        <button type="submit" name="accion" value="clasificar">Clasificar Personas</button>
        <button type="submit" name="accion" value="limpiar">Limpiar Datos</button>
    </form>

    <?php if ($error): ?>
        <p class="error">⚠️ <?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <?php if (is_array($resultado)): ?>
            <h3>Personas Clasificadas:</h3>
            <table>
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Edades</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $categoria => $edades): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($categoria); ?></strong></td>
                            <td><?php echo count($edades); ?></td>
                            <td><?php echo implode(', ', $edades); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="success">✅ <?php echo htmlspecialchars($resultado); ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
