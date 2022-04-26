<?php
require_once('core/config/init.php');
if (!isset($_SESSION['user_id'])) {
    header("location:page-login.php");
} else {
    require_once('core/functions/changePasswordFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alin Thit</title>

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
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .login-form {
            background: transparent !important;
        }
    </style>
    <?php require_once('widgets/darkModeFun.php'); ?>
</head>

<body>

    <?php require_once('widgets/darkModeSwitch.php'); ?>

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Change Password</h4>
                            <?php require_once('widgets/errorInterface.php'); ?>
                            <form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="hidden" name='session_user_id' value="<?php echo $sessionUserId ?>" />
                                    <input type="password" name='current_password' class="form-control" placeholder="" required />
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name='new_password' class="form-control" placeholder="" required />
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" name='confirm_new_password' class="form-control" placeholder="" required />
                                </div>

                                <button type="submit" name='changePasswordBtn' class="btn btn-primary btn-flat m-b-15">Submit</button>
                                <div class="register-link text-center">
                                    <a href='index.php'><span>Back to Home</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>