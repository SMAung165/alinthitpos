<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
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

    <title>Alin Thit: Invoice</title>

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
    <?php require_once('widgets/darkModeFun.php'); ?>
    <style>
        * {
            color: black !important;
        }


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
    <div class="unix-invoice">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div id="invoice" class="effect2 m-t-120">
                        <div id="invoice-top">
                            <div class="invoice-logo"></div>
                            <div class="invoice-info">
                                <h2><a href='index.php'><?php echo "{$sessionUserFirstName} {$sessionUserLastName}"  ?></a></h2>
                                <p><?php echo "{$sessionUserEmail}" ?><br> <?php echo "{$sessionUserPhoneNumber}"  ?>
                                </p>
                            </div>
                            <!--End Info-->
                            <div class="title">
                                <h4>Invoice #1</h4>
                                <p>Issued: February 15, 2018<br> Payment Due: February 27, 2018
                                </p>
                            </div>
                            <!--End Title-->
                        </div>
                        <!--End InvoiceTop-->



                        <div id="invoice-mid">
                            <div class="clientlogo"></div>
                            <div class="invoice-info">

                                <h2><?php echo "{$getOrderDetails['first_name']} {$getOrderDetails['last_name']}"  ?></h2>
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
                                            <th class="table-item">
                                                Item Description
                                            </th>
                                            <th class="Hours">
                                                Model Number
                                            </th>
                                            <th class="Hours">
                                                Color
                                            </th>
                                            <th class="Rate">
                                                Quantity
                                            </th>
                                            <th class="subtotal">
                                                Sub-total
                                            </th>
                                        </tr>
                                        <tr class="service">
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo "{$getOrderDetails['product_name']}"  ?></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo "{$getOrderDetails['product_model']}"  ?></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo "{$getOrderDetails['color']}"  ?></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext"><?php echo "{$getOrderDetails['quantity']}"  ?></p>
                                            </td>
                                            <td class="tableitem">
                                                <p class="itemtext">$375.00</p>
                                            </td>
                                        </tr>

                                        <tr class="tabletitle">
                                            <td colspan="3"></td>
                                            <td class="Rate">
                                                <h2>Total</h2>
                                            </td>
                                            <td class="payment">
                                                <h2>$3,644.25</h2>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!--End Table-->
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="QRZ7QTM9XRPJ6">
                                <input type="image" src="assets/images/paypal.png" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            </form>


                            <div id="legalcopy">
                                <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days; please process this invoice within that time. There will be a 5% interest charge per month on late invoices.
                                </p>
                            </div>

                        </div>
                        <!--End InvoiceBot-->
                    </div>
                    <!--End Invoice-->
                </div>
            </div>
        </div>
    </div>

</body>

</html>