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

  <title>Order Details</title>
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
          <div class="col-lg-6 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?php echo "{$getOrderDetails['image']}" ?>" alt="" />
                        </div>

                        <div class="user-work">
                          <h4><?php echo $getOrderDetails['product_name'] ?></h4>
                          <div class="">
                            <p><b class='model-number'>Model</b> : <?php echo $getOrderDetails['product_model'] ?></p>
                            <p><b class='brand'>Brand</b> : <?php echo $getOrderDetails['product_brand'] ?></p>
                            <p><b class='price'>Price</b> : <?php echo number_format($getOrderDetails['price']) ?><span class="currency"> MMK</span></p>
                            <p><b class='color-variant'>Color</b> : <?php echo $getOrderDetails['color'] ?></p>
                          </div>
                          <form method="post" action="device-details.php">
                            <input type="hidden" name="product_id" value="<?php echo $getOrderDetails['product_id'] ?>" />
                            <button class="btn btn-secondary btn-addon" type="submit">
                              <i class="ti-mobile"></i><span class='more-device-details'>More Device Details</span></button>
                            </button>
                          </form>
                        </div>


                      </div>
                      <div class="col-lg-9">
                        <div class="custom-tab user-profile-tab">
                          <div class="user-work" style="width:100%">
                            <h4 class='customer-info'>Customer Info</h4>
                          </div>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">

                                <div class="birthday-content">
                                  <span class="contact-title customer-name">Name:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['first_name'] . ' ' . $getOrderDetails['last_name']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title address">Address:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['address']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title email">Email:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['email']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title phone-number">Phone Number:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['phone_number']; ?></span>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="custom-tab user-profile-tab">
                          <div class="user-work">
                            <h4 class='order-info'>Order Info</h4>
                          </div>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">

                                <div class="birthday-content">
                                  <span class="contact-title order-number">Order Number:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['order_number']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title order-date">Order Date:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['order_date']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title quantity">Quantity:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['quantity'] . ' PCS'; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title total-price">Total Cost:</span>
                                  <span class="birth-date"><?php
                                                            $totalPrice = number_format(($getOrderDetails['price'] * $getOrderDetails['quantity'])) . ' MMK';
                                                            echo $totalPrice;
                                                            ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title overall-status">Overall Status:</span>
                                  <span class="birth-date"><?php $orderStatus =  $orderStatus($getOrderDetails['order_id']);
                                                            echo $orderStatus['status']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title payment-status">Payment Status:</span>
                                  <span class="birth-date"><?php echo $orderStatus['payment_status']; ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /# row -->
          <?php require_once('widgets/footer.php'); ?>
        </section>
      </div>
    </div>
  </div>

  <!-- Common -->
  <script src="assets/js/lib/jquery.min.js"></script>
  <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>

  <!-- sidebar -->
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/lib/bootstrap.min.js"></script>

  <!-- Language init -->
  <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
  <script type="text/javascript" src="assets/language/sidebar.js"></script>
  <script type="text/javascript" src="assets/js/setLang.js"></script>

  <!-- scripit init-->
  <script src="assets/js/scripts.js"></script>

  <!-- Fontawesome-->
  <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

  <!-- Extra Script -->
  <script type="text/javascript">
    const starColorizer = (rating) => {
      const star = document.querySelectorAll('.ti-star');
      for (i = 0; i < parseInt(rating); i++) {

        star[i].style.color = "blue";
      }
    }
    starColorizer(<?php echo "{$getOrderDetails['rating']}/2" ?>);
  </script>

  <!-- PWA  -->
  <script src="assets/js/app.js"></script>

</body>

</html>