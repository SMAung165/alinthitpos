<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['order_id'])) {
    header("location:page-login.php");
} else {
    $getOrderDetails = $getOrderDetails($_POST['order_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo "{$getOrderDetails['first_name']} {$getOrderDetails['last_name']}'s" ?> Invoice</title>

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
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        .row {
            justify-content: center;
        }

        table th {
            font-size: 0.8rem !important;
            font-weight: bolder !important;
        }
    </style>
</head>


<body>
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
                                    <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="#">Invoice</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="unix-invoice">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div id="invoice" class="effect2 ">
                                        <div id="invoice-top">
                                            <div class="invoice-logo"></div>
                                            <div class="invoice-info">
                                                <h2>Cashier : <?php echo "{$sessionUserFirstName} {$sessionUserLastName}"  ?></h2>
                                                <p><?php echo "{$sessionUserEmail}" ?><br> <?php echo "{$sessionUserPhoneNumber}"  ?>
                                                </p>
                                            </div>
                                            <!--End Info-->
                                            <div class="title">
                                                <h4>Alint Thit Mobile</h4>
                                                <p>Issued : <?php echo $getOrderDetails['order_date'] ?>
                                                    <br> Paid : <?php echo $getOrderDetails['completed_date'] ?>
                                                </p>
                                            </div>
                                            <!--End Title-->
                                        </div>
                                        <!--End InvoiceTop-->



                                        <div id="invoice-mid">
                                            <div class="clientlogo"></div>
                                            <div class="invoice-info">

                                                <h2>Customer : <?php echo "{$getOrderDetails['first_name']} {$getOrderDetails['last_name']}"  ?></h2>
                                                <p><?php echo "{$getOrderDetails['email']} " ?><br> <?php echo "{$getOrderDetails['phone_number']}" ?>
                                                    <br>
                                            </div>
                                        </div>
                                        <!--End Invoice Mid-->

                                        <div id="invoice-bot">
                                            <div id="invoice-table">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr class="tabletitle">
                                                            <th class="" width="250px">
                                                                Item Description
                                                            </th>
                                                            <th class="">
                                                                Model Number
                                                            </th>
                                                            <th class="">
                                                                Color
                                                            </th>
                                                            <th class="">
                                                                Quantity
                                                            </th>
                                                            <th class="" style="text-align: right !important;">
                                                                Sub-total
                                                            </th>
                                                        </tr>
                                                        <tr class="service">
                                                            <td class="">
                                                                <span class=""><?php echo "{$getOrderDetails['product_name']}"  ?></span>
                                                            </td>
                                                            <td class="">
                                                                <span class=""><?php echo "{$getOrderDetails['product_model']}"  ?></span>
                                                            </td>
                                                            <td class="">
                                                                <span class=""><?php echo "{$getOrderDetails['color']}"  ?></span>
                                                            </td>
                                                            <td class="">
                                                                <span class=""><?php echo "{$getOrderDetails['quantity']}" ?></span>
                                                            </td>
                                                            <td class="">
                                                                <span class=""><?php echo number_format($getOrderDetails['price'] * $getOrderDetails['quantity']) ?></span>
                                                                <span>MMK</span>
                                                            </td>
                                                        </tr>

                                                        <tr class="tabletitle">
                                                            <td colspan="3"></td>
                                                            <td class="Rate">
                                                                <h2>Total</h2>
                                                            </td>
                                                            <td class="payment">
                                                                <h2> <span class=""><?php echo number_format($getOrderDetails['price'] * $getOrderDetails['quantity']) ?></span>
                                                                    <span>MMK</span>
                                                                </h2>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                            <!--End Table-->


                                            <div id="legalcopy">
                                                <p class="legal"><strong>Thank you for your business!</strong> </p>
                                            </div>

                                        </div>
                                        <!--End InvoiceBot-->
                                    </div>
                                    <!--End Invoice-->
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const getPageTitle = () => document.querySelector("title").innerHTML;
        document.querySelector(".pageTitle").innerHTML = getPageTitle();
    </script>
</body>

</html>