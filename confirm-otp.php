<?php
require_once('core/config/init.php');

if (!isset($_SESSION['recover_user_id'])) {
    header('location:page-login.php');
} else {
    require_once('core/functions/confirmOTPFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Widget</title>

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
    <!-- script -->

    <script src="assets/js/themeSetterFun.js"></script>

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-form card">
                            <h4>Enter OTP</h4>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <input name='OTP' class="form-control" placeholder="12345" />
                                </div>
                                <button type="submit" name='confirm_otp' class="btn btn-primary btn-flat m-b-15">Submit</button>
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
    <?php require_once('widgets/errorInterface.php') ?>
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

</body>

</html>