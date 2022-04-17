<?php

$logs = [];
$outputLogs = function (array $logs) {
    foreach ($logs as $log) {
        echo "<span class='badge badge-danger'>{$log}</span>";
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

$totalProfitCalc = function () use ($link) {

    $query = "SELECT `expense`, `price`, `total_sold`, `stock` FROM `products`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $profitPerOne = ($row['price'] - $row['expense']);
        $profit = ($profitPerOne * $row['total_sold']);
        $profitArr[] = $profit;
    }
    $totalProfit = number_format(array_sum($profitArr), 2) . ' MMK';
    echo ($totalProfit);
};

$totalDeviceSoldOrCurrentAsset = function ($columName) use ($link) {

    $query = "SELECT `{$columName}` FROM `products`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $totalDevice[] = $row[$columName];
    }
    echo (number_format(array_sum($totalDevice)) . ' PCS');
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
