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
        'order_number' => $_POST['order_number'],
        'order_customer_number' => $_POST['order_customer_number'],
        'order_device_id' => $_POST['order_device_id'],
        'quantity' => $_POST['quantity'],
        'order_date' => date('Y-m-d'),
    ];

    $isCustomerExist = $customerQueryByCustomerNumber($dataToInsert['order_customer_number'])['exist'];
    $isDeviceExist = $deviceQueryByDeviceId($dataToInsert['order_device_id'])['exist'];

    if (($isCustomerExist === true) and ($isDeviceExist === true)) {

        $productId = $deviceQueryByDeviceId($dataToInsert['order_device_id'])['product_id'];

        $initialStock = $deviceQueryByDeviceId($dataToInsert['order_device_id'])['initial_stock'];

        $stockLeft = $deviceQueryByDeviceId($dataToInsert['order_device_id'])['stock'];
        $stockToReduce = $stockLeft - $dataToInsert['quantity'];

        $totalSold = $deviceQueryByDeviceId($dataToInsert['order_device_id'])['total_sold'];
        $totalSoldToIncrease = $totalSold + $dataToInsert['quantity'];

        if ($initialStock > 0) {

            if ($stockLeft < $dataToInsert['quantity']) {
                $stockToReduce = abs($stockToReduce);
                $logs[] = "Quantity demanded exceed stock left by: {$stockToReduce}.";
            } else {

                $dataToUpdateDevice = [
                    'stock' => $stockToReduce,
                    'total_sold' => $totalSoldToIncrease,
                ];

                $updateDevice = $updateDevice($dataToUpdateDevice, $productId);
                $insertIntoDatabaseOrders = $insertIntoDatabaseOrders($dataToInsert);
            }
        } else {
            $logs[] = "There's no stock left in the warehouse.";
        }
    }
    if ($isCustomerExist === false) {
        $logs[] = "Customer Number: {$dataToInsert['order_customer_number']} does not exist!.";
    }
    if ($isDeviceExist === false) {
        $logs[] = "Device ID: {$dataToInsert['order_device_id']} does not exist!.";
    }
    if (($insertIntoDatabaseOrders === true) and ($updateDevice === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?inSuccess");
        exit();
    }
}
