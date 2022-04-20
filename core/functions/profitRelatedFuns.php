<?php

$dayCheckProfit = function ($date) use ($link) {
    $query = "SELECT * FROM `daily_profits` WHERE `date` = '{$date}'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    if ($finalizedResult > 0) {
        return true;
    } else {
        return false;
    }
};

$dailyProfitQuery = function ($date) use ($link) {

    $query = "SELECT * FROM `daily_profits` WHERE `date` = '{$date}'";
    $queryResult = mysqli_query($link, $query);
    return (mysqli_fetch_assoc($queryResult)['daily_profit']);
};

$totalProfitCalc = function ($isForm) use ($link) {

    $query = "SELECT `daily_profit` FROM `daily_profits`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $allDailyProfits[] = $row['daily_profit'];
    }
    if ($isForm === true) {
        return floatval(array_sum($allDailyProfits));
    } else {

        echo number_format(array_sum($allDailyProfits)) . " <span class='currency'>MMK</span>";
    }
};


$minMaxDate = function ($minOrMax, $tableName) use ($link) {

    $query = "SELECT * FROM `{$tableName}` WHERE `date` = (SELECT $minOrMax(date) FROM `{$tableName}`)";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return $finalizedResult;
};

$monthCheckProfit = function ($month) use ($link) {
    $query = "SELECT * FROM `monthly_profits` WHERE `month` = $month";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    if (!empty($finalizedResult['month'])) {
        return $finalizedResult['monthly_profit'];
    } else {
        return false;
    }
};

$getAllDailyProfitsByMonth = function ($month) use ($link) {

    $query = "SELECT * FROM `daily_profits` WHERE `month` = '{$month}'";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {

        $allDailyProfits[] = intval($row['daily_profit']);
    }
    return array_sum($allDailyProfits);
};

$getTodayProfit = function () use ($link) {
    $todayDate = date("Y-m-d");
    $query = "SELECT `daily_profit` FROM `daily_profits` WHERE `date` = '{$todayDate}'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult['daily_profit']);
};
