<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel='icon' href='assets/images/favicon.png' type="image/png">

    <!-- styles -->

    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        .currency,
        .countSign,
        #toEarn {

            font-size: 1rem;

        }

        .dash-item {
            cursor: pointer;
            transition: all 0.2s;
        }

        .dash-item:hover {
            transform: scale(1.05);
        }

        .dash-item:active {
            transform: scale(0.9);
        }
    </style>

</head>

<body>

    <?php require_once('widgets/sideBar.php'); ?>
    <!-- /# sidebar -->

    <?php require_once('widgets/header.php'); ?>


    <script src="assets/js/themeSwitcherFun.js"></script>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span><?php echo "{$sessionUserFirstName} {$sessionUserLastName}"; ?></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="<?php echo $_SERVER['PHP_SELF'] ?>"></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="totalProfit">Total Profit</span></div>
                                        <div class="stat-digit"><?php $totalProfitCalc(false) ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="currentMonthProfit">Current Month Profit</span></div>
                                        <div class="stat-digit"><?php echo number_format($monthCheckProfitCurrentMonth) . " <span class='currency'>MMK</span>"; ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="todayProfit">Today Profit</span></div>
                                        <div class="stat-digit"><?php echo number_format_short($getTodayProfit()) . " <span class='currency'>MMK</span>"; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card dash-item" onclick="window.location='manage-order.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-danger border-danger"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="pendingOrders">Pending Orders</span> ( <?php echo "{$expectToEarn()['count']}"; ?> )</div>
                                        <div class="stat-digit"><span id="toEarn">To Earn</span> <?php echo  number_format($expectToEarn()['total_profit']) . ' <span class="currency">MMK</span>' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card dash-item" onclick="window.location='device-list.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-mobile color-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="currentAssets">Current Assets</span></div>
                                        <div class="stat-digit"><?php $totalDeviceSoldOrCurrentAsset('stock') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card dash-item" onclick="window.location='device-list.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-mobile color-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span id="deviceSold">Device Sold</span></div>
                                        <div class="stat-digit"><?php $totalDeviceSoldOrCurrentAsset('total_sold') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 dash-chart">
                            <div class="card">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 id="monthlyProfit">Monthly Profit</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 dash-chart">
                            <div class="card">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 id='dailyProfit'>Daily Profit</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div style="height:100%" class="year-calendar"></div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                    <!-- /# row -->


                    <?php require_once('widgets/footer.php'); ?>
                </section>
            </div>
        </div>
    </div>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <?php require_once('core/functions/dashboardChartFun.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.onload = () => {
            if (!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
    </script>
    <script src="assets/language/dashboard.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php require_once('core/functions/userOnlineStatusFun.php') ?>

</body>

</html>