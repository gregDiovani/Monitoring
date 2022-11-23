

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
        <div class="row">

            <div class="col-lg-6">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID-Kamar</th>
                        <th>Nominal</th>
                        <th>Receipt</th>
                        <th>kWh</th>
                        <th>Tgl-transaksi</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID-Kamar</th>
                        <th>Nominal</th>
                        <th>Receipt</th>
                        <th>kWh</th>
                        <th>Tgl-transaksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ( $model['data']['data-transaksi'] as $data) {
                        echo '<tr>';
                        echo '<td> ' . $data['id_kamar'] . ' </td>';
                        echo '<td>' . $data['amount_rp'] . '</td>';
                        echo '<td>' . $data['receipt_id'] . '</td>';
                        echo '<td>' . round($data['amount_rp']/1500, 1) . ' kWh</td>';
                        echo '<td>' . date("d-m-Y H:i:s", strtotime($data['time'])) . ' </td>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>

                <script>
                    $(document).ready(function() {
                        $('#tabel-data').DataTable();
                    });
                </script>
            </div>

            <div class="col-lg-6">

                <div class="card spur-card">
                    <div class="card-header">
                        <div class="spur-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="spur-card-title"> Total Transaksi ( Month) </div>
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

                            const xValues1 = [<?php foreach ($model['data']['chart']  as $row) { echo '"' . date("M", strtotime($row['time'])) . '",'; } ?> ];

                            var ctx = document.getElementById("spurChartjsBar").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: xValues1,
                                    datasets: [
                                        {
                                            label: 'Pendapatan',
                                            data: [<?php foreach ($model['data']['chart']  as $row) { echo '"' . $row["totalRp"] . '",'; } ?>],
                                            backgroundColor: window.chartColors.primary,
                                            borderColor: 'transparent'
                                        },

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

        </div>



    </div>


</main>
</div></body>