<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/delCustomerFun.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Customer List</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

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
    <?php require_once('widgets/darkModeFun.php'); ?>


    <style type="text/css">
        .tblImg {
            cursor: pointer;
        }

        .imageBox {

            width: 100%;
            height: 100vh;

            position: fixed;
            top: 0%;
            left: 0%;

            display: flex;
            justify-content: center;
            align-items: center;

            opacity: 0;

            z-index: -1;

            background: rgba(0, 0, 0, 0.5);

            transition: all 0.2s;

        }

        .imageBox .imgContainer {

            width: 250px;

            padding: 9px;

            background-color: #ffff;

            border-radius: 10px;

            position: absolute;

            z-index: 1;

            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);

        }

        .imageBox .imgContainer img {
            width: 100%;
            height: 100%;
        }

        .showImgBox {
            opacity: 1;
            z-index: 2;
        }
    </style>

</head>

<body>
    <?php require_once('widgets/darkModeSwitch.php'); ?>
    <?php require_once('widgets/sideBar.php'); ?>
    <!-- /# sidebar -->

    <?php require_once('widgets/header.php'); ?>


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
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="<?php echo $_SERVER['PHP_SELF'] ?>"></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <?php require_once('widgets/errorInterface.php'); ?>
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='customerList'></h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="myDataTable" class="display table table-borderd table-hover" style="text-align:center;width:100%;padding-bottom:10px;">
                                            <thead>
                                                <tr>
                                                    <th><span class="customer"></span> ID</th>
                                                    <th><span class='firstname'></span></th>
                                                    <th><span class='lastname'></span></th>
                                                    <th><span class='email'></span></th>
                                                    <th><span class='address'></span></th>
                                                    <th><span class="phoneNumber"></span></th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $listCustomers() ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><span class="customer"></span> ID</th>
                                                    <th><span class='firstname'></span></th>
                                                    <th><span class='lastname'></span></th>
                                                    <th><span class='email'></span></th>
                                                    <th><span class='address'></span></th>
                                                    <th><span class="phoneNumber"></span></th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require_once('widgets/footer.php'); ?>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src=" assets/js/lib/jquery.min.js">
    </script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/language/customerList.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- scripit init-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                responsive: true,
            });
        });


        document.querySelectorAll('.tblImg').forEach(tblImgEl => {

            tblImgEl.addEventListener('click', (e) => {
                var imgBoxEl = e.target.parentElement.children[0];
                imgBoxEl.classList.add('showImgBox');
                imgBoxEl.addEventListener('click', (e) => {
                    e.target.classList.remove('showImgBox');
                })
            })

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>