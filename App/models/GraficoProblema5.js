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
                display: false,
                labels: {
                    color: '#e8eaf0'
                }
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
                titleFont: {
                    size: 14
                },
                bodyFont: {
                    size: 13
                },
                padding: 12,
                cornerRadius: 10,
                borderColor: '#252a38',
                borderWidth: 1
            }
        },

        scales: {
            x: {
                grid: {
                    display: false,
                    color: 'rgba(255,255,255,0.08)'
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