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
    <!-- Gráfico de Distribución -->
    <div class="grafico-container">
        <h3>Gráfico de Distribución por Categoría</h3>
        <canvas id="graficoEdades"></canvas>
    </div>

    <script>
    const datos = <?php echo json_encode($resultado); ?>;

    const categorias = Object.keys(datos);
    const cantidades = categorias.map(cat => datos[cat].length);

    const ctx = document.getElementById('graficoEdades').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categorias,
            datasets: [{
                label: 'Personas',
                data: cantidades,
                borderRadius: 12,
                borderSkipped: false,
                backgroundColor: [
                    'rgba(255,107,107,0.8)',
                    'rgba(78,205,196,0.8)',
                    'rgba(69,183,209,0.8)',
                    'rgba(255,160,122,0.8)',
                    'rgba(152,216,200,0.8)',
                    'rgba(247,220,111,0.8)'
                ],
                borderColor: [
                    '#FF6B6B',
                    '#4ECDC4',
                    '#45B7D1',
                    '#FFA07A',
                    '#98D8C8',
                    '#F7DC6F'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Distribución de Personas por Categoría',
                    color: '#e8eaf0',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                },
                tooltip: {
                    backgroundColor: '#1e1e2f',
                    titleColor: '#e8eaf0',
                    bodyColor: '#e8eaf0',
                    padding: 12,
                    cornerRadius: 10,
                    borderColor: '#252a38',
                    borderWidth: 1
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#e8eaf0',
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    max: 5,
                    ticks: {
                        stepSize: 1,
                        color: '#e8eaf0'
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.08)'
                    }
                }
            },

            animation: {
                duration: 1200,
                easing: 'easeOutQuart'
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