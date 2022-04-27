<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['product_id'])) {
  header("location:page-login.php");
} else {
  $deviceQuery = $deviceQuery($_POST['product_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Device Details</title>

  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  <link rel='icon' href='assets/images/favicon.png' type="image/png">


  <!-- Common -->
  <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
  <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/lib/helper.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />

  <style>
    .breadcrumb {
      width: 106% !important;
    }
  </style>

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
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?php echo "{$deviceQuery['image']}" ?>" alt="" />
                        </div>
                        <div class="user-work">
                          <h4 id='deviceWarehouseInfo'>Device Warehouse Info</h4>
                          <div class="work-content">
                            <h3 id='deviceId'>Device ID</h3>
                            <p><?php echo $deviceQuery['device_id'] ?></p>
                          </div>
                          <div class="work-content">
                            <h3 id='price'>Price</h3>
                            <p><?php echo number_format($deviceQuery['price']) ?> <span class='currency'>MMK</span></p>
                          </div>
                          <div class="work-content">
                            <h4 id='warehouseStock'>Warehouse Stock</h4>
                            <h3 id='initialStock'>Initial Stock</h3>
                            <p><?php echo $deviceQuery['initial_stock'] ?> <span class="countSign">PCS</span></p>
                            <h3 id='stockLeft'>Stock Left (Current Assets)</h3>
                            <p><?php $stock = $deviceQuery['stock'] == 0 ? '<span class="text text-danger">Sold out</span>' : $deviceQuery['stock'] . ' <span id="left">Left</span>';
                                echo $stock ?> </p>
                          </div>
                          <div class="work-content">
                            <h3 id='totalSold'>Total Sold</h3>
                            <p><?php echo $deviceQuery['total_sold'] ?> <span class='countSign'>PCS</span></p>
                          </div>
                          <div class="work-content">
                            <h4 id='dataEntry'>Data Entry</h4>
                            <h3 id='dataEntryDate'>Data Entry Date</h3>
                            <p><?php

                                $entryDateTime = (explode(' ', $deviceQuery['entry_date']));
                                $entryDate = $entryDateTime[0];
                                $entryTime = $entryDateTime[1];

                                echo $entryDate

                                ?></p>
                          </div>
                          <div class="work-content">
                            <h3 id='dataEntryTime'>Data Entry Time</h3>
                            <p><?php
                                echo $entryTime

                                ?></p>
                          </div>
                        </div>

                      </div>
                      <div class="col-lg-9">
                        <div class="user-profile-name"><?php echo "{$deviceQuery['product_name']}" ?></div>
                        <div class="user-job-title"><?php echo "{$deviceQuery['product_model']}" ?></div>
                        <div class="ratings">
                          <h4>Ratings</h4>
                          <div class="rating-star">
                            <span><?php echo "{$deviceQuery['rating']}" ?></span>

                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>

                          </div>
                        </div>
                        <!-- <div class="user-send-message">
                          <button class="btn btn-primary btn-addon" type="button">
                            <i class="ti-email"></i>Send Message</button>
                        </div> -->
                        <div class="custom-tab user-profile-tab">
                          <div class="">
                            <div class="user-work" style="width:100%">
                              <h4 id='deviceInfo'>Device Info</h4>
                            </div>
                          </div>
                          <div class="">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4 id='specs'>Specifications</h4>
                                <?php
                                $specifications = trim($deviceQuery['specs'], " \n\r\t\v\x00");
                                $specifications = (explode(PHP_EOL, $deviceQuery['specs']));

                                for ($i = 0; $i < count($specifications); $i++) {

                                  $newSpecArr[] = explode(':', $specifications[$i]);
                                }
                                $outputSpecsFun = function () use ($newSpecArr) {
                                  for ($i = 0; $i < count($newSpecArr); $i++) {
                                    echo "
                                        <div class='phone-content'>
                                          <span class='contact-title'>{$newSpecArr[$i][0]}:</span>
                                          <span class='phone-number'>{$newSpecArr[$i][1]}</span>
                                        </div>     
                                    ";
                                  }
                                };

                                $outputSpecsFun();
                                ?>

                              </div>

                              <div class="basic-information user-work">
                                <h4 id='appearance'>Appearance</h4>
                                <div class="birthday-content">
                                  <span class="contact-title" id='color'>Color:</span>
                                  <span class="birth-date"><?php echo $deviceQuery['color']; ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Resolution:</span>
                                  <span class="gender"><?php echo $deviceQuery['resolution'] ?></span>
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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h4 id='recentBuyers'>Recent Buyers</h4>
                </div>
                <div class="card-body bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd" style="text-align: center;width:100%;padding-bottom:10px">
                      <thead>
                        <tr>
                          <th id='customerName'>Customer Name</th>
                          <th id='date'>Date</th>
                          <th id='quantity'>Quantity</th>
                          <th id='totalPrice'>Total Price</th>
                          <th id='status'>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $orderQuery('device-details', $deviceQuery['device_id']) ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <?php require_once('widgets/footer.php'); ?>
        </section>
      </div>
    </div>
  </div>







  <!-- Common -->
  <script src="assets/js/lib/jquery.min.js"></script>
  <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>
  <script src="assets/js/lib/bootstrap.min.js"></script>
  <script src="assets/language/deviceDetails.js"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- scripit init-->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>
  <script src="assets/js/lib/data-table/datatables-init.js"></script>
  <script>
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        responsive: true,
      });
    });

    const starColorizer = (rating) => {
      const star = document.querySelectorAll('.ti-star');
      for (i = 0; i < parseInt(rating); i++) {

        star[i].style.color = "blue";
      }
    }
    starColorizer(<?php echo "{$deviceQuery['rating']}/2" ?>);

    document.querySelectorAll('.customerTr').forEach(element => {
      element.addEventListener('click', (e) => {

        e.target.parentElement.children[0].submit();

      })
    })
  </script>

</body>

</html>