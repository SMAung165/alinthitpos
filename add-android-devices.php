<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/addDeviceFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Device</title>
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
                                    <li class="breadcrumb-item"><a href="#">Devices</a></li>
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
                                <h4><span class='add-devices'></span></h4>

                            </div>
                            <div class="card-body">

                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <input type="hidden" name="device_id" value="<?php echo $nextDeviceId; ?>" required readonly />
                                                <div class="form-group">
                                                    <label class='device-name'>Device Name*</label>
                                                    <input type="text" name="product_name" class="form-control" placeholder="Samsung Galaxy S10" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class='model-number'>Model No.</label>
                                                    <input class="form-control" type="text" name="product_model" placeholder="SM-G973U">
                                                </div>
                                                <div class="form-group">
                                                    <label class='brand'>Brand</label>
                                                    <input class="form-control" type="text" name="product_brand" placeholder="Samsung">
                                                </div>
                                                <div class="form-group">
                                                    <label class='specs'>Specifications</label><textarea id="example-email" class="form-control" type="text" name="specs" style="height:235px">
Chipset:
CPU:
GPU:
RAM:
SIM:
Android Version:
UI Version:
Camera:
Battery:</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Resolution</label>
                                                    <input class="form-control" type="text" name="resolution" value="" placeholder="720x1080">
                                                </div>
                                                <div class="form-group">
                                                    <label class='color-variant'>Color Variant</label>
                                                    <input class="form-control" type="text" name="color" value="" placeholder="Blue">
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label class='expense'>Expense*</label>
                                                    <input class="form-control" type="text" name="expense" value="" required placeholder="300,000">
                                                </div>
                                                <div class="form-group">
                                                    <label class='price-determined'>Price Determined*</label>
                                                    <input class="form-control" type="text" name="price" value="" required placeholder="350,000">
                                                </div>
                                                <div class="form-group">
                                                    <label class='initial-stock'>Initial Stock*</label>
                                                    <input class="form-control" type="text" name="initial_stock" value="" required placeholder="10">
                                                </div>
                                                <div class="form-group">
                                                    <label class='stock-left'>Stock Left (Current Assets)</label>
                                                    <input class="form-control" type="text" name="stock" value="" placeholder="9">
                                                </div>
                                                <div class="form-group">
                                                    <label class='total-sold'>Total Sold</label>
                                                    <input class="form-control" type="text" name="total_sold" value="" placeholder="1">
                                                </div>

                                                <div class="form-group">
                                                    <div class="user-photo m-b-30">
                                                        <label for='image' class="customImageInput">
                                                            <span class="imageOverlay"><i class="ti-image"></i></span>
                                                            <img class="img-fluid" src="assets/images/user-profile.jpg" alt="" />
                                                            <input style="display: none;" type="file" name="file_image" id="image" />
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button id='submit' type="submit" class="btn btn-default" name="addDevicesBtn"><span class="submit">Submit</span></button>
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

    <!-- nano scroller -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>

    <!-- sidebar -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- Script init -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/myScript.js"></script>


    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>




</body>

</html>