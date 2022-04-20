
<?php

if ($dayCheckProfit(date('Y-m-d')) === false) {

    $submitDailyProfit = function ($dataToInsert) use ($link, $sanatization) {
        array_walk($dataToInsert, $sanatization);
        $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
        $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
        $query =  "INSERT INTO `daily_profits` ({$fieldNames}) VALUES ({$dataToInsert})";
        mysqli_query($link, $query);
        return true;
    };
    $dataToInsert = [
        'daily_profit' => 0,
        'date' => date("Y-m-d"),
        'day' => date('d'),
        'month' => date('m'),
    ];
    $submitDailyProfit = $submitDailyProfit($dataToInsert);
    if ($submitDailyProfit) {
        header("Location:{$_SERVER['PHP_SELF']}");
        exit();
    }
}
