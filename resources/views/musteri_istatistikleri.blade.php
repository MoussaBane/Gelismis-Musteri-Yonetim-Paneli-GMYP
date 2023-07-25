<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- Grafik için Chart.js dahil edilme --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row justify-content-center">
    <div class="jumbotron">
        <h1 align="center" style="font-family: Arial Black; font-size:xx-large">Musteri Istatistikleri</h1>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-6">
        <canvas id="totalCustomersChart" width="400" height="200"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="newCustomersChart" width="400" height="200"></canvas>
    </div>
</div>

<script>
    window.onload = function() {
        var graphicData = {!! $graphicData !!};

        if (graphicData.length > 0) {
            var userNames = graphicData.map(function(user) {
                return user.name;
            });

            var totalCustomers = graphicData.map(function(user) {
                return user.totalCustomers;
            });

            console.log(totalCustomers);

            var newCustomers = graphicData.map(function(user) {
                return user.newCustomers;
            });

            var totalCustomersChart = new Chart(document.getElementById('totalCustomersChart'), {
                type: 'bar',
                data: {
                    labels: userNames,
                    datasets: [{
                        label: 'Total Customers',
                        data: totalCustomers,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Users'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Total Customers'
                            }
                        }
                    }
                }
            });
            console.log(totalCustomersChart);


            var newCustomersChart = new Chart(document.getElementById('newCustomersChart'), {
                type: 'bar',
                data: {
                    labels: userNames,
                    datasets: [{
                        label: 'New Customers',
                        data: newCustomers,
                        backgroundColor: 'rgba(66, 203, 245, 0.5)',
                        borderColor: 'rgba(66, 135, 245, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Users'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'New Customers'
                            }
                        }
                    }
                }
            });
            console.log(newCustomersChart);
        }
    }
</script>
