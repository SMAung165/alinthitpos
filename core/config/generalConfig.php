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
        $initialStock = $row['stock'] + $row['total_sold'];
        $totalExpense = $row['expense'] * $initialStock;
        $totalRevenue = $row['price'] * $row['total_sold'];
        $profit = $totalRevenue - $totalExpense;
        $profitArr[] = $profit;
    }
    $totalProfit = number_format(array_sum($profitArr), 2) . ' MMK';
    echo ($totalProfit);
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
