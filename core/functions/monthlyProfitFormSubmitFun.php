<?php
$monthCheckProfitCurrentMonth = $monthCheckProfit(date('m'));
$monthlyProfit = $getAllDailyProfits();


if (date('m') === $minMaxDate('MAX', 'monthly_profits')['month']) {

    $month = date('m');
    $query = "UPDATE `monthly_profits` SET `monthly_profit` = {$monthlyProfit}  WHERE `month` = {$month}";
    mysqli_query($link, $query);
} else {
    if ($monthCheckProfitCurrentMonth === false) {



        $submitMonthlyProfit = function ($dataToInsert) use ($link, $sanatization) {
            array_walk($dataToInsert, $sanatization);
            $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
            $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
            $query =  "INSERT INTO `monthly_profits` ({$fieldNames}) VALUES ({$dataToInsert})";
            mysqli_query($link, $query);
            return true;
        };

        $dataToInsert = [
            'monthly_profit' => $monthlyProfit,
            'date' => date("Y-m-d"),
            'month' => date('m'),
        ];

        $submitMonthlyProfit = $submitMonthlyProfit($dataToInsert);
        if ($submitMonthlyProfit) {
            header("Location:index.php");
            exit();
        }
    }
}
