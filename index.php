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
    <!-- manifest -->
    <link rel="manifest" href="assets/JSON/manifest.json">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel='icon' href='assets/images/favicon.png' type="image/png">

    <!-- Language -->

    <script type="text/javascript" src="assets/language/lang/en.js"></script>
    <script type="text/javascript" src="assets/language/lang/mm.js"></script>

    <!-- script -->

    <script src="assets/js/themeSetterFun.js"></script>

    <!-- styles -->

    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        #toEarn,
        .currency,
        .countSign {
            font-size: 1rem;
        }

        /* 
        .custom-container {
            display: flex;
            justify-content: center;
            align-items: center;

            flex-wrap: wrap;
        } */

        .dash-item {
            cursor: pointer;
            transition: all 0.2s;
        }

        .stat-text,
        .stat-digit {
            font-size: 1rem !important;
        }

        .dash-item:hover {
            transform: scale(1.05);
        }

        .dash-item:active {
            transform: scale(0.9);
        }

        .dash-chart .card {
            background: transparent !important;
            border: none;
            box-shadow: none;
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
                                    <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="<?php echo $_SERVER['PHP_SELF'] ?>"></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row custom-container">
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="all-time-profit">All Time Profit</span></div>
                                        <div class="stat-digit"><?php $totalProfitCalc(false) ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="current-month-profit">Current Month Profit</span></div>
                                        <div class="stat-digit"><?php echo number_format($monthCheckProfitCurrentMonth) . " <span class='currency'>MMK</span>"; ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">
                                        <i class="ti-stats-up color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="today-profit">Today Profit</span></div>
                                        <div class="stat-digit"><?php echo number_format_short($getTodayProfit()) . " <span class='currency'>MMK</span>"; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item" onclick="window.location='manage-order.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-danger border-danger"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="pending-orders">Pending Orders</span> ( <?php echo "{$expectToEarn()['count']}"; ?> )</div>
                                        <div class="stat-digit"><span class="to-earn">To Earn</span> <?php echo  number_format($expectToEarn()['total_profit']) . ' <span class="currency">MMK</span>' ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item" onclick="window.location='device-list.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-mobile color-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="current-assets">Current Assets</span></div>
                                        <div class="stat-digit"><?php $totalDeviceSoldOrCurrentAsset('stock') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="card dash-item" onclick="window.location='device-list.php'">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-mobile color-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text"><span class="device-sold">Device Sold</span></div>
                                        <div class="stat-digit"><?php $totalDeviceSoldOrCurrentAsset('total_sold') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="card" style="background-color:transparent !important; border:none;box-shadow:none;">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 class='best-seller'>Best Sellers</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-7 col-md-6">
                            <div class="card" style="background-color:transparent !important; border:none;box-shadow:none;">
                                <div class="card-body">
                                    <div class="year-calendar">
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>

                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12 dash-chart">
                            <div class="card">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 class="monthly-profit">Monthly Profit</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-6 dash-chart">
                            <div class="card">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 class='daily-profit'>Daily Profit</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-6 dash-chart">
                            <div class="card">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4 class='most-daily-earn'>Most Daily Earnings</h4>
                                    </div>
                                </div>
                                <div class="panel-body refresh">

                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>

                    <?php require_once('widgets/footer.php'); ?>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>

    <!-- nano scroller -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>

    <!-- sidebar -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Libraries -->
    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <?php require_once('core/functions/dashboardChartFun.php') ?>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- Script init -->
    <script src="assets/js/scripts.js"></script>

    <!-- Extra script -->
    <script type="text/javascript">
        showChart();
        showChartFun();

        document.querySelectorAll(".change-language").forEach((element) => {
            element.addEventListener("click", () => {
                window.setTimeout(showChart, 0);
                window.setTimeout(showChartFun, 0);
            });
        });
    </script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>

</body>

</html>