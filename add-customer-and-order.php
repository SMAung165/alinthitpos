<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/addCustomerFun.php');
    require_once('core/functions/upDeviceFun.php');
    require_once('core/functions/addOrderFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Customer and Order</title>

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
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <?php require_once('widgets/darkModeFun.php'); ?>
    <style type="text/css">
        .edit-profile {
            position: absolute;
            top: 0;
            right: 0;

            z-index: 1;

            font-size: 0.8rem;
            padding: 20px;

            color: rgba(0, 0, 0, 0.6);

            display: flex;
            justify-content: center;
            align-items: center;

        }

        .edit-profile label {

            width: 50px;
            background: rgba(0, 0, 0, 0.1);

            display: flex;
            align-items: center;

            margin: 0px 10px 0px 0px;
            padding: 10px;
            border-radius: 40px;

            position: relative;

            cursor: pointer;


            transition: all 0.2s ease;

        }

        .edit-profile label::before {
            content: '';

            width: 15px;
            height: 15px;
            background: rgba(255, 255, 255, 1);
            border-radius: 50%;

            position: absolute;
            top: 50%;
            left: 5%;

            transform: translate(0%, -50%);

            transition: inherit;
        }

        .checked {
            background: rgba(0, 0, 0, 0.3) !important;
        }

        .checked:before {
            left: 95% !important;
            transform: translate(-100%, -50%) !important;
        }

        .edit-profile #userEditBtn {
            display: none;
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
                    <?php require_once('widgets/errorInterface.php'); ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 id='addCustomer'>Add Customer</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id='customerForm' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label><span id='firstname'></span>*</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='lastname'></span></label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="" />
                                                </div>

                                                <div class="form-group">
                                                    <label><span id='email'></span></label>
                                                    <input id="example-email" class="form-control" type="text" name="email" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='phoneNumber'></span></label>
                                                    <input type="text" name="phone_number" class="form-control" placeholder="" />
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label><span id='address'></span></label><textarea id="example-email" class="form-control" type="text" name="address" style="height:228px"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='customer'></span> ID</label>
                                                    <input class="form-control" type="text" name="customer_number" value="<?php echo $nextCustomerNumber ?>" readonly required />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-default" name="addCustomerBtn"><span class="submit"></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 id='addOrder'>Add Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <?php require_once('widgets/orderForm.php') ?>
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
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->


    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/language/addCustomerAndOrder.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script type="text/javascript">
        document.querySelector('.edit-profile').children[0].addEventListener('click', (e) => {

            if (e.target.checked) {
                e.target.parentElement.classList.add('checked');
                document.querySelector('#customerForm').style.display = 'none';
                document.querySelector('#customerEditForm').style.display = 'block';
            } else {
                e.target.parentElement.classList.remove('checked');
                document.querySelector('#customerForm').style.display = 'block';
                document.querySelector('#customerEditForm').style.display = 'none';
            }

        })
    </script> -->


</body>

</html>