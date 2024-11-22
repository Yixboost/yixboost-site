<?php
// CPU-gebruik ophalen
function getCpuUsage() {
    $load = sys_getloadavg();
    return $load[0]; // CPU load laatste minuut
}

// Geheugengebruik ophalen
function getMemoryUsage() {
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2] / $mem[1] * 100;
    return round($memory_usage, 2);
}

// Schijfgebruik ophalen
function getDiskUsage() {
    $df = shell_exec('df -h /');
    $df = preg_split("/\s+/", trim(explode("\n", $df)[1]));
    return $df[4]; // Percentage schijfgebruik
}

// Netwerkgebruik ophalen
function getNetworkUsage() {
    $rx = shell_exec('cat /sys/class/net/eth0/statistics/rx_bytes');
    $tx = shell_exec('cat /sys/class/net/eth0/statistics/tx_bytes');
    return [
        'rx' => round($rx / 1024 / 1024, 2), // Omrekenen naar MB
        'tx' => round($tx / 1024 / 1024, 2)  // Omrekenen naar MB
    ];
}

// Systeemuptime ophalen
function getUptime() {
    $uptime = shell_exec('uptime -p');
    return trim($uptime);
}

// Systeemversie ophalen
function getSystemInfo() {
    $php_version = phpversion();
    $os_info = php_uname();
    return [
        'php_version' => $php_version,
        'os_info' => $os_info
    ];
}

// JSON-output voor frontend
if (isset($_GET['data'])) {
    $cpu = getCpuUsage();
    $memory = getMemoryUsage();
    $disk = getDiskUsage();
    $network = getNetworkUsage();
    $uptime = getUptime();
    $system_info = getSystemInfo();
    
    echo json_encode([
        'cpu' => $cpu,
        'memory' => $memory,
        'disk' => $disk,
        'network' => $network,
        'uptime' => $uptime,
        'system_info' => $system_info
    ]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #212529; /* Donkere modus achtergrond */
            color: #f8f9fa; /* Tekstkleur in donkere modus */
        }
        .container {
            margin-top: 30px;
        }
        .card {
            background-color: #343a40;
            border-radius: 23px;
            padding: 15px;
            margin-bottom: 20px;
            height: 300px; /* Vaste hoogte voor kaarten */
        }
        canvas {
            border-radius: 23px;
            height: 100%; /* Vul de hoogte van de kaart */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5rem;
        }
        .card-header {
            background-color: #495057;
            border-bottom: none;
            color: #f8f9fa;
        }
        .card-body {
            padding: 0;
            height: 100%; /* Vul de hoogte van de kaart */
        }
        .chart-container {
            height: 100%; /* Vul de hoogte van de kaart */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row g-3">
            <!-- CPU gebruik -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>CPU Usage</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="cpuChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geheugengebruik -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Memory Usage</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="memoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schijfgebruik -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Disk Usage</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="diskChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Netwerkgebruik -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Network Usage</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="networkChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Online Users -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Online Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Systeemversie -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>System Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <p id="systemInfo">Fetching system info...</p>
                            <p id="uptime">Fetching uptime...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const cpuCtx = document.getElementById('cpuChart').getContext('2d');
        const memoryCtx = document.getElementById('memoryChart').getContext('2d');
        const diskCtx = document.getElementById('diskChart').getContext('2d');
        const networkCtx = document.getElementById('networkChart').getContext('2d');

        // CPU Chart
        const cpuChart = new Chart(cpuCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'CPU Load (last minute)',
                    data: [],
                    backgroundColor: 'rgba(75, 192, 192, 0.3)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Memory Chart
        const memoryChart = new Chart(memoryCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Memory Usage (%)',
                    data: [],
                    backgroundColor: 'rgba(153, 102, 255, 0.3)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Disk Chart
        const diskChart = new Chart(diskCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Disk Usage (%)',
                    data: [],
                    backgroundColor: 'rgba(255, 159, 64, 0.3)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Network Chart
        const networkChart = new Chart(networkCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Received Data (MB)',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.3)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }, {
                    label: 'Transmitted Data (MB)',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.3)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 10
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Functie om gegevens op te halen
        function fetchData() {
            fetch('?data=1')
                .then(response => response.json())
                .then(data => {
                    const currentTime = new Date().toLocaleTimeString();

                    // CPU-update
                    cpuChart.data.labels.push(currentTime);
                    cpuChart.data.datasets[0].data.push(data.cpu);
                    if (cpuChart.data.labels.length > 20) {
                        cpuChart.data.labels.shift();
                        cpuChart.data.datasets[0].data.shift();
                    }
                    cpuChart.update();

                    // Memory-update
                    memoryChart.data.labels.push(currentTime);
                    memoryChart.data.datasets[0].data.push(data.memory);
                    if (memoryChart.data.labels.length > 20) {
                        memoryChart.data.labels.shift();
                        memoryChart.data.datasets[0].data.shift();
                    }
                    memoryChart.update();

                    // Disk-update
                    diskChart.data.labels.push(currentTime);
                    diskChart.data.datasets[0].data.push(data.disk.replace('%', ''));
                    if (diskChart.data.labels.length > 20) {
                        diskChart.data.labels.shift();
                        diskChart.data.datasets[0].data.shift();
                    }
                    diskChart.update();

                    // Network-update
                    networkChart.data.labels.push(currentTime);
                    networkChart.data.datasets[0].data.push(data.network.rx);
                    networkChart.data.datasets[1].data.push(data.network.tx);
                    if (networkChart.data.labels.length > 20) {
                        networkChart.data.labels.shift();
                        networkChart.data.datasets[0].data.shift();
                        networkChart.data.datasets[1].data.shift();
                    }
                    networkChart.update();

                    // Systeemversie en uptime
                    document.getElementById('systemInfo').textContent = `PHP Version: ${data.system_info.php_version}, OS: ${data.system_info.os_info}`;
                    document.getElementById('uptime').textContent = `Uptime: ${data.uptime}`;
                });
        }

        // Ververs data elke 2 seconden
        setInterval(fetchData, 2000);
    </script>
</body>
</html>
