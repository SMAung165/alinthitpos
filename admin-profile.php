<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id']) or !isset($_POST['user_id'])) {
  header("location:page-login.php");
} else {
  $getAdminData = $getUserData($_POST['user_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo "{$getAdminData['first_name']} {$getAdminData['last_name']}" ?></title>
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
                    <a style='display:inline' href="admin-list.php">Admin List</a>
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
          <?php require_once('widgets/errorInterface.php'); ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?php echo "{$getAdminData['profile_image']}" ?>" alt="" />
                        </div>
                        <div class="user-work">
                          <h4 id='work'>Work</h4>
                          <div class="work-content">
                            <h3><?php echo "{$getAdminData['position']}" ?></h3>
                            <p>Alin Thit Mobile</p>
                            <p>Nyaungdon</p>
                          </div>
                        </div>
                        <div class="user-skill">
                          <h4><span class='specialty'></span> (<span class="skills"></span>)</h4>
                          <ul>
                            <?php $outPutSessionUserSpecialty($getAdminData['specialty']); ?>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="user-profile-name"><?php echo "{$getAdminData['first_name']} {$getAdminData['last_name']}" ?></div>
                        <div class="user-Location">
                          <a href="<?php echo "{$getAdminData['gmaps']}" ?>" target='blank'> <i class="ti-location-pin"></i> <?php echo "{$getAdminData['address']}" ?></a>
                        </div>
                        <div class="user-job-title"><span class='text text-primary' id='admin'><?php echo "{$getAdminData['role']}" ?></span></div>
                        <div class="custom-tab user-profile-tab">
                          <div class="user-work" style="width: 100%;">
                            <h4 id='about'>About</h4>
                          </div>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4 id='contactInfo'>Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title"><span class='phoneNumber'></span> : </span>
                                  <span class="phone-number"><?php echo "{$getAdminData['phone_number']}" ?></span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title"><span class="address"></span> : </span>
                                  <span class="mail-address"><?php echo "{$getAdminData['address']}" ?></span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title"><span class="email"></span> : </span>
                                  <span class="contact-email"><?php echo "{$getAdminData['email']}" ?></span>
                                </div>
                                <div class="facebook-content">
                                  <span class="contact-title"><span class="facebook">Facebook</span> : </span>
                                  <span class="contact-facebook"><a href="<?php echo "{$getAdminData['facebook']}" ?>" target="blank"><?php echo "{$getAdminData['username']}" ?></a></span>
                                </div>
                              </div>
                              <div class="basic-information user-work" style="width: 100%;">
                                <h4 id='basicInfo'>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title"><span class='dateOfBirth'></span> : </span>
                                  <span class="birth-date"><?php echo "{$getAdminData['date_of_birth']}" ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title"><span class="gender"></span> : </span>
                                  <span class="gender"><?php echo "{$getAdminData['gender']}" ?></span>
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
  <script src="assets/js/lib/menubar/sidebar.js"></script>
  <script src="assets/js/lib/preloader/pace.min.js"></script>
  <script src="assets/js/lib/bootstrap.min.js"></script>

  <!-- Language init -->
  <script type="text/javascript" src="assets/language/adminProfile.js"></script>
  <script type="text/javascript" src="assets/language/sidebar.js"></script>
  <script type="text/javascript" src="assets/js/setLang.js"></script>

  <!-- scripit init-->
  <script src="assets/js/scripts.js"></script>

  <!-- Fontawesome-->
  <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

  <!-- PWA  -->
  <script src="assets/js/app.js"></script>
</body>

</html>