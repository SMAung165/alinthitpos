<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {

    header("location:page-login.php");
} else {
    if ($sessionUserRole !== 'Admin') {
        header("location:page-login.php");
    } else {
        require_once('core/functions/resetFuns.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control Panel</title>
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
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style type="text/css">
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

        .form-container form {


            padding: 10px 20px 20px 20px;

            text-align: center;
        }

        .form-container form .close-btn {
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

                    <?php require_once('widgets/errorInterface.php') ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='reset-the-system'>Reset The System</h4>
                                </div>
                                <div class="card-toggle-body">
                                    <p class="m-b-15">Tap <code>reset</code> button to reset the system to its original state.</p>
                                    <div class="">
                                        <div class='form-container'>
                                            <form action='<?php echo "{$_SERVER['PHP_SELF']}" ?>' method='post' class='card'>
                                                <span class='close-btn'><i class='ti-close'></i></span>
                                                <input type='hidden' name='user_id' value='<?php echo "{$sessionUserId}" ?>' />
                                                <div class='form-group'>
                                                    <label class='enter-your-password'>Enter Your Password</label>
                                                    <input type='password' value='' name='confirm_password' class='form-control' required />
                                                </div>

                                                <button type='submit' name='confirm_reset_system' class='btn btn-secondary'>
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" name='reset_system_btn' class="btn btn-primary col-lg-12 reset-btn">Reset</button>
                                    </div>

                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='reset-profits'>Reset Profits</h4>

                                </div>
                                <div class="card-toggle-body">
                                    <p class="m-b-15">Tap <code>reset</code> button to reset the profit calculations to <code>Zero</code>.</p>
                                    <div>
                                        <div class='form-container'>
                                            <form action='<?php echo "{$_SERVER['PHP_SELF']}" ?>' method='post' class='card'>
                                                <span class='close-btn'><i class='ti-close'></i></span>
                                                <input type='hidden' name='user_id' value='<?php echo "{$sessionUserId}" ?>' />
                                                <div class='form-group'>
                                                    <label class='enter-your-password'>Enter Your Password</label>
                                                    <input type='password' value='' name='confirm_password' class='form-control' required />
                                                </div>

                                                <button type='submit' name='confirm_reset_profits' class='btn btn-secondary'>
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" name='reset_profit_btn' class="btn btn-primary col-lg-12 reset-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='reset-warehouse-stocks'>Reset Warehouse Stocks</h4>
                                </div>
                                <div class="card-toggle-body">
                                    <p class="m-b-15">Tap <code>reset</code> button to reset the stocks of all devices to <code>Zero</code>.</p>
                                    <div>
                                        <div class='form-container'>
                                            <form action='<?php echo "{$_SERVER['PHP_SELF']}" ?>' method='post' class='card'>
                                                <span class='close-btn'><i class='ti-close'></i></span>
                                                <input type='hidden' name='user_id' value='<?php echo "{$sessionUserId}" ?>' />
                                                <div class='form-group'>
                                                    <label class='enter-your-password'>Enter Your Password</label>
                                                    <input type='password' value='' name='confirm_password' class='form-control' required />
                                                </div>

                                                <button type='submit' name='confirm_reset_stocks' class='btn btn-secondary'>
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" name='reset_stock_btn' class="btn btn-primary col-lg-12 reset-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='reset-orders'>Reset Orders</h4>
                                </div>
                                <div class="card-toggle-body">
                                    <p class="m-b-15">Tap <code>reset</code> button to reset the orders list.</p>
                                    <div>
                                        <div class='form-container'>
                                            <form action='<?php echo "{$_SERVER['PHP_SELF']}" ?>' method='post' class='card'>
                                                <span class='close-btn'><i class='ti-close'></i></span>
                                                <input type='hidden' name='user_id' value='<?php echo "{$sessionUserId}" ?>' />
                                                <div class='form-group'>
                                                    <label class='enter-your-password'>Enter Your Password</label>
                                                    <input type='password' value='' name='confirm_password' class='form-control' required />
                                                </div>

                                                <button type='submit' name='confirm_reset_orders' class='btn btn-secondary'>
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" name='reset_orders_btn' class="btn btn-primary col-lg-12 reset-btn">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4 class='reset-salary'>Reset Salary</h4>

                                </div>
                                <div class="card-toggle-body">
                                    <p class="m-b-15">Tap <code>reset</code> button to remove all salary logs.</p>
                                    <div>
                                        <div class='form-container'>
                                            <form action='<?php echo "{$_SERVER['PHP_SELF']}" ?>' method='post' class='card'>
                                                <span class='close-btn'><i class='ti-close'></i></span>
                                                <input type='hidden' name='user_id' value='<?php echo "{$sessionUserId}" ?>' />
                                                <div class='form-group'>
                                                    <label class='enter-your-password'>Enter Your Password</label>
                                                    <input type='password' value='' name='confirm_password' class='form-control' required />
                                                </div>

                                                <button type='submit' name='confirm_reset_salary' class='btn btn-secondary'>
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" name='reset_salary_btn' class="btn btn-primary col-lg-12 reset-btn">Reset</button>
                                    </div>
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

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/controlPanel.js"></script>
    <script type="text/javascript" src="assets/language/sidebar.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- scripit init-->
    <script src="assets/js/scripts.js"></script>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- Extra Script -->
    <script type="text/javascript">
        document.querySelectorAll('.reset-btn').forEach(element => {
            element.addEventListener('click', (e) => {
                e.target.parentElement.children[0].style.display = 'flex';
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