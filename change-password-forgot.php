<?php
require_once('core/config/init.php');
if (!isset($_SESSION['recover_user_id'])) {
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
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .login-form {
            background: transparent !important;
        }
    </style>
</head>


<body>
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4 class="change-password">Change Password</h4>
                            <form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <label class="new-password">New Password</label>
                                    <input type="hidden" name='user_id' value="<?php echo $_SESSION['recover_user_id'] ?>" />
                                    <input type="password" name='new_password' class="form-control" placeholder="" required />
                                </div>

                                <div class="form-group">
                                    <label class="confirm-new-password">Confirm New Password</label>
                                    <input type="password" name='confirm_new_password' class="form-control" placeholder="" required />
                                </div>
                                <button type="submit" name='changePasswordForgotBtn' class="btn btn-primary btn-flat m-b-15 submit">Submit</button>
                                <div class="register-link text-center">
                                    <a href='index.php'><span>Back to Home</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('widgets/footer.php'); ?>
        </div>
    </div>
    <?php require_once('widgets/errorInterface.php'); ?>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/changePasswordForgot.js"></script>
    <script type="text/javascript" src="assets/js/setLang.js"></script>

    <!-- Extra Script -->
    <script type="text/javascript">
        function closeNotice(e) {
            e.target.parentElement.parentElement.style.display = "none";
            const url = window.location.href.toString();
            if (url.includes("?") === true) {
                window.location.href = url.split("?")[0];
            } else if (url.includes("#") === true) {
                window.location.href = url.split("#")[0];
            }
        }
    </script>

    <!-- PWA  -->
    <script src="assets/js/app.js"></script>

</body>

</html>