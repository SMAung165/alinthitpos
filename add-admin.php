<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    if ($sessionUserRole !== 'Admin') {
        header("location:page-login.php");
    } else {
        require_once('core/functions/addAdminFun.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Admin</title>
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
                                        <a href="#" style="display: inline;">Admin</a>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4 class='add-admin'>Add Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label><span class='username'></span>*</label>
                                                    <input type="text" name="username" class="form-control" placeholder="johndoe123" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='firstname'></span>*</label>
                                                    <input class="form-control" type="text" name="first_name" placeholder="John" name="example-email">
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='lastname'></span></label>
                                                    <input class="form-control" type="text" name="last_name" placeholder="Doe" name="example-email">
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='email'></span>*</label>
                                                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com" name="example-email" required>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Password*</label>
                                                    <input class="form-control" type="password" name="password" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='confirm-password'></span>*</label>
                                                    <input class="form-control" type="password" name="confirm_password" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='admin-role'></span></label>
                                                    <select class="form-control" name="role">
                                                        <option>Admin</option>
                                                        <option selected>Sale Staff</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><span class='account-status'></span></label>
                                                    <select class="form-control" name="active">
                                                        <option value="1">Activate</option>
                                                        <option value="0" selected>Deactivate</option>
                                                    </select>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" class="btn btn-default" name="registerBtn"><span class='submit'>Submit</span></button>
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

    <!-- nano scroller -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>

    <!-- sidebar -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>

    <!-- bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- Script init -->
    <script src="assets/js/scripts.js"></script>

    <!-- Fontawesome-->
    <script type="text/javascript" src="assets/js/lib/font-awesome/all.min.js"></script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>


</body>

</html>