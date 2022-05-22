<?php

$deleteAdmin = function ($userId) use ($link) {

    $userId = intval($userId);
    $query = "DELETE FROM `users` WHERE `user_id` = {$userId}";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['confirmBtn'])) {

    if (empty($_POST['delete_confirmation_password'])) {
        $logs[] = "<span class='pls-enter-pass'>Please enter your password!</span>";
    } else {
        $currentAdminPass = $_POST['delete_confirmation_password'];
        $verifyPassword = $verifyPassword($sessionUserId, $currentAdminPass);
        if ($verifyPassword === true) {
            $userId = $_POST['user_id'];
            if ($userId !== $sessionUserId) {
                $deleteAdmin =  $deleteAdmin($userId);
            } else {
                $logs[] = "<span class='cant-del-acc-using'>You can't delete the account you are using!</span>";
            }
        } else {
            $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
        }
    }

    if (($deleteAdmin === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
