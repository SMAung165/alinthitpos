<?php

$deleteAdmin = function ($userId) use ($link) {

    $userId = intval($userId);
    $query = "DELETE FROM `users` WHERE `user_id` = {$userId}";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['confirmBtn'])) {

    if (empty($_POST['delete_confirmation_password'])) {
        $logs[] = 'Please enter your password!';
    } else {
        $currentAdminPass = $_POST['delete_confirmation_password'];
        $verifyPassword = $verifyPassword($sessionUserId, $currentAdminPass);
        if ($verifyPassword === true) {
            $userId = $_POST['user_id'];
            if ($userId !== $sessionUserId) {
                $deleteAdmin =  $deleteAdmin($userId);
            } else {
                $logs[] = "You can't delete the account you are using!";
            }
        } else {
            $logs[] = "Password is incorrect!";
        }
    }

    if (($deleteAdmin === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
