<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
        let chart = {
            1: 'bar',
            2: 'doughnut',
            3: 'line',
        }
        let title = document.getElementById("title");
        let labels = [];
        let displayLegend;
        if (<?= $subject[0]['chart']; ?> == '1') {
            displayLegend = false;
        } else {
            displayLegend = true;
        }

        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: chart[<?= $subject[0]['chart']; ?>],
            data: {
                labels: <?php echo json_encode($xValues); ?>,
                datasets: [{
                    data: <?php echo json_encode($yValues); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    position: 'top',
                    display : displayLegend,
                },
                title: {
                    display: true,
                }
            }
        });
    </script>