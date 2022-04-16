<?php


if (isset($_POST['loginBtn'])) {
    if (!empty($_POST['username'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) or empty(trim($password))) {
            header("location:{$_SERVER['PHP_SELF']}");
        } else {
            if ($userExist($username) === false) {
                $logs[] =  'Username does not exist.';
            } else {
                if ($login($username, $password) === false) {
                    $logs[] = "Incorrect password";
                } else {
                    if ($userActive($username) === false) {
                        $logs[] =  "You haven't activated your account";
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
