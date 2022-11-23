<body>
<div class="dash">


    <?php require __DIR__ . '/../Partial/rightsidebar.php' ?>


    <div class="dash-app">
        <header class="dash-toolbar">
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="#!" class="searchbox-toggle">
                <i class="fas fa-search"></i>
            </a>

            <div class="tools">
                <!-- <a href="https://github.com/HackerThemes/spur-template" target="_blank" class="tools-item">
                   <i class="fab fa-github"></i>
               </a>
               <a href="#!" class="tools-item">
                   <i class="fas fa-bell"></i>
                   <i class="tools-item-count">4</i>
               </a> -->
                <div class="dropdown tools-item">
                    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#!">Profile</a>
                        <a class="dropdown-item" href="../routes.php">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="dash-content">
            <div class="container-fluid">
                <div class="row dash-row">
                    <div class="col-xl-4">
                        <div class="stats stats-primary">
                            <h3 class="stats-title"> Pendapatan ( Total )</h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-money-bill
"></i>
                                </div>
                                <div class="stats-data">
                                    <div class="stats-number">

                                    <?= $model['data']['pendapatan'] ?>
                                    </div>
                                    <div class="stats-change">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="stats stats-success ">
                            <h3 class="stats-title"> Total Pengisian
                            </h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </div>
                                <div class="stats-data">
                                    <div class="stats-number">
                                        <?= $model['data']['jumlahPengsian'] ?>

                                    </div>
                                    <div class="stats-change">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="stats stats-danger">
                            <h3 class="stats-title"> Kamar Aktif </h3>
                            <div class="stats-content">
                                <div class="stats-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="stats-data">
                                    <div class="stats-number">

                                        <?= $model['data']['jumlahkamar'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="spur-card-title"> Konsumsi Pemakaian ( kWh) </div>
                                <div class="spur-card-menu">
                                    <div class="dropdown show">
                                        <a class="spur-card-menu-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body spur-card-body-chart">
                                <canvas id="spurChartjsBar"></canvas>
                                <script>

                                    const xValues1 = [<?php foreach ($model['data']['chart'] as $row) { echo '"' . $row["date_format(tgl, '%M')"] . '",';} ?> ];

                                    var ctx = document.getElementById("spurChartjsBar").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: xValues1,
                                            datasets: [
                                                {
                                                    label: 'K1',
                                                    data: [<?php foreach ($model['data']['chart'] as $row) { echo '"' . $row["totalPakai"] . '",'; } ?>],
                                                    backgroundColor: window.chartColors.primary,
                                                    borderColor: 'transparent'
                                                }

                                            ]
                                        },
                                        options: {
                                            legend: {
                                                display: false
                                            },
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card spur-card">
                            <div class="card-header">
                                <div class="spur-card-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="spur-card-title"> Transaksi Baru </div>
                            </div>
                            <div class="card-body ">
                                <div class="notifications">

                                    <?php
                                    foreach ($model['data']['notifikasi'] as $row) {
                                        echo '<a href="#!" class="notification">
                                              <div class="notification-icon">
                                              <i class="fas fa-inbox"></i>';
                                        echo '</div><div class="notification-text">Rp' .$row["amount_rp"]. '';
                                        echo '</div>';
                                        echo '<span class="notification-time">' . $row["time"] . '</span>';
                                        echo '</a>';

                                    }

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="/js/spur.js"></script>
</body>
