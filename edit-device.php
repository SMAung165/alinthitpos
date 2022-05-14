<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['product_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/upDeviceFun.php');
    $deviceQuery = $deviceQuery($_POST['product_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Device</title>
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
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php" style="display: inline;">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="manage-devices.php" style="display: inline;">Manage Devices</a>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 id='editDevice'>Edit Device</h4>

                            </div>
                            <div class="card-body">

                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input name='product_id' type="hidden" value="<?php echo $deviceQuery['product_id'] ?>" />
                                                    <input name='device_id' type="hidden" value="<?php echo $deviceQuery['device_id'] ?>" />
                                                    <label><span id='deviceName'></span>*</label>
                                                    <input type="text" name="product_name" class="form-control" placeholder="" value="<?php echo $deviceQuery['product_name'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='modelNumber'></span>*</label>
                                                    <input id="example-email" class="form-control" type="text" name="product_model" placeholder="" value="<?php echo $deviceQuery['product_model'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='brand'></span>*</label>
                                                    <input id="example-email" class="form-control" type="text" name="product_brand" placeholder="" value="<?php echo $deviceQuery['product_brand'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='specs'></span>*</label>
                                                    <textarea id="example-email" class="form-control" type="text" name="specs" style="height:235px" required><?php echo $deviceQuery['specs'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='colorVariant'></span></label>
                                                    <input class="form-control" type="text" name="color" value="<?php echo $deviceQuery['color'] ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='device'>Device</span> Resolution</label>
                                                    <input class="form-control" type="text" name="resolution" value="<?php echo $deviceQuery['resolution'] ?>" />
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label><span id='expense'></span>*</label>
                                                    <input class="form-control" type="text" name="expense" value="<?php echo $deviceQuery['expense'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='price'></span>*</label>
                                                    <input class="form-control" type="text" name="price" value="<?php echo $deviceQuery['price'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='initialStock'></span>*</label>
                                                    <input class="form-control" type="text" name="initial_stock" value="<?php echo $deviceQuery['initial_stock'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='stockLeft'></span>*</label>
                                                    <input class="form-control" type="text" name="stock" value="<?php echo $deviceQuery['stock'] ?>" required />
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='totalSold'></span></label>
                                                    <input class="form-control" type="text" name="total_sold" value="<?php echo $deviceQuery['total_sold'] ?>" required />
                                                </div>

                                                <div class="form-group">
                                                    <div class="user-photo m-b-30">
                                                        <label for='image' class="customImageInput">
                                                            <span class="imageOverlay"><i class="ti-image"></i></span>
                                                            <img class="img-fluid" src="<?php $deviceQueryImage = !file_exists($deviceQuery['image']) ? 'assets/images/user-profile.jpg' : $deviceQuery['image'];
                                                                                        echo $deviceQueryImage ?>" alt="" />
                                                            <input style="display: none;" type="file" name="file_image" id="image" />
                                                        </label>

                                                        <input name='image' value="<?php
                                                                                    echo "{$deviceQuery['image']}" ?>" type="hidden" />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-default" name="updateDeviceBtn"><span id='submit'></span></button>
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
    <script src="assets/language/editDevice.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

    <!-- My Script -->
    <script src="assets/js/myScript.js"></script>



</body>

</html>