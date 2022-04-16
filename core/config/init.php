<?php
date_default_timezone_set('Asia/Yangon');
session_start();
$logs = [];
$outputLogs = function (array $logs) {
    foreach ($logs as $log) {
        echo "<span class='badge badge-danger'>{$log}</span>";
    }
};
require_once('databaseConnection.php');
require_once('sanatization.php');
require_once('userInit.php');
require_once('core/functions/loginFun.php');
require_once('core/functions/addAdminFun.php');
require_once('core/functions/addDeviceFun.php');

if (isset($_SESSION['user_id'])) {
    $sessionUserId = $_SESSION['user_id'];
    $getUserData = $getUserData($sessionUserId);
    $sessionUserName = $getUserData['username'];
    $sessionUserFirstName = $getUserData['first_name'];
    $sessionUserLastName = $getUserData['last_name'];
    $sessionUserEmail = $getUserData['email'];
    $sessionUserPassword = $getUserData['password'];
    $sessionUserRole = $getUserData['role'];
    $sessionUserActive = $getUserData['active'];
    $sessionUserProfileImage = $getUserData['profile_image'];
    $sessionUserPhoneNumber = $getUserData['phone_number'];
    $sessionUserAddress = $getUserData['address'];
    $sessionUserDOB = $getUserData['date_of_birth'];
    $sessionUserFacebook = $getUserData['facebook'];
    $sessionUserGender = $getUserData['gender'];
    $sessionUserPosition = $getUserData['position'];
    $sessionUserSpecialty = $getUserData['specialty'];
    $sessionUserGmaps = $getUserData['gmaps'];

    if ((bool)$sessionUserActive === false) {
        session_destroy();
        header('Location:core/functions/logout.php');
        exit();
    }
}
