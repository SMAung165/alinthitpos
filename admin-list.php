<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
  header("location:page-login.php");
} else {
  require_once('core/functions/adminStatusCtrlFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin List</title>

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
  <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">

  <link href="assets/css/lib/helper.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />
  <?php require_once('widgets/darkModeFun.php'); ?>
  <style type="text/css">
    .status {
      font-size: 0.9rem !important;
      transition: all 0.2s;
    }

    .status i {
      font-size: 0.7rem;
      margin-right: 6px;
    }

    .status:active {
      transform: scale(0.8);
    }
  </style>

</head>

<body>

  <?php require_once('widgets/darkModeSwitch.php'); ?>

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
                    <a href="#">Admin</a>
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
            <div class="col">
              <div class="card">
                <div class="card-title">
                  <h4>All admins </h4>
                  <center><span style="color:red"><?php
                                                  if (isset($_GET['failure'])) {
                                                    echo "<script>
                                                      //reloads the page  
                                                      window.alert('Must have at least one admin to be active!');
                                                      location.reload();
                                                      //send user back to account.php
                                                      location.href='{$_SERVER['PHP_SELF']}'
                                                     </script>";
                                                  }
                                                  ?></span></center>
                </div>
                <div class="bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Username</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $listUsers() ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>User ID</th>
                          <th>Username</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>
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




  <div id="search">
    <button type="button" class="close">×</button>
    <form>
      <input type="search" value="" placeholder="type keyword(s) here" />
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
  <!-- jquery vendor -->
  <script src="assets/js/lib/jquery.min.js"></script>
  <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>
  <script src="assets/js/scripts.js"></script>


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
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>