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


if (isset($_POST['deleteDeviceBtn'])) {

    $deleteDevice = $deleteDevice($_POST['product_id']);
    if ($deleteDevice) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
    }
}
