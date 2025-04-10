<!-- app/Views/admin/dashboard.php -->
<?= $this->extend('layout/admin/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800 mt-4">Halo Selamat Datang, <?php if (!empty($admins)): ?>
            <?= esc($admins[0]['nama_user']) ?>
        <?php else: ?>
            <p>Tidak ada data admin</p>
        <?php endif; ?>
    </h2>

    <!-- Cards Summary -->
    <div class="row">
        <!-- Total Siswa Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa Pendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSiswa ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Siswa Laki-laki Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Siswa Laki-laki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswaLaki ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Siswa Perempuan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Siswa Perempuan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswaPerempuan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Diterima Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Siswa Diterima</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $statusPPDB['verified'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <!-- Pie Chart - Jalur Masuk -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Jalur Masuk</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="pieJalurMasuk"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <?php foreach ($jalurOptions as $key => $value): ?>
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: <?= getChartColor($key) ?>"></i> <?= $value ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart - Pendaftaran per Tahun -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pendaftaran per Tahun</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="barTahunPendaftaran"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pie Chart - Status PPDB -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status PPDB</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="pieStatusPPDB"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Pending
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Verified
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Rejected
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Doughnut Chart - Gender Distribution -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Gender</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="doughnutGender"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Laki-laki
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Perempuan
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Helper function untuk warna chart -->
<?php
function getChartColor($index)
{
    $colors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#5a5c69', '#6f42c1', '#20c9a6'];
    return $colors[$index % count($colors)];
}
?>

<!-- ChartJS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Jalur Masuk
        var ctxJalurMasuk = document.getElementById('pieJalurMasuk').getContext('2d');
        var pieJalurMasuk = new Chart(ctxJalurMasuk, {
            type: 'pie',
            data: {
                labels: <?= $labelsJalur ?>,
                datasets: [{
                    data: <?= $dataJalur ?>,
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b',
                        '#5a5c69'
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 0,
            },
        });

        // Chart Pendaftaran per Tahun
        var ctxTahun = document.getElementById('barTahunPendaftaran').getContext('2d');
        var barTahun = new Chart(ctxTahun, {
            type: 'bar',
            data: {
                labels: <?= $labelsTahun ?>,
                datasets: [{
                    label: "Jumlah Pendaftar",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: <?= $dataTahun ?>,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
            }
        });

        // Chart Status PPDB
        var ctxStatusPPDB = document.getElementById('pieStatusPPDB').getContext('2d');
        var pieStatusPPDB = new Chart(ctxStatusPPDB, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Verified', 'Rejected'],
                datasets: [{
                    data: [
                        <?= $statusPPDB['pending'] ?>,
                        <?= $statusPPDB['verified'] ?>,
                        <?= $statusPPDB['rejected'] ?>
                    ],
                    backgroundColor: ['#f6c23e', '#1cc88a', '#e74a3b'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
            },
        });

        // Chart Gender Distribution
        var ctxGender = document.getElementById('doughnutGender').getContext('2d');
        var doughnutGender = new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [<?= $siswaLaki ?>, <?= $siswaPerempuan ?>],
                    backgroundColor: ['#4e73df', '#e74a3b'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 50,
            },
        });
    });
</script>
<?= $this->endSection() ?>