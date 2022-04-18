<?php

$insertIntoDatabaseOrders = function ($dataToInsert) use ($link, $sanatization) {

    array_walk($dataToInsert, $sanatization);
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `customerorder` ({$fieldNames}) VALUES ({$dataToInsert})";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['addOrderBtn'])) {

    $dataToInsert = [
        'order_customer_number' => $_POST['order_customer_number'],
        'order_device_id' => $_POST['order_device_id'],
        'quantity' => $_POST['quantity'],
        'order_date' => date('Y-m-d'),
    ];

    $insertIntoDatabaseOrders = $insertIntoDatabaseOrders($dataToInsert);

    if ($insertIntoDatabaseOrders) {
        header("Location:{$_SERVER['PHP_SELF']}?inSuccess");
        exit();
    }
}
