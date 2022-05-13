<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    if (!isset($_POST['customer_id'])) {

        header("location:customer-list.php");
    } else {
        require_once('core/functions/upCustomerFun.php');

        $getCustomerData = $getCustomerData($_POST['customer_id']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Customer</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel='icon' href='assets/images/favicon.png' type="image/png">

    <!-- script -->

    <script src="assets/js/themeSetterFun.js"></script>

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

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
                                <ol class="breadcrumb" style="padding-right:0">
                                    <li class="breadcrumb-item">
                                        <a href="index.php" style="display: inline;">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a style='display:inline' href="customer-list.php">Customer List</a></li>
                                    <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="#"></a></li>
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
                                <h4 id='editCustomer'>Edit Customer</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id='customerForm' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label><span id='firstname'></span>*</label>
                                                    <input type="hidden" name='customer_id' value='<?php echo $getCustomerData['customer_id'] ?>' />
                                                    <input type="text" name="first_name" class="form-control" placeholder="" value='<?php echo $getCustomerData['first_name'] ?>' required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='lastname'></span></label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="" value='<?php echo $getCustomerData['last_name'] ?>' />
                                                </div>

                                                <div class="form-group">
                                                    <label><span id='email'></span></label>
                                                    <input id="example-email" class="form-control" type="text" name="email" value='<?php echo $getCustomerData['email'] ?>' placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='phoneNumber'></span></label>
                                                    <input type="text" name="phone_number" class="form-control" placeholder="" value='<?php echo $getCustomerData['phone_number'] ?>' />
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label><span id='address'></span></label><textarea id="example-email" class="form-control" type="text" name="address" style="height:228px"><?php echo $getCustomerData['address'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='customer'></span> ID</label>
                                                    <input class="form-control" type="text" name="" value="<?php echo $getCustomerData['customer_number'] ?>" readonly required />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-default" name="upCustomerBtn"><span class="submit"></span></button>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="assets/language/editCustomer.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>

</html>