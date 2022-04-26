<?php

$logs = [];
$outputLogs = function (array $logs) {
    foreach ($logs as $log) {
        echo "<li style='margin:10px 0px'><span class='badge badge-danger'>{$log}</span></li>";
    }
};

$sanatization = function ($data) use ($link) {
    return mysqli_real_escape_string($link, $data);
};

$getRowCount = function ($tableName) use ($link) {

    $query =  "SELECT * FROM `{$tableName}` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    return ($finalizedResult);
};

function success()
{
    if (isset($_GET['inSuccess'])) {
        echo "<span class='badge badge-success'>Data inserted successfully!</span>";
    }
    if (isset($_GET['upSuccess'])) {
        echo "<span class='badge badge-success'>Data updated successfully!</span>";
    }
    if (isset($_GET['delSuccess'])) {
        echo "<span class='badge badge-success'>Successfully deleted!</span>";
    }
    if (isset($_GET['passUp'])) {
        echo "<span class='badge badge-success'>Password updated successfully!</span>";
    }
}


$modeSwitch = function ($darkmodeVal, $userId) use ($link, $sanatization) {
    $darkmodeVal = intval($sanatization($darkmodeVal));
    $userId = intval($sanatization($userId));
    echo $query =  "UPDATE `users` SET `dark_mode` = $darkmodeVal WHERE `user_id` = $userId";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['modeSwitchBtn'])) {

    $userId = $_POST['user_id'];
    $darmodeVal = $_POST['dark_mode'];
    $modeSwitch = $modeSwitch($darmodeVal, $userId);

    if ($modeSwitch) {
        header("Location:{$_SERVER['PHP_SELF']}");
        exit();
    }
}
