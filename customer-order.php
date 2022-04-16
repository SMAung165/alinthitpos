<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
  header("location:/pos/page-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Customer Order</title>

  <!-- ================= Favicon ================== -->
  <!-- Standard -->
  <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff" />
  <!-- Retina iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff" />
  <!-- Retina iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff" />
  <!-- Standard iPad Touch Icon-->
  <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff" />
  <!-- Standard iPhone Touch Icon-->
  <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff" />

  <!-- Styles -->
  <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet" />
  <link href="assets/css/lib/themify-icons.css" rel="stylesheet" />
  <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet" />
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet" />

  <link href="assets/css/lib/helper.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />

  <?php require_once('widgets/darkModeFun.php'); ?>
  <style type="text/css">
    .myActionDropDown {

      background-color: #363636 !important;

      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    }

    .myActionDropDown button {
      border: none;
      padding: none;
      background-color: transparent;

      cursor: pointer;
    }

    .myActionDropDown button,
    i {
      color: white !important;

    }

    .myActionDropDown button i {
      margin-right: 20px;
      margin-left: 10px;
    }

    .myActionDropDown li:hover button {

      color: grey !important;
    }

    .myActionDropDown li:hover button i {
      color: grey !important;
    }

    .tblImg {
      cursor: pointer;
    }

    .imageBox {

      width: 100%;
      height: 100vh;

      position: fixed;
      top: 0%;
      left: 0%;

      display: flex;
      justify-content: center;
      align-items: center;

      opacity: 0;

      z-index: -1;

      background: rgba(0, 0, 0, 0.5);

      transition: all 0.2s;

    }

    .imageBox .imgContainer {

      width: 250px;

      padding: 9px;

      background-color: #ffff;

      border-radius: 10px;

      position: absolute;

      z-index: 1;

      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);

    }

    .imageBox .imgContainer img {
      width: 100%;
      height: 100%;
    }

    .showImgBox {
      opacity: 1;
      z-index: 2;
    }

    .badge {
      font-size: 0.7rem !important;
    }

    .dropdown button {
      font-size: 1rem !important;
    }
  </style>

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
                    <a href="#">Devices</a>
                  </li>
                  <li class="breadcrumb-item active"><a class="pageTitle" style="display:inline" href="<?php echo $_SERVER['PHP_SELF'] ?>"></a></li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class=" col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h4>All Customer Orders </h4>
                  <center><?php success() ?></center>
                </div>
                <div class="bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd table-hover" style="text-align:center;width:100%;padding-bottom:80px;">
                      <thead>
                        <tr>

                          <th>Customer</th>
                          <th>Order Number</th>
                          <th>Product Name</th>
                          <th>Price (MMK)</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Order Date</th>
                          <th>Status</th>
                          <th>Payment Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php $orderQuery('customer-order', ''); ?>
                      </tbody>
                      <tfoot>
                        <tr>

                          <th>Customer</th>
                          <th>Order Number</th>
                          <th>Product Name</th>
                          <th>Price (MMK)</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Order Date</th>
                          <th>Status</th>
                          <th>Payment Status</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- jquery vendor -->
  <script src=" assets/js/lib/jquery.min.js">
  </script>
  <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- bootstrap -->
  <script src="assets/js/lib/bootstrap.min.js"></script>
  <!-- scripit init-->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>
  <script src="assets/js/lib/data-table/datatables-init.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        responsive: true,
      });
    });


    document.querySelectorAll('.tblImg').forEach(tblImgEl => {

      tblImgEl.addEventListener('click', (e) => {
        var imgBoxEl = e.target.parentElement.children[0];
        imgBoxEl.classList.add('showImgBox');
        imgBoxEl.addEventListener('click', (e) => {
          e.target.classList.remove('showImgBox');
        })
      })

    });
  </script>


</body>

</html>