<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/upDeviceFun.php');
    require_once('core/functions/upOrderFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Order</title>

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
    <?php require_once('widgets/sideBar.php'); ?>
    <!-- /# sidebar -->


    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon">
                                <span class="user-avatar"><?php echo "{$sessionUserName}" ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="app-profile.php">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="core/functions/logout.php">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
                        <?php $getOrderDetails = $getOrderDetails($_POST['order_id']);
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
                                <h4>Add Devices</h4>

                            </div>
                            <div class="card-body">

                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input name='order_id' type="hidden" value="<?php echo $getOrderDetails['order_id'] ?>" />
                                                    <label>Order Number</label>
                                                    <input type="text" name="" class="form-control" placeholder="" value="<?php echo $getOrderDetails['order_number'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Device Name</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo "{$getOrderDetails['product_name']} ({$getOrderDetails['product_model']})" ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Brand</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo $getOrderDetails['product_brand'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Color</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo $getOrderDetails['color'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <input id="example-email" class="form-control" type="text" name="" placeholder="" value="<?php echo "{$getOrderDetails['first_name']} {$getOrderDetails['last_name']}" ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer Address</label>
                                                    <textarea id="example-email" class="form-control" type="text" name="specs" style="height:178px" required disabled><?php echo $getOrderDetails['address'] ?></textarea>
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input class="form-control" type="text" name="stock" value="<?php echo $getOrderDetails['quantity'] ?>" required disabled />
                                                </div>
                                                <div class="form-group">
                                                    <label>Total Price</label>
                                                    <input class="form-control" type="text" name="price" value="<?php echo (filter_var($getOrderDetails['price'], FILTER_SANITIZE_NUMBER_INT) * intval($getOrderDetails['quantity']) . "MMK"); ?>" required disabled />
                                                </div>

                                                <?php require_once('widgets/editPaymentStatus.php'); ?>

                                                <div class="form-group">
                                                    <div class="user-photo m-b-30">
                                                        <img class="img-fluid" src="<?php $getOrderDetailsImage = !file_exists($getOrderDetails['image']) ? 'assets/images/user-profile.jpg' : $getOrderDetails['image'];
                                                                                    echo $getOrderDetailsImage ?>" alt="" />
                                                        <input style="display: none;" type="file" name="file_image" id="image" disabled />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <?php if ($getOrderDetails['status'] != 1) { ?>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-default" name="updateOrderBtn">Submit</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
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
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->





</body>

</html>