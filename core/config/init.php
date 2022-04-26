<?php
date_default_timezone_set('Asia/Yangon');
session_start();

require_once('databaseConnection.php');
require_once('generalConfig.php');
require_once('core/functions/compactNumberFormatterFun.php');
require_once('core/functions/userRelatedFuns.php');
require_once('core/functions/loginFun.php');
require_once('core/functions/deviceRelatedFuns.php');
require_once('core/functions/orderRelatedFuns.php');
require_once('core/functions/customerRelatedFuns.php');
require_once('core/functions/profitRelatedFuns.php');
require_once('core/functions/monthlyProfitFormSubmitFun.php');
require_once('core/functions/dailyProfitFormSubmitFun.php');

if (isset($_SESSION['user_id'])) {
    $sessionUserId = $_SESSION['user_id'];
    $getSessionUserData = $getUserData($sessionUserId);
    $sessionUserName = $getSessionUserData['username'];
    $sessionUserFirstName = $getSessionUserData['first_name'];
    $sessionUserLastName = $getSessionUserData['last_name'];
    $sessionUserEmail = $getSessionUserData['email'];
    $sessionUserPassword = $getSessionUserData['password'];
    $sessionUserRole = $getSessionUserData['role'];
    $sessionUserActive = $getSessionUserData['active'];
    $sessionUserProfileImage = $getSessionUserData['profile_image'];
    $sessionUserPhoneNumber = $getSessionUserData['phone_number'];
    $sessionUserAddress = $getSessionUserData['address'];
    $sessionUserDOB = $getSessionUserData['date_of_birth'];
    $sessionUserFacebook = $getSessionUserData['facebook'];
    $sessionUserGender = $getSessionUserData['gender'];
    $sessionUserPosition = $getSessionUserData['position'];
    $sessionUserSpecialty = $getSessionUserData['specialty'];
    $sessionUserGmaps = $getSessionUserData['gmaps'];
    $sessionUserDarkMode = $getSessionUserData['dark_mode'];


    if ((bool)$sessionUserActive === false) {
        session_destroy();
        header('Location:core/functions/logout.php');
        exit();
    }
}
