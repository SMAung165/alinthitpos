<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    if ($sessionUserRole !== 'Admin') {
        header("location:page-login.php");
    } else {
        require_once('core/functions/addSalaryFun.php');
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
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />

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
                                        <a href="index.php" style="display: inline;">Dashboard</a>
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
                                                    <th><span class="salaryId">Salary ID</span></th>
                                                    <th><span class='employeeName'>Employee Name</span></th>
                                                    <th><span class='position'>Position</span></th>
                                                    <th><span class='month'>Month</span></th>
                                                    <th><span class='paymentDate'>Payment Date</span></th>
                                                    <th><span class='basic-salary'>Basic Salary</span></th>
                                                    <th><span class='bonus'>Bonus</span></th>
                                                    <th><span class='totalSalary'>Total Salary</span></th>
                                                    <th style="text-align:center;"><span class='salaryStatus'>Salary Status</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $listSalaries(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><span class="salaryId">Salary ID</span></th>
                                                    <th><span class='employeeName'>Employee Name</span></th>
                                                    <th><span class='position'>Position</span></th>
                                                    <th><span class='month'>Month</span></th>
                                                    <th><span class='paymentDate'>Payment Date</span></th>
                                                    <th><span class='basic-salary'>Basic Salary</span></th>
                                                    <th><span class='bonus'>Bonus</span></th>
                                                    <th><span class='totalSalary'>Total Salary</span></th>
                                                    <th style="text-align:center;"><span class='salaryStatus'>Salary Status</span></th>
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
    <script src=" assets/js/lib/jquery.min.js">
    </script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/language/employeeList.js"></script>
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
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>