<?php

$confirmOTP = function ($userId, $OTP) use ($link, $sanatization) {

    $userId = intval($sanatization($userId));
    $OTP = intval($sanatization($OTP));
    $query = "SELECT `OTP` FROM `users` WHERE `user_id` = {$userId}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_assoc($queryResult)['OTP'];
    return ($finalizedResult == $OTP) ? true : false;
};

if (isset($_POST['confirm_otp'])) {

    $confirmOTP = $confirmOTP($_SESSION['recover_user_id'], $_POST['OTP']);
    if ($confirmOTP === true) {
        header("location:change-password-forgot.php");
    } else {
        $logs[] = "<span class='wrong-otp'>OTP is incorrect.</span>";
    }
}
