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
    <link rel='icon' href='assets/images/favicon.png' type="image/png">


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

<script>
    if (localStorage.getItem("theme") == null) {
        localStorage.setItem("theme", "light");
    }

    function setTheme() {
        if (localStorage.getItem("theme") == "dark") {
            var head = document.getElementsByTagName("HEAD")[0];
            var link = document.createElement("link");

            link.rel = "stylesheet";
            link.type = "text/css";
            link.href = "assets/css/darkMode.css";
            link.id = "theme";

            head.appendChild(link);
        } else {
            var head = document.getElementsByTagName("HEAD")[0];
            head.removeChild(document.getElementById("theme"));
        }
    }

    setTheme();
</script>

<body>
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
            <?php require_once('widgets/footer.php'); ?>
        </div>
    </div>

</body>

</html>