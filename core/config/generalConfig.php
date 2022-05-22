<?php

$logs = [];
$outputLogs = function ($logs) {
    for ($i = 0; $i < count($logs); $i++) {
        echo "<p class='text-muted mb-0 msg'>{$logs[$i]}</p>";
    }
};

$sanatization = function ($data) use ($link) {
    return mysqli_real_escape_string($link, $data);
};

/*
 * Remove the directory and its content (all files and subdirectories).
 * @param string $dir the directory name
 */
function rmrf($dir)
{
    foreach (glob($dir) as $file) {
        if (is_dir($file)) {
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
}

$getRowCount = function ($tableName) use ($link) {

    $query =  "SELECT * FROM `{$tableName}` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    return ($finalizedResult);
};

$modeSwitch = function ($darkmodeVal, $userId) use ($link, $sanatization) {
    $darkmodeVal = intval($sanatization($darkmodeVal));
    $userId = intval($sanatization($userId));
    echo $query =  "UPDATE `users` SET `dark_mode` = $darkmodeVal WHERE `user_id` = $userId";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['modeSwitchBtn']) or isset($_POST['dark_mode'])) {

    $userId = $_POST['user_id'];
    $darmodeVal = $_POST['dark_mode'];
    $modeSwitch = $modeSwitch($darmodeVal, $userId);

    if ($modeSwitch) {
        header("Location:{$_SERVER['PHP_SELF']}");
        exit();
    }
}

$verifyPassword = function ($sessionUserId, $currentAdminPass) use ($link, $sanatization) {
    $currentAdminPass = md5($sanatization($currentAdminPass));
    $query =  "SELECT * FROM `users` WHERE `user_id` = $sessionUserId";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return (($finalizedResult['password'] === $currentAdminPass) ? true : false);
};

function monthNameConvert($monthNum)
{
    $dateObj = DateTime::createFromFormat('!m', $monthNum);
    return $dateObj->format('F');
}

function monthNumberConvert($monthName)
{
    return date('m', strtotime("{$monthName}"));
}
