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

    <title>Device List</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel='icon' href='assets/images/favicon.png' type="image/png">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="myDataTable-export" class="table table-striped table-bordered" style="text-align:center;width:100%;">
                                            <thead>
                                                <tr>
                                                    <th><span class="deviceId"></span></th>
                                                    <th><span class='deviceName'></span></th>
                                                    <th><span class='deviceModel'></span></th>
                                                    <th><span class='deviceBrand'></span></th>
                                                    <th><span class='colorVariant'></span></th>
                                                    <th><span class='expensePerOne'></span></th>
                                                    <th><span class='pricePerOne'></span></th>
                                                    <th><span class='initialStock'></span></th>
                                                    <th><span class='totalSold'></span></th>
                                                    <th><span class='stockLeft'></span></th>
                                                    <th><span class='profit'></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $listDevices('list') ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><span class="deviceId"></span></th>
                                                    <th><span class='deviceName'></span></th>
                                                    <th><span class='deviceModel'></span></th>
                                                    <th><span class='deviceBrand'></span></th>
                                                    <th><span class='colorVariant'></span></th>
                                                    <th><span class='expensePerOne'></span></th>
                                                    <th><span class='pricePerOne'></span></th>
                                                    <th><span class='initialStock'></span></th>
                                                    <th><span class='totalSold'></span></th>
                                                    <th><span class='stockLeft'></span></th>
                                                    <th><span class='profit'></span></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
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

    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- scripit init-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <!-- <script src="assets/js/lib/data-table/datatables-init.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable-export').DataTable({
                responsive: true,
                dom: "lBfrtip",
                responsive: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"],
                ],
                buttons: ["copy", "csv", "excel", "pdf", "print"],
            });
        });
    </script>
    <script src="assets/language/deviceList.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>