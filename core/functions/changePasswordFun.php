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

$changePassword = function ($sessionUserId, $newPassword) use ($link) {
    $newPassword = md5($newPassword);
    $query = "UPDATE `users` SET `password` = '$newPassword' WHERE `user_id` = $sessionUserId";
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
        $logs[] = "Current password do not match, try again!";
    } else {

        //Password error handling
        if (preg_match("/\\s/", $newPassword)) {
            $logs[] = 'Password must not contain spaces <br/><br/>';
        } else {
            if (strlen($newPassword) < 8) {
                $logs[] = 'Password must be at least 8 characters';
            } else {
                if ($confirmNewPassword !== $newPassword) {
                    $logs[] = 'New password do not match';
                } else {
                    if ($newPassword === $currentPassword) {
                        $logs[] = "New password must not be the same as current password";
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
