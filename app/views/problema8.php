<!DOCTYPE html>
<html>
<head>
    <title>Problema 8 - Estación del Año</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema8.css">
</head>
<body>
    <div class="page-wrap">
    <h1>Problema 8</h1>
    <h2>Determinar la Estación del Año</h2>

    <form method="POST">
        <label for="fecha">Ingresa una fecha (YYYY-MM-DD):</label>
        <input type="date" id="fecha" name="fecha" required>
        <button type="submit">Determinar Estación</button>
    </form>

    <?php if ($error): ?>
        <p class="error">⚠️ <?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <div class="resultado-estacion">
            <h3>Resultado:</h3>

            <div class="estacion-box">
                <p><strong>Fecha ingresada:</strong> <?php echo $resultado['fecha']; ?></p>
                <p><strong>Mes:</strong> <?php echo $resultado['mes_nombre']; ?></p>

                <div class="estacion-display">

                    <div class="estacion-imagen">
                        <?php
                        $estacionLower = strtolower($resultado['estacion']);
                        $rutaImagen = "App/assets/{$estacionLower}.jpg";
                        ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="<?php echo $resultado['estacion']; ?>" />
                    </div>

                    <div class="estacion-nombre <?php echo $estacionLower; ?>">
                        <?php echo $resultado['estacion']; ?>
                    </div>

                    <div class="estacion-info">
                        <h4>Información de la Estación:</h4>
                        <?php
                        $info = [
                            'Primavera' => ['21 de marzo - 20 de junio',      'Período de florecimiento y renovación', '🌸'],
                            'Verano'    => ['21 de junio - 20 de septiembre',  'Estación más cálida del año',           '☀️'],
                            'Otoño'     => ['21 de septiembre - 20 de diciembre', 'Caída de hojas y cambios de color',  '🍂'],
                            'Invierno'  => ['21 de diciembre - 20 de marzo',   'Estación más fría del año',             '❄️'],
                        ];
                        ?>
                        <table>
                            <tr>
                                <th>Período</th>
                                <td><?php echo $info[$resultado['estacion']][0]; ?></td>
                            </tr>
                            <tr>
                                <th>Descripción</th>
                                <td><?php echo $info[$resultado['estacion']][1]; ?></td>
                            </tr>
                            <tr>
                                <th>Símbolo</th>
                                <td><?php echo $info[$resultado['estacion']][2]; ?></td>
                            </tr>
                        </table>
                    </div>

                </div><!-- /.estacion-display -->
            </div><!-- /.estacion-box -->
        </div><!-- /.resultado-estacion -->
    <?php endif; ?>

    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
    </div>
</body>
</html>