<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    if ($sessionUserRole !== 'Admin') {
        header("location:page-login.php");
    } else {
        require_once('core/functions/addSalaryFun.php');
        require_once('core/functions/delSalaryFun.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Salary</title>
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

    <style type='text/css'>
        .add-salary-form {

            width: 100%;
            height: 100vh;

            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;

            display: none;
            justify-content: center;
            align-items: center;

            background: rgba(0, 0, 0, 0.5);

        }

        .add-salary-form .card {
            width: 350px;
        }

        .form-container {

            width: 100%;
            height: 100vh;

            position: fixed;
            top: 0;
            left: 0;

            background: rgba(0, 0, 0, 0.5);

            display: none;
            justify-content: center;
            align-items: center;

            z-index: 1;
        }

        .delete-salary-confirm-box {


            padding: 10px 20px 20px 20px;

            text-align: center;
        }

        .delete-salary-confirm-box .close-btn {
            width: 100%;

            display: flex;
            justify-content: flex-end;

            cursor: pointer;
        }
    </style>

</head>

<body>

    <?php require_once('widgets/sideBar.php'); ?>
    <!-- /# sidebar -->
    <?php require_once('widgets/header.php'); ?>

    <script src="assets/js/themeSwitcherFun.js"></script>

    <?php require_once('widgets/addSalaryForm.php'); ?>

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
                                        <a href="#" style="display: inline;">Employee and Salary</a>
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
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <h4 class="salary-list">Salary List</h4>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href='#' class="add-salary">
                                                <i class="ti-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="myDataTable" class="display table table-borderd table-hover" style="width: 100%;text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th><span class="salary-id">Salary ID</span></th>
                                                    <th><span class='employee-name'>Employee Name</span></th>
                                                    <th><span class='position'>Position</span></th>
                                                    <th><span class='salary-month'>Month</span></th>
                                                    <th><span class='payment-date'>Payment Date</span></th>
                                                    <th><span class='basic-salary'>Basic Salary</span></th>
                                                    <th><span class='salary-bonus'>Bonus</span></th>
                                                    <th><span class='total-salary'>Total Salary</span></th>
                                                    <th style="text-align:center;"><span class='salary-status'>Salary Status</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $listSalaries(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Action</th>
                                                    <th><span class="salary-id">Salary ID</span></th>
                                                    <th><span class='employee-name'>Employee Name</span></th>
                                                    <th><span class='position'>Position</span></th>
                                                    <th><span class='salary-month'>Month</span></th>
                                                    <th><span class='payment-date'>Payment Date</span></th>
                                                    <th><span class='basic-salary'>Basic Salary</span></th>
                                                    <th><span class='bonus'>Bonus</span></th>
                                                    <th><span class='total-salary'>Total Salary</span></th>
                                                    <th style="text-align:center;"><span class='salary-status'>Salary Status</span></th>
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

    <?php require_once('widgets/errorInterface.php') ?>

    <!-- jquery vendor -->
    <script src=" assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
    <script type="text/javascript" src="assets/language/sidebar.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- scripit init-->
    <script src="assets/js/scripts.js"></script>

    <!-- datatables-->
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
            var option = document.querySelector('#select-salary-month');

            function liveQuery() {
                var id = $('#employee-id').val();

                $.post(
                    'core/functions/liveQueryFun.php', {
                        'employee_id': id,
                    },
                    (data) => {
                        option.innerHTML = data;
                    }
                );
            }
            document.querySelector('#employee-id').addEventListener('keydown', (e) => {
                if (e.keyCode == 8) {
                    if (option.childElementCount < 1) {
                        option.innerHTML = '<option><?php echo (date('F - Y')) ?></option>';
                    }
                }
            })

            $('#employee-id').on('input', () => {
                liveQuery();
            })


            document.querySelector('.add-salary').addEventListener('click', () => {

                document.querySelector('.add-salary-form').style.display = "flex";

            })

            document.querySelector('.form-close').addEventListener('click', (e) => {

                document.querySelector('.add-salary-form').style.display = "none";

            })

            suggestionBox('#employee-id', '#employee-input', liveQuery);
        });


        document.querySelectorAll('.delete-salary-btn').forEach(element => {
            element.addEventListener('click', (e) => {
                if (e.target.children.length == 2) {
                    e.target.parentElement.children[1].style.display = 'flex';
                } else {
                    e.target.parentElement.parentElement.children[1].style.display = 'flex';
                }
            });
        })
        document.querySelectorAll('.close-btn').forEach(element => {
            element.children[0].addEventListener('click', (e) => {
                e.target.parentElement.parentElement.parentElement.style.display = 'none';
            })
        })
    </script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>
</body>

</html>