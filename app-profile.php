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

  <?php require_once('widgets/darkModeSwitch.php'); ?>
  <?php require_once('widgets/sideBar.php'); ?>
  <!-- /# sidebar -->

  <?php require_once('widgets/header.php'); ?>



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
          <?php require_once('widgets/errorInterface.php'); ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">

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
                          <h4 id='work'>Work</h4>
                          <div class="work-content">
                            <h3><?php echo "{$sessionUserPosition}" ?></h3>
                            <p>Alin Thit Mobile</p>
                            <p>Nyaungdon</p>
                          </div>
                        </div>
                        <div class="user-skill">
                          <h4><span class='specialty'></span> (<span class="skills"></span>)</h4>
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
                        <div class="user-job-title"><span class='text text-primary' id='admin'><?php echo "{$sessionUserRole}" ?></span></div>
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
                                  <span class="phone-number"><?php echo "{$sessionUserPhoneNumber}" ?></span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title"><span class="address"></span> : </span>
                                  <span class="mail-address"><?php echo "{$sessionUserAddress}" ?></span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title"><span class="email"></span> : </span>
                                  <span class="contact-email"><?php echo "{$sessionUserEmail}" ?></span>
                                </div>
                                <div class="facebook-content">
                                  <span class="contact-title"><span class="facebook">Facebook</span> : </span>
                                  <span class="contact-facebook"><a href="<?php echo "{$sessionUserFacebook}" ?>" target="blank"><?php echo "{$sessionUserName}" ?></a></span>
                                </div>
                              </div>
                              <div class="basic-information user-work" style="width: 100%;">
                                <h4 id='basicInfo'>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title"><span class='dateOfBirth'></span> : </span>
                                  <span class="birth-date"><?php echo "{$sessionUserDOB}" ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title"><span class="gender"></span> : </span>
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
  <script src="assets/language/myProfile.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script type="text/javascript">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- My Script -->
  <script src="assets/js/myScript.js"></script>
</body>

</html>