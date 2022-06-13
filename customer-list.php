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


    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/lib/data-table-responsive/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="assets/css/lib/data-table-responsive/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="assets/css/lib/data-table-responsive/rowGroup.dataTables.min.css" rel="stylesheet" />


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
    <?php require_once('widgets/sideBar.php'); ?>
    <!-- /# sidebar -->

    <?php require_once('widgets/header.php'); ?>


    <script src="assets/js/themeSwitcherFun.js"></script>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span><?php echo "{$sessionUserFirstName} {$sessionUserLastName}"; ?></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Customer and Order</a>
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
                                    <h4 class='customer-list'></h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="myDataTable" class="display table table-borderd table-hover" style="text-align:center;width:100%;padding-bottom:10px;">
                                            <thead>
                                                <tr>
                                                    <th><span class="customer-id"></span></th>
                                                    <th><span class='firstname'></span></th>
                                                    <th><span class='lastname'></span></th>
                                                    <th><span class='email'></span></th>
                                                    <th><span class='address'></span></th>
                                                    <th><span class="phone-number"></span></th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $listCustomers() ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><span class="customer-id"></span></th>
                                                    <th><span class='firstname'></span></th>
                                                    <th><span class='lastname'></span></th>
                                                    <th><span class='email'></span></th>
                                                    <th><span class='address'></span></th>
                                                    <th><span class="phone-number"></span></th>
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
    <script src=" assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
    <script type="text/javascript" src="assets/language/sidebar.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- scripit init-->
    <script src="assets/js/scripts.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- datatables -->
    <script type="text/javascript" src="assets/js/lib/data-table-responsive/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/lib/data-table-responsive/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="assets/js/lib/data-table-responsive/dataTables.rowGroup.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <!-- Extra Script -->
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

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>


</body>

</html>