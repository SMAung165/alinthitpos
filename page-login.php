<?php
require_once('core/config/init.php');
if (isset($_SESSION['user_id'])) {
    if (finalizedLoggedIn($_SESSION['user_id']) === true) {
        header("location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alin Thit Mobile</title>
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
    <style type="text/css">
        body {
            overflow-y: auto;
        }

        .login-form {
            background: transparent !important;
        }

        .logo-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .page-logo,
        .alinthit {
            margin: 0px 4px;
            display: inline-block;
        }

        .alinthit {
            line-height: 44px;
        }

        .page-logo {
            padding: 9px;
            border-radius: 40px;

            position: relative;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .page-logo::before {
            content: '';

            width: 100%;
            height: 100%;

            border-radius: 40px;
            border-left: 1px solid;
            border-color: cyan;

            position: absolute;
            top: 0;
            left: 0;

            animation: rotate 2s linear infinite;
        }

        .btn-success {
            background: linear-gradient(90deg, rgba(16, 195, 106, 1) 35%, rgba(0, 255, 214, 1) 100%) !important;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-10 mt-5">
                    <div class="logo-container">
                        <div class="page-logo"><img src="assets/images/favicon-144x144.png" width="35px" alt='alinthit' /></div>
                        <h3 class='alinthit text-muted'>အလင်းသစ်</h3>
                    </div>
                    <div class="login-content card p-0 mt-5">
                        <div class="login-form">
                            <h4 class='admin-login text-muted'>Administrator Login</h4>
                            <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post">
                                <div class="form-group">
                                    <label for="username" class="username text-muted">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="username" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="password" class="password text-muted">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off" />
                                </div>
                                <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="page-reset-password.php" class="forgotten-password text-info">Forgotten Password?</a>
                                    </label>

                                </div>
                                <button type="submit" name="loginBtn" class="btn btn-success btn-flat m-b-30 m-t-30 submit">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('widgets/errorInterface.php') ?>

    <!-- Language init -->
    <script type="text/javascript" src="assets/language/applyLanguage.js"></script>
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