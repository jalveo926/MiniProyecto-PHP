<!DOCTYPE html>
<html>
<head>
    <title>Problema 5 - Clasificación de Personas</title>
    <link rel="stylesheet" href="app/styles/global.css">
    <link rel="stylesheet" href="app/styles/problema5.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            <!-- Gráfico de Distribución -->
            <div style="margin-top: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
                <h3>Gráfico de Distribución por Categoría</h3>
                <canvas id="graficoEdades"></canvas>
            </div>

            <script>
                const datos = <?php echo json_encode($resultado); ?>;
                const categorias = Object.keys(datos);
                const cantidades = categorias.map(cat => datos[cat].length);
                
                const ctx = document.getElementById('graficoEdades').getContext('2d');
                const grafico = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: categorias,
                        datasets: [{
                            label: 'Cantidad de Personas',
                            data: cantidades,
                            backgroundColor: [
                                '#FF6B6B',
                                '#4ECDC4',
                                '#45B7D1',
                                '#FFA07A',
                                '#98D8C8',
                                '#F7DC6F'
                            ],
                            borderColor: [
                                '#C92A2A',
                                '#0A9396',
                                '#005377',
                                '#E55039',
                                '#117A65',
                                '#D68910'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 5,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            </script>
        <?php else: ?>
            <p class="success">✅ <?php echo htmlspecialchars($resultado); ?></p>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php echo \App\Utils\Navigation::backToMenu('index.php'); ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
