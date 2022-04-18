<?php
$totalProfitCalc = function ($isForm) use ($link) {

    $query = "SELECT `expense`, `price`, `total_sold`, `stock` FROM `products`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $profitPerOne = ($row['price'] - $row['expense']);
        $profit = ($profitPerOne * $row['total_sold']);
        $profitArr[] = $profit;
    }
    if ($isForm === true) {
        return floatval(array_sum($profitArr));
    } else {

        echo number_format(array_sum($profitArr), 2) . ' MMK';
    }
};


$dayCheckProfit = function ($day) use ($link) {
    $query = "SELECT * FROM `daily_profits` WHERE `day` = $day";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    if (!empty($finalizedResult['day'])) {
        return $finalizedResult['daily_total_profit'];
    } else {
        return false;
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

$getAllDailyProfits = function () use ($link) {

    $query = "SELECT * FROM `daily_profits`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $allDailyProfits[] = intval($row['daily_profit']);
    }

    return array_sum($allDailyProfits);
};
