<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
  header("location:page-login.php");
} else {
  require_once('core/functions/upUserProfileFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>My Profile</title>

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
  <style>
    .user-profile {
      position: relative;
    }

    .edit-profile {
      position: absolute;
      top: 0;
      right: 0;

      z-index: 1;

      font-size: 0.8rem;
      padding: 20px;

      color: rgba(0, 0, 0, 0.6);

      display: flex;
      justify-content: center;
      align-items: center;

    }

    .edit-profile label {

      width: 50px;
      background: rgba(0, 0, 0, 0.1);

      display: flex;
      align-items: center;

      margin: 0px 10px 0px 0px;
      padding: 10px;
      border-radius: 40px;

      position: relative;

      cursor: pointer;


      transition: all 0.2s ease;

    }

    .edit-profile label::before {
      content: '';

      width: 15px;
      height: 15px;
      background: rgba(255, 255, 255, 1);
      border-radius: 50%;

      position: absolute;
      top: 50%;
      left: 5%;

      transform: translate(0%, -50%);

      transition: inherit;
    }

    .checked {
      background: rgba(0, 0, 0, 0.3) !important;
    }

    .checked:before {
      left: 95% !important;
      transform: translate(-100%, -50%) !important;
    }

    .edit-profile #userEditBtn {
      display: none;
    }

    .user-photo {
      display: flex;
      justify-content: center;
    }

    .user-photo label {
      width: 300px;

      display: flex;
      justify-content: center;

      position: relative;
    }

    .user-photo label span image {
      width: 100% !important;

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
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <center><?php $outputLogs($logs);
                          success() ?></center>
                  <span class="edit-profile">

                    <label for="userEditBtn" class="">
                      <input type="checkbox" id="userEditBtn" />
                    </label>

                    <i class="ti-pencil-alt"></i>

                  </span>
                  <?php require_once('widgets/userEditForm.php') ?>
                  <div class="user-profile">

                    <div class="row">

                      <div class="col-lg-3">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?php echo "{$sessionUserProfileImage}" ?>" alt="" />
                        </div>
                        <div class="user-work">
                          <h4>Work</h4>
                          <div class="work-content">
                            <h3><?php echo "{$sessionUserPosition}" ?></h3>
                            <p>Alin Thit Mobile</p>
                            <p>Nyaungdon</p>
                          </div>
                        </div>
                        <div class="user-skill">
                          <h4>Specialty</h4>
                          <ul>
                            <?php $outPutSessionUserSpecialty($sessionUserSpecialty); ?>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="user-profile-name"><?php echo "{$sessionUserFirstName} {$sessionUserLastName}" ?></div>
                        <div class="user-Location">
                          <a href="<?php echo "{$sessionUserGmaps}" ?>" target='blank'> <i class="ti-location-pin"></i> <?php echo "{$sessionUserAddress}" ?></a>
                        </div>
                        <div class="user-job-title"><?php echo "{$sessionUserRole}" ?></div>

                        <div class="user-send-message">
                          <button class="btn btn-primary btn-addon" type="button">
                            <i class="ti-email"></i>Send Message</button>
                        </div>
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Phone:</span>
                                  <span class="phone-number"><?php echo "{$sessionUserPhoneNumber}" ?></span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Address:</span>
                                  <span class="mail-address"><?php echo "{$sessionUserAddress}" ?></span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email"><?php echo "{$sessionUserEmail}" ?></span>
                                </div>
                                <div class="facebook-content">
                                  <span class="contact-title">Facebook:</span>
                                  <span class="contact-facebook"><a href="<?php echo "{$sessionUserFacebook}" ?>" target="blank"><?php echo "{$sessionUserName}" ?></a></span>
                                </div>
                              </div>
                              <div class="basic-information">
                                <h4>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Birthday:</span>
                                  <span class="birth-date"><?php echo "{$sessionUserDOB}" ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Gender:</span>
                                  <span class="gender"><?php echo "{$sessionUserGender}" ?></span>
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-title">
                  <h4>Recent Project </h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover ">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Kolor Tea Shirt For Man</td>
                          <td>
                            <span class="badge badge-primary">Ongoing</span>
                          </td>
                          <td>January 22</td>
                          <td class="color-primary">$21.56</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Women</td>
                          <td>
                            <span class="badge badge-success">Complete</span>
                          </td>
                          <td>January 30</td>
                          <td class="color-success">$55.32</td>
                        </tr>
                        <tr>
                          <td>Blue Backpack For Baby</td>
                          <td>
                            <span class="badge badge-danger">Rejected</span>
                          </td>
                          <td>January 25</td>
                          <td class="color-danger">$14.85</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Man</td>
                          <td>
                            <span class="badge badge-primary">Ongoing</span>
                          </td>
                          <td>January 22</td>
                          <td class="color-primary">$21.56</td>
                        </tr>
                        <tr>
                          <td>Kolor Tea Shirt For Women</td>
                          <td>
                            <span class="badge badge-success">Complete</span>
                          </td>
                          <td>January 30</td>
                          <td class="color-success">$55.32</td>
                        </tr>
                        <tr>
                          <td>Blue Backpack For Baby</td>
                          <td>
                            <span class="badge badge-danger">Rejected</span>
                          </td>
                          <td>January 25</td>
                          <td class="color-danger">$14.85</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-6">
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
  <script>
    document.querySelector('.edit-profile').children[0].addEventListener('click', (e) => {

      if (e.target.checked) {
        e.target.parentElement.classList.add('checked');
        document.querySelector('.user-profile').style.display = 'none';
        document.querySelector('#formEditUser').style.display = 'block';
      } else {
        e.target.parentElement.classList.remove('checked');
        document.querySelector('.user-profile').style.display = 'block';
        document.querySelector('#formEditUser').style.display = 'none';
      }

    })
  </script>

</body>

</html>