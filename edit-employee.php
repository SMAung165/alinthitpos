<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/editEmployeeFun.php');
    $queryEmployee = $queryEmployee($_POST['employee_id']);
    //  if (!isset($_POST['employee_id'])) {
    //     header("location:page-login.php");
    //  } else {
    // require_once('core/functions/editEmployeeFun.php');
    // $queryEmployee = $queryEmployee($_POST['employee_id']);
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Employee</title>
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
                    <div class="col-lg-6 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span><?php echo "{$sessionUserFirstName} {$sessionUserLastName}"; ?></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style='display:inline' href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a style='display:inline' href="employee-list.php">Employee List</a></li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4><span class='edit-employee'>Edit Employee</span></h4>
                            </div>
                            <div class="card-body">

                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo "{$_POST['employee_id']}" ?>" name='employee_id' />
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label id='firstName'>First Name*</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="e.g., John" value='<?php echo "{$queryEmployee['first_name']}" ?>' required>
                                                </div>
                                                <div class="form-group">
                                                    <label id='lastName'>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" value='<?php echo "{$queryEmployee['last_name']}" ?>' placeholder="Doe">
                                                </div>
                                                <div class="form-group">
                                                    <label id='email'>Email</label>
                                                    <input id="example-email" class="form-control" type="text" name="email" value='<?php echo "{$queryEmployee['email']}" ?>' placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label id='phoneNumber'>Phone Number</label>
                                                    <input class="form-control" type="text" name="phone_number" value='<?php echo "{$queryEmployee['phone_number']}" ?>' placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label id='address'>Address</label><textarea class="form-control" type="text" name="address" style="height:235px"><?php echo "{$queryEmployee['address']}" ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label id='workLocation'>Work Location</label>
                                                    <textarea style='height:132px' class="form-control" type="text" name="work_location"><?php echo "{$queryEmployee['work_location']}" ?></textarea>
                                                </div>

                                            </div>
                                            <div class="col-lg-4">

                                                <div class="form-group">
                                                    <label id='gender'>Gender</label>
                                                    <select name='gender' class="form-control">

                                                        <?php if ($queryEmployee['gender'] === 'Male') { ?>
                                                            <option selected>Male</option>
                                                            <option>Female</option>
                                                        <?php } else { ?>
                                                            <option>Male</option>
                                                            <option selected>Female</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label id='dateOfBirth'>Date of Birth</label>
                                                    <input class="form-control" type="date" name="date_of_birth" value="<?php echo "{$queryEmployee['date_of_birth']}" ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label id='dateHired'>Date Hired</label>
                                                    <input class="form-control" type="date" name="date_hired" value="<?php echo "{$queryEmployee['date_hired']}" ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label id='position'>Position</label>
                                                    <input class="form-control" type="text" name="position" required placeholder="Web Developer" value="<?php echo "{$queryEmployee['position']}" ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label><span id='specialty'>Specialty</span> (<span id='skills'>Skills</span>)</label>
                                                    <textarea class="form-control" type="text" name="specialty" value="" placeholder="HTML, CSS, JavaScript"><?php echo "{$queryEmployee['specialty']}" ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input class="form-control" type="link" name="facebook" value="" placeholder="https://facebook.com/youraccount" value="<?php echo "{$queryEmployee['facebook']}" ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <div class="user-photo m-b-30">
                                                        <label for='image' class="customImageInput">
                                                            <span class="imageOverlay"><i class="ti-image"></i></span>
                                                            <img class="img-fluid" src="<?php $queryEmployeeImage = !file_exists($queryEmployee['image']) ? 'assets/images/user-profile.jpg' : $queryEmployee['image'];
                                                                                        echo $queryEmployeeImage ?>" alt="image" />
                                                            <input style="display: none;" type="file" name="file_image" id="image" />
                                                        </label>

                                                        <input name='image' value="<?php echo "{$queryEmployee['image']}" ?>" type="hidden" />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button id='submit' type="submit" class="btn btn-default" name="edit_employee_btn">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php require_once('widgets/footer.php'); ?>
                </section>
            </div>
        </div>
    </div>






    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->


    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/addEmployee.js"></script>
    <script type="text/javascript" src="assets/language/sidebar.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- Script init -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/myScript.js"></script>
    <!-- scripit init-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--myScript-->




</body>

</html>