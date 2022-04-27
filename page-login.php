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
</head>

<body>


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

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Administratior Login</h4>
                            <center>
                                <span style="font-weight: bolder; color:red"><?php $outputLogs($logs) ?></span style="font-weight: bolder; color:red">
                            </center>
                            <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value='' placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value='' placeholder="Password" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                    <label class="pull-right">
                                        <a href="#">Forgotten Password?</a>
                                    </label>

                                </div>
                                <button type="submit" name="loginBtn" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>