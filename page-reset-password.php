<?php
require_once('core/config/init.php');
if (isset($_SESSION['user_id'])) {
    if (finalizedLoggedIn($_SESSION['user_id']) === true) {
        header("location:index.php");
    }
} else {
    require_once('core/functions/forgotPasswordFun.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Widget</title>
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

</head>

<body>

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-form card">
                            <h4>Forgot Password</h4>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name='recovery_email' class="form-control" placeholder="Email">
                                </div>
                                <button type="submit" name='forgot_password' class="btn btn-primary btn-flat m-b-15">Submit</button>
                                <div class="register-link text-center">
                                    <p>Back to <a href="page-login.php"> Home</a></p>
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