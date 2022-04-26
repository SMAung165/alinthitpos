<?php

$deleteDevice = function ($deviceId) use ($link, $deviceQuery) {

    $deviceId = (int)$deviceId;
    $deviceQuery = $deviceQuery($deviceId);
    if (!empty($deviceQuery['image'])) {

        unlink($deviceQuery['image']);
    }
    $query = "DELETE FROM `products` WHERE `products`.`product_id` = {$deviceId}";
    mysqli_query($link, $query);
    return true;
};
$isDeviceExistInOrders = function ($deviceId) use ($link) {

    $query = "SELECT * FROM `customerorder` WHERE `order_device_id` = '{$deviceId}'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    if ($finalizedResult > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $orderNumberArr[] = $row['order_number'];
        }
        return $orderNumberArr;
    } else {
        return false;
    }
};

if (isset($_POST['deleteDeviceBtn'])) {
    $isDeviceExistInOrders = $isDeviceExistInOrders($_POST['device_id']);

    if ($isDeviceExistInOrders === false) {
        $deleteDevice = $deleteDevice($_POST['product_id']);
    } else {
        $grammer = count($isDeviceExistInOrders) > 1 ? 'these order numbers : ' : 'this order number : ';
        $logs[] = "This device ({$_POST['device_id']}) is listed on {$grammer}" . '(' . implode(', ', $isDeviceExistInOrders) . ')';
    }

    if ($deleteDevice === true) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
    }
}
