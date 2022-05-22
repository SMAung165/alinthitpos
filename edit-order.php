<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['order_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/upDeviceFun.php');
    require_once('core/functions/upOrderFun.php');
    $getOrderDetails = $getOrderDetails($_POST['order_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Order</title>
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
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style type="text/css">
        .invoiceBtn-container {

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invoiceBtn-container span {
            margin-right: 10px;
        }

        .invoiceBtn-container button {
            font-size: 0.8rem;

            border: none;

            cursor: pointer;

        }

        .invoiceBtn-container button:hover {
            transform: scale(1.1);
        }

        .invoiceBtn-container button:active {
            transform: scale(1);
        }
    </style>
</head>

<body>
    <!-- sidebar -->
    <?php require_once('widgets/sideBar.php'); ?>

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
                                        <a href="#" style="display: inline;">Customer and Order</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="manage-order.php" style="display: inline;">Manage Order</a>
                                    </li>
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
                    <center>
                        <?php
                        if ($getOrderDetails['status'] == 1 and $getOrderDetails['payment_status'] == 1) { ?>

                            <form action="invoice.php" method='post'>

                                <h6 class="text text-success">The payment is already settled.</h6>
                                <input type="hidden" value="<?php echo $getOrderDetails['order_id'] ?>" name='order_id' />
                                <div class="invoiceBtn-container">
                                    <span>Move to : </span>

                                    <button class='badge badge-primary' type="submit" name='goToInvoiceBtn'>
                                        Invoice
                                    </button>
                                </div>

                            </form>

                        <?php } else if ($getOrderDetails['payment_cancelled'] == 1) { ?>

                            <h6 class="text text-danger">This order has been cancelled.</h6>

                        <?php } ?>
                    </center>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 id='editOrder'>Edit Order</h4>

                            </div>
                            <div class="card-body">

                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input name='order_id' type="hidden" value="<?php echo $getOrderDetails['order_id'] ?>" />
                                                    <label id='orderNumber'>Order Number</label>
                                                    <input type="text" name="" class="form-control" placeholder="" value="<?php echo $getOrderDetails['order_number'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label id='deviceName'>Device Name</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo "{$getOrderDetails['product_name']} ({$getOrderDetails['product_model']})" ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label id='brand'>Brand</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo $getOrderDetails['product_brand'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label id='color'>Color</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo $getOrderDetails['color'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label id='customerName'>Customer Name</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo "{$getOrderDetails['first_name']} {$getOrderDetails['last_name']}" ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='customer'>Customer</span> <span id='address'>Address</span></label>
                                                    <textarea id="example-email" class="form-control" type="text" name="specs" style="height:178px" required disabled><?php echo $getOrderDetails['address'] ?></textarea>
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label id='quantity'>Quantity</label>
                                                    <input class="form-control" type="text" name="stock" value="<?php echo $getOrderDetails['quantity'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label id='totalCost'>Total Cost</label>
                                                    <input class="form-control" type="text" name="price" value="<?php echo (filter_var($getOrderDetails['price'], FILTER_SANITIZE_NUMBER_INT) * intval($getOrderDetails['quantity']) . "MMK"); ?>" required disabled />
                                                </div>

                                                <?php require_once('widgets/editPaymentStatus.php'); ?>

                                                <div class="form-group">
                                                    <div class="user-photo m-b-30">
                                                        <img class="img-fluid" src="<?php $getOrderDetailsImage = !file_exists($getOrderDetails['image']) ? 'assets/images/user-profile.jpg' : $getOrderDetails['image'];
                                                                                    echo $getOrderDetailsImage ?>" alt="" />
                                                        <input style="display: none;" type="file" name="" id="image" disabled />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <span class='hasChild'>
                                            <?php if ($getOrderDetails['status'] != 1) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-default" name="updateOrderBtn"><span id='submit'></span></button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </span>

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

    <!-- nano scroller -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>

    <!-- sidebar -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/editOrder.js"></script>
    <script type="text/javascript" src="assets/language/sidebar.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- scripit init-->
    <script src="assets/js/scripts.js"></script>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>
    <!-- PWA  -->
    <script src="assets/js/app.js"></script>

</body>

</html>