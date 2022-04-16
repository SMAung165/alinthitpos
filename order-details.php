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

  <title>Order Details</title>

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
  <?php require_once('widgets/darkModeFun.php'); ?>


</head>

<body>
  <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
      <div class="nano-content">
        <ul>
          <div class="logo"><a href="index.php">
              <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span>
            </a></div>
          <li class="label">Main</li>
          <li>
            <a href="index.php"><i class="ti-home"></i> Dashboard <span class="badge badge-primary">0</span></a>
          </li>
          <li class="label">Stocks</li>
          <li><a class="sidebar-sub-toggle"><i class="ti-mobile"></i> Devices <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="device-list.php">Device List</a></li>
              <li><a href="add-android-devices.php">Add Devices</a></li>
              <li><a href="manage-devices.php">Manage Devices</a></li>
            </ul>
          </li>

          <li class="label">Users</li>
          <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Admin <span class="badge badge-primary"><?php echo $getRowCount('users') ?></span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="admin-list.php">Admin List</a></li>
              <li><a href="add-admin.php">Add Admin</a></li>
              <li><a href="chartjs.html">Admin Management</a></li>
            </ul>
          </li>
          <li><a href="customer-order.php"><i class="ti-user"></i> Customer </a></li>
          <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
          <li><a href="app-profile.php"><i class="ti-user"></i>My Profile</a></li>
          <li class="label">Features</li>
          <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="ui-typography.html">Typography</a></li>
              <li><a href="ui-alerts.html">Alerts</a></li>

              <li><a href="ui-button.html">Button</a></li>
              <li><a href="ui-dropdown.html">Dropdown</a></li>

              <li><a href="ui-list-group.html">List Group</a></li>

              <li><a href="ui-progressbar.html">Progressbar</a></li>
              <li><a href="ui-tab.html">Tab</a></li>

            </ul>
          </li>
          <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="uc-calendar.html">Calendar</a></li>
              <li><a href="uc-carousel.html">Carousel</a></li>
              <li><a href="uc-weather.html">Weather</a></li>
              <li><a href="uc-datamap.html">Datamap</a></li>
              <li><a href="uc-todo-list.html">To do</a></li>
              <li><a href="uc-scrollable.html">Scrollable</a></li>
              <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
              <li><a href="uc-toastr.html">Toastr</a></li>
              <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
              <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
              <li><a href="uc-nestable.html">Nestable</a></li>

              <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
              <li><a href="uc-rating-jRate.html">jRate</a></li>
            </ul>
          </li>
          <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="table-basic.html">Basic</a></li>

              <li><a href="table-export.html">Datatable Export</a></li>
              <li><a href="table-row-select.html">Datatable Row Select</a></li>
              <li><a href="table-jsgrid.html">Editable </a></li>
            </ul>
          </li>
          <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="font-themify.html">Themify</a></li>
            </ul>
          </li>
          <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="gmaps.html">Basic</a></li>
              <li><a href="vector-map.html">Vector Map</a></li>
            </ul>
          </li>
          <li class="label">Form</li>
          <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
          <li class="label">Extra</li>
          <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="invoice.html">Basic</a></li>
              <li><a href="invoice-editable.html">Editable</a></li>
            </ul>
          </li>
          <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span class="sidebar-collapse-icon ti-angle-down"></span></a>
            <ul>
              <li><a href="page-login.html">Login</a></li>
              <li><a href="page-register.html">Register</a></li>
              <li><a href="page-reset-password.html">Forgot password</a></li>
            </ul>
          </li>
          <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li>
          <li><a href="core/functions/logout.php"><i class="ti-close"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
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
                    <a href="#">Dashboard</a>
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
                          <img class="img-fluid" src="<?php $getOrderDetails = $getOrderDetails($_POST['order_id']);
                                                      echo "{$getOrderDetails['image']}" ?>" alt="" />
                        </div>

                        <div class="user-work">
                          <h4><?php echo $getOrderDetails['product_name'] ?></h4>
                          <div class="">
                            <span><b>Model : </b><?php echo $getOrderDetails['product_model'] ?></p></span>
                            <span><b>Brand : </b><?php echo $getOrderDetails['product_brand'] ?></p></span>
                            <span><b>Price : </b><?php echo number_format($getOrderDetails['price'], 2) . ' MMK' ?></p></span>
                            <span><b>Color : </b><?php echo $getOrderDetails['color'] ?></p></span>
                          </div>
                          <form method="post" action="device-details.php">
                            <input type="hidden" name="product_id" value="<?php echo $getOrderDetails['product_id'] ?>" />
                            <button class="btn btn-secondary btn-addon" type="submit">
                              <i class="ti-mobile"></i>More Device Details</button>
                            </button>
                          </form>
                        </div>


                      </div>
                      <div class="col-lg-9">
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Customer Info</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">

                                <div class="birthday-content">
                                  <span class="contact-title">Name:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['first_name'] . ' ' . $getOrderDetails['last_name']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Address:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['address']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['email']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Phone Number:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['phone_number']; ?></span>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">Order Info</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">

                                <div class="birthday-content">
                                  <span class="contact-title">Order Number:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['order_number']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Quantity:</span>
                                  <span class="birth-date"><?php echo $getOrderDetails['quantity'] . ' PCS'; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Total Price:</span>
                                  <span class="birth-date"><?php
                                                            $totalPrice = number_format(($getOrderDetails['price'] * $getOrderDetails['quantity']), 2) . ' MMK';
                                                            echo $totalPrice;
                                                            ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Overall Status:</span>
                                  <span class="birth-date"><?php $orderStatus =  $orderStatus($getOrderDetails['order_id']);
                                                            echo $orderStatus['status']; ?></span>
                                </div>
                                <div class="birthday-content">
                                  <span class="contact-title">Payment Status:</span>
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
  <script>
    const starColorizer = (rating) => {
      const star = document.querySelectorAll('.ti-star');
      for (i = 0; i < parseInt(rating); i++) {

        star[i].style.color = "blue";
      }
    }
    starColorizer(<?php echo "{$getOrderDetails['rating']}/2" ?>);
  </script>

</body>

</html>