<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['order_id'])) {
    header("location:page-login.php");
} else {

    if (!isset($_POST['order_id'])) {
        header("location:index.php");
    } else {
        $getOrderDetails = $getOrderDetails($_POST['order_id']);
        $customerName = $getOrderDetails['first_name'] . ' ' . $getOrderDetails['last_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $customerName ?>'s Invoice</title>
    <!-- manifest -->
    <link rel="manifest" href="assets/JSON/manifest.json">
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel='icon' href='assets/images/favicon.png' type="image/png">

    <!-- Language -->

    <script type="text/javascript" src="assets/language/lang/en.js"></script>
    <script type="text/javascript" src="assets/language/lang/mm.js"></script>

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <style type="text/css">
        .row {
            justify-content: center;
        }

        table th {
            font-size: 0.8rem !important;
            font-weight: bolder !important;
        }

        .custom-print-btn {
            background: rgba(0, 0, 0, 0.7);
            width: 40px;
            height: 40px;

            border: none;
            border-radius: 40px;
            padding: 10px;

            color: white !important;

            position: fixed;
            z-index: 1;
            bottom: 5%;
            right: 5%;

            cursor: pointer;

            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .custom-print-btn:hover {
            background: rgba(0, 0, 0, 0.5);
            transform: scale(1.1);
        }

        .custom-print-btn:active {
            transition: all 0.1s ease;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: unset;
        }
    </style>
</head>


<body>
    <button type="button" class="custom-print-btn" onclick="printPageArea('print-area','<?php echo $customerName ?> invoice')">
        <i class="ti-printer"></i>
    </button>

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
                                    <li class="breadcrumb-item active"><a class="pageTitle" href="#" style="display: inline;">Invoice</a></li>
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
                                <div class="col-lg-7" id='print-area'>
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
                                                <h3>Invoice No. #<?php echo $getOrderDetails['order_number'] ?></h3>
                                                <hr />
                                                <h5 style='text-align:right'>Alint Thit Mobile</h5 style='text-align:right'>
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
                    <?php require_once('widgets/footer.php'); ?>
                </section>
            </div>
        </div>
    </div>

    <!-- Printing -->
    <script src="assets/js/print.js" type="text/javascript"></script>

    <!-- Extra Script -->
    <script type="text/javascript">
        const getPageTitle = () => document.querySelector("title").innerHTML;
        document.querySelector(".pageTitle").innerHTML = getPageTitle();

        //Breadcrumb
        var breadcrumb = document.querySelector(".breadcrumb");
        var li = document.createElement("li");
        li.className = "breadcrumb-item";
        li.innerHTML = "<a href='index.php'>Alin Thit</a>";

        breadcrumb.insertBefore(li, breadcrumb.children[0]);
    </script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>
</body>

</html>