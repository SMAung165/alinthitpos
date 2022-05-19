<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
  header("location:page-login.php");
} else {
  if ($sessionUserRole !== 'Admin') {
    header("location:page-login.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Employee List</title>
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
  <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/lib/helper.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/rowgroup/1.1.4/css/rowGroup.dataTables.min.css" rel="stylesheet" />

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
                    <a href="index.php" style="display: inline;">Dashboard</a>
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
                  <h4 class="employee-list">Employee List</h4>
                </div>
                <div class="bootstrap-data-table-panel">
                  <div class="table-responsive">
                    <table id="myDataTable" class="display table table-borderd table-hover" style="width: 100%;text-align: center;">
                      <thead>
                        <tr>
                          <th><span class='firstname'>First Name</span></th>
                          <th><span class="lastname">Last Name</span></th>
                          <th><span class='email'>Email</span></th>
                          <th><span class='phone'>Phone Number</span></th>
                          <th><span class='salary-month'>Salary Month</span></th>
                          <th><span class='salary-status'>Salary Status</span></th>
                          <th style="text-align: center;"><span>Action</span></th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $listEmployees() ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th><span class='firstname'>First Name</span></th>
                          <th><span class="lastname">Last Name</span></th>
                          <th><span class='email'>Email</span></th>
                          <th><span class='phone'>Phone Number</span></th>
                          <th><span class='salary-month'>Salary Month</span></th>
                          <th><span class='salary-status'>Salary Status</span></th>
                          <th style="text-align: center;"><span>Action</span></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php require_once('widgets/footer.php'); ?>
        </section>
      </div>
    </div>
  </div>

  <?php require_once('widgets/errorInterface.php') ?>

  <!-- jquery vendor -->
  <script src=" assets/js/lib/jquery.min.js">
  </script>
  <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>

  <!-- bootstrap -->
  <script src="assets/js/lib/bootstrap.min.js"></script>

  <!-- Fontawesom -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Language init -->
  <script type="text/javascript" src="assets/language/employeeList.js"></script>
  <script type="text/javascript" src="assets/language/sidebar.js"></script>
  <script type="text/javascript" src="assets/js/setLang.js"></script>

  <!-- scripit init-->
  <script src="assets/js/scripts.js"></script>

  <!-- datatables-->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/rowgroup/1.1.4/js/dataTables.rowGroup.min.js"></script>
  <script src="assets/js/lib/data-table/datatables-init.js"></script>

  <!-- Extra Script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myDataTable').DataTable({
        responsive: true,
      });
    });

    document.querySelectorAll('.employee-tr').forEach(element => {
      for (i = 1; i < element.children.length - 1; i++) {
        element.children[i].addEventListener('click', (e) => {
          e.target.parentElement.children[0].children[0].submit();
        });
      }
    })
  </script>


</body>

</html>