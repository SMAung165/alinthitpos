
<?php
$dayilyTotalProfitYST = $dayCheckProfit(date('d', strtotime('-1 day')));
$dailyTotalProfitTDY = $totalProfitCalc(true);

$dayCheckProfitTDY = $dayCheckProfit(date('d'));
$dailyProfit = $dailyTotalProfitTDY - $dayilyTotalProfitYST;

if (date('Y-m-d') === $minMaxDate('MAX', 'daily_profits')['date']) {
    $day = date('d');
    $query = "UPDATE `daily_profits` SET `daily_profit` = {$dailyProfit},  `daily_total_profit`= {$dailyTotalProfitTDY} WHERE `day` = {$day}";
    mysqli_query($link, $query);
} else {
    if (($dayCheckProfitTDY === false)) {

        $submitDailyProfit = function ($dataToInsert) use ($link, $sanatization) {
            array_walk($dataToInsert, $sanatization);
            $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
            $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
            $query =  "INSERT INTO `daily_profits` ({$fieldNames}) VALUES ({$dataToInsert})";
            mysqli_query($link, $query);
            return true;
        };
        $dataToInsert = [
            'daily_profit' => $dailyProfit,
            'date' => date("Y-m-d"),
            'day' => date('d'),
        ];
        $submitDailyProfit = $submitDailyProfit($dataToInsert);
        if ($submitDailyProfit) {
            header("Location:index.php");
            exit();
        }
    }
}
