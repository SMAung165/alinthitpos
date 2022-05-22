<?php

$isPasswordMatch = function ($sessionUserId, $currentPassword) use ($link) {
    $currentPassword = md5($currentPassword);
    $query =  "SELECT * FROM `users` WHERE `user_id` = $sessionUserId";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    if ($finalizedResult['password'] === $currentPassword) {
        return true;
    } else {
        return false;
    }
};

$changePassword = function ($userId, $newPassword) use ($link) {
    $newPassword = md5($newPassword);
    $query = "UPDATE `users` SET `password` = '$newPassword' WHERE `user_id` = $userId";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['changePasswordBtn'])) {
    $sessionUserId = $_POST['session_user_id'];
    $currentPassword = $sanatization($_POST['current_password']);
    $newPassword = $sanatization($_POST['new_password']);
    $confirmNewPassword = $sanatization($_POST['confirm_new_password']);
    $isPasswordMatch =  $isPasswordMatch($sessionUserId, $currentPassword);

    if ($isPasswordMatch === false) {
        $logs[] = "<span class='curr-pass-unmatch'>Current password do not match.</span>";
    } else {

        //Password error handling
        if (preg_match("/\\s/", $newPassword)) {
            $logs[] = '<span class="pass-cant-hv-space">Password must not contain spaces</span>';
        } else {
            if (strlen($newPassword) < 8) {
                $logs[] = '<span class="pass-hv-least-8">Password must be at least 8 characters</span>';
            } else {
                if ($confirmNewPassword !== $newPassword) {
                    $logs[] = '<span class="new-pass-unmatch">New password do not match</span>';
                } else {
                    if ($newPassword === $currentPassword) {
                        $logs[] = "<span class='new-pass-cant-b-old-pass'>New password must not be the same as current password</span>";
                    } else {
                        $changePassword = $changePassword($sessionUserId, $newPassword);
                    }
                }
            }
        }
    }

    if ($changePassword === true) {
        header("Location:{$_SERVER['PHP_SELF']}?passUp");
        exit();
    }
}

if (isset($_POST['changePasswordForgotBtn'])) {
    $userId = $_POST['user_id'];
    $newPassword = $sanatization($_POST['new_password']);
    $confirmNewPassword = $sanatization($_POST['confirm_new_password']);

    //Password error handling
    if (preg_match("/\\s/", $newPassword)) {
        $logs[] = '<span class="pass-cant-hv-space">Password must not contain spaces</span>';
    } else {
        if (strlen($newPassword) < 8) {
            $logs[] = '<span class="pass-hv-least-8">Password must be at least 8 characters</span>';
        } else {
            if ($confirmNewPassword !== $newPassword) {
                $logs[] = '<span class="new-pass-unmatch">New password do not match</span>';
            } else {
                $changePassword = $changePassword($userId, $newPassword);
            }
        }
    }

    if ($changePassword === true) {
        unset($_SESSION['recover_user_id']);
        header("location:page-login.php?passUp");
        exit();
    }
}
