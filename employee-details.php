<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['employee_id'])) {
  header("location:page-login.php");
} else {
  $queryEmployee = $queryEmployee($_POST['employee_id']);
  $createEmptyRowSalary($_POST['employee_id'], date('m'), date('Y'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Employee Details</title>
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


  <!-- Styles -->
  <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
  <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/lib/helper.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/lib/data-table-responsive/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="assets/css/lib/data-table-responsive/responsive.dataTables.min.css" rel="stylesheet" />
  <link href="assets/css/lib/data-table-responsive/rowGroup.dataTables.min.css" rel="stylesheet" />

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
          <div class="col-lg-5 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
                <h1>Hello,
                  <span>Welcome Here</span>
                </h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-7 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#" style="display: inline;">Employee and Salary</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="employee-list.php" style="display: inline;">Employee List</a>
                  </li>
                  <li class="breadcrumb-item active">
                    <a class="pageTitle" style="display:inline;" href="#"></a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <?php require_once('widgets/errorInterface.php'); ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">

                    <div class="row">

                      <div class="col-lg-3">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?php echo "{$queryEmployee['image']}" ?>" alt="" />
                        </div>
                        <div class="user-work">
                          <h4 class='work'>Work</h4>
                          <div class="work-content">
                            <b class='work-location'>Work Location</b> :
                            <span><?php echo ($queryEmployee['work_location']) ?></span>
                            <br /><br />
                            <b class='work-position'>Work Position</b> :
                            <span><?php echo "{$queryEmployee['position']}" ?></span>
                            <br /><br />
                            <p class="text text-info"><?php echo $queryEmployee['date_hired'] ?></p>
                          </div>
                        </div>
                        <div class="user-skill">
                          <h4><span class='specialty'>Specialty</span> (<span class="skills">Skills</span>)</h4>
                          <ul>
                            <?php $outPutSessionUserSpecialty($queryEmployee['specialty']); ?>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="user-profile-name"><?php echo "{$queryEmployee['first_name']} {$queryEmployee['last_name']} " ?></div>

                        <div class="user-job-title"><span class='text text-primary' class='admin'><?php echo "{$queryEmployee['role']}" ?></span></div>
                        <div class="custom-tab user-profile-tab">
                          <div class="user-work" style="width: 100%;">
                            <h4 class='about'>About</h4>
                          </div>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4 class='contact-info'>Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title"><span class='phone-number'>Phone Number</span> : </span>
                                  <span class="phone-number"><?php echo "{$queryEmployee['phone_number']}" ?></span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title"><span class="address">Address</span> : </span>
                                  <span class="mail-address"><?php echo "{$queryEmployee['address']}" ?></span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title"><span class="email">Email</span> : </span>
                                  <span class="contact-email"><?php echo "{$queryEmployee['email']}" ?></span>
                                </div>
                                <div class="facebook-content">
                                  <span class="contact-title"><span class="facebook">Facebook</span> : </span>
                                  <span class="contact-facebook"><a class='text-secondary font-weight-bold' href="<?php echo "{$queryEmployee['facebook']}" ?>" target="blank"><?php echo "{$queryEmployee['first_name']} {$queryEmployee['last_name']} " ?></a></span>
                                </div>
                              </div>
                              <div class="basic-information user-work" style="width: 100%;">
                                <h4 class='basic-info'>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title"><span class='date-of-birth'>Date of Birth</span> : </span>
                                  <span class="birth-date"><?php echo "{$queryEmployee['date_of_birth']}" ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title"><span class="gender">Gender</span> : </span>
                                  <span><?php echo "{$queryEmployee['gender']}" ?></span>
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
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-title">
                  <h4 class='salary-payments'>Salary Payments</h4>
                </div>
                <div class="card-body bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd" style="text-align: center;width:100%;">
                      <thead>
                        <tr>
                          <th class='employee-name'>Employee Name</th>
                          <th class='salary-month'>Month</th>
                          <th class='basic-salary'>Basic Salary</th>
                          <th class='salary-bonus'>Salary Bonus</th>
                          <th class='total-salary'>Total Salary</th>
                          <th class='payment-date'>Payment Date</th>
                          <th style="text-align: center;" class='salary-status'>Salary Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $querySalaryByEmId($_POST['employee_id']) ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# column -->
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
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>
  <script src="assets/js/lib/bootstrap.min.js"></script>

  <!-- Language init -->
  <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
  <script type="text/javascript" src="assets/js/setLang.js"></script>

  <!-- scripit init-->
  <script src="assets/js/scripts.js"></script>

  <!-- Datatables -->
  <script type="text/javascript" src="assets/js/lib/data-table-responsive/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/lib/data-table-responsive/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="assets/js/lib/data-table-responsive/dataTables.rowGroup.min.js"></script>
  <script src="assets/js/lib/data-table/datatables-init.js"></script>

  <!-- Fontawesome-->
  <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>


  <!-- Extra Script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        responsive: true,
      });
    });
  </script>


  <!-- PWA  -->
  <script src="assets/js/app.js"></script>
</body>

</html>