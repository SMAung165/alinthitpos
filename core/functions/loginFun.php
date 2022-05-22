<?php


if (isset($_POST['loginBtn'])) {
    if (!empty($_POST['username'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) or empty(trim($password))) {
            header("location:{$_SERVER['PHP_SELF']}");
        } else {
            if ($userExist($username) === false) {
                $logs[] =  '<span class="user-not-exist">Username does not exist.</span>';
            } else {
                if ($login($username, $password) === false) {
                    $logs[] = "<span class='wrong-pass'>Incorrect password</span>";
                } else {
                    if ($userActive($username) === false) {
                        $logs[] =  "<span class='hvnt-activate-acc'>You haven't activated your account</span>";
                    } else {
                        $loggedIn = $login($username, $password); //return user_id
                        $_SESSION['user_id'] = $loggedIn;

                        if (finalizedLoggedIn($_SESSION['user_id']) === true) {
                            header("location:/pos");
                        } else {
                            header("location:{$_SERVER['PHP_SELF']}");
                        }
                    }
                }
            }
        }
    } else {
        header("location:{$_SERVER['PHP_SELF']}");
    }
}
