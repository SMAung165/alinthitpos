<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
  header("location:page-login.php");
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
  <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

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
  <?php require_once('widgets/darkModeFun.php'); ?>

  <style>
    .breadcrumb {
      width: 106% !important;
    }

    .odd,
    .even {
      background: transparent !important;
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
                          <img class="img-fluid" src="<?php $deviceQuery = $deviceQuery($_POST['product_id']);
                                                      echo "{$deviceQuery['image']}" ?>" alt="" />
                        </div>
                        <div class="user-work">
                          <h4>Device Warehouse Info</h4>
                          <div class="work-content">
                            <h3>Device ID</h3>
                            <p><?php echo $deviceQuery['device_id'] ?></p>
                          </div>
                          <div class="work-content">
                            <h3>Price</h3>
                            <p><?php echo number_format($deviceQuery['price']) . ' MMK' ?></p>
                          </div>
                          <div class="work-content">
                            <h4>Warehouse Stock</h4>
                            <h3>Initial Stock</h3>
                            <p><?php echo $deviceQuery['initial_stock'] ?></p>
                            <h3>Stock Left (Current Assets)</h3>
                            <p><?php $stock = $deviceQuery['stock'] == 0 ? '<span class="text text-danger">Sold out</span>' : $deviceQuery['stock'] . ' Left';
                                echo $stock ?> </p>
                          </div>
                          <div class="work-content">
                            <h3>Total Sold</h3>
                            <p><?php echo $deviceQuery['total_sold'] ?> </p>
                          </div>
                          <div class="work-content">
                            <h4>Data Entry</h4>
                            <h3>Data Entry Date</h3>
                            <p><?php

                                $entryDateTime = (explode(' ', $deviceQuery['entry_date']));
                                $entryDate = $entryDateTime[0];
                                $entryTime = $entryDateTime[1];

                                echo $entryDate

                                ?></p>
                          </div>
                          <div class="work-content">
                            <h3>Data Entry Time</h3>
                            <p><?php
                                echo $entryTime

                                ?></p>
                          </div>
                        </div>

                      </div>
                      <div class="col-lg-9">
                        <div class="user-profile-name"><?php echo "{$deviceQuery['product_name']}" ?></div>
                        <div class="user-Location">
                          <i class="ti-location-pin"></i> New York, New York
                        </div>
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
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Device Info</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Specifications</h4>
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

                              <div class="basic-information">
                                <h4>Appearance</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Color:</span>
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
            <div class="col-lg-7">
              <div class="card">
                <div class="card-title">
                  <h4>Recent Buyers</h4>
                </div>
                <div class="card-body bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd" style="text-align: center;width:100%;padding-bottom:10px">
                      <thead>
                        <tr>
                          <th>Customer Name</th>
                          <th>Date</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Status</th>
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
            <div class="col-lg-5">
              <div class="card">
                <div class="card-title">
                  <h4>Recent Comments </h4>

                </div>
                <div class="recent-comment">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="assets/images/avatar/1.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">john doe</h4>
                      <p>Cras sit amet nibh libero, in gravida nulla. </p>
                      <div class="comment-action">
                        <div class="badge badge-success">Approved</div>
                        <span class="m-l-10">
                          <a href="#">
                            <i class="ti-check color-success"></i>
                          </a>
                          <a href="#">
                            <i class="ti-close color-danger"></i>
                          </a>
                          <a href="#">
                            <i class="fa fa-reply color-primary"></i>
                          </a>
                        </span>
                      </div>
                      <p class="comment-date">October 21, 2017</p>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="assets/images/avatar/2.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Mr. John</h4>
                      <p>Cras sit amet nibh libero, in gravida nulla. </p>
                      <div class="comment-action">
                        <div class="badge badge-warning">Pending</div>
                        <span class="m-l-10">
                          <a href="#">
                            <i class="ti-check color-success"></i>
                          </a>
                          <a href="#">
                            <i class="ti-close color-danger"></i>
                          </a>
                          <a href="#">
                            <i class="fa fa-reply color-primary"></i>
                          </a>
                        </span>
                      </div>
                      <p class="comment-date">October 21, 2017</p>
                    </div>
                  </div>
                  <div class="media no-border">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="assets/images/avatar/3.jpg" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Mr. John</h4>
                      <p>Cras sit amet nibh libero, in gravida nulla. </p>
                      <div class="comment-action">
                        <div class="badge badge-danger">Rejected</div>
                        <span class="m-l-10">
                          <a href="#">
                            <i class="ti-check color-success"></i>
                          </a>
                          <a href="#">
                            <i class="ti-close color-danger"></i>
                          </a>
                          <a href="#">
                            <i class="fa fa-reply color-primary"></i>
                          </a>
                        </span>
                      </div>
                      <div class="comment-date">October 21, 2017</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /# card -->
            </div>
            <!-- /# column -->
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2018 © Admin Board. -
                  <a href="#">example.com</a>
                </p>
              </div>
            </div>
          </div>
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
  </script>

</body>

</html>