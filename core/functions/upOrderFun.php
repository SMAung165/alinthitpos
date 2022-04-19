<?php

$updateOrder = function ($dataToUpdateOrder, $orderId) use ($link, $sanatization) {

    array_walk($dataToUpdateOrder, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateOrder as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `customerorder` SET {$dataToUpString} WHERE `order_id` = $orderId";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['updateOrderBtn'])) {

    $dataToUpdateOrder = [];

    if ($_POST['status'] === 'Completed') {

        $overallStatus = 1;
    } else {
        $overallStatus = 0;
    }


    if ($_POST['payment_status'] === 'Paid') {
        $paymentStatus = 1;
        $paymentCancelled = 0;
        $dataToUpdateOrder += ['payment_cancelled' => $paymentCancelled];
    } else if ($_POST['payment_status'] === 'Pending') {
        $paymentStatus = 0;
        $paymentCancelled = 0;
        $dataToUpdateOrder += ['payment_cancelled' => $paymentCancelled];
    } else if ($_POST['payment_status'] === 'Cancelled') {

        $paymentStatus = 0;
        $paymentCancelled = 1;
        $dataToUpdateOrder += ['payment_cancelled' => $paymentCancelled];
    }

    $dataToUpdateOrder += ['status' => $overallStatus, 'payment_status' => $paymentStatus];
    $orderId = $_POST['order_id'];
    $productId = $getOrderDetails($orderId)['product_id'];

    if (($getOrderDetails($orderId)['payment_status'] == 0) and ($dataToUpdateOrder['payment_status'] == 1)) {

        $dataToUpdateOrder['status'] = 1;
    }

    if (($getOrderDetails($orderId)['payment_status'] == 0) and ($dataToUpdateOrder['payment_status'] == 0)) {

        $dataToUpdateOrder['status'] = 0;
    }

    if (($getOrderDetails($orderId)['payment_cancelled'] == 0) and ($dataToUpdateOrder['payment_cancelled'] == 1)) {

        $stockLeftToIncrease = $getOrderDetails($orderId)['stock'] + $getOrderDetails($orderId)['quantity'];
        $totalSoldToReduce = $getOrderDetails($orderId)['total_sold'] - $getOrderDetails($orderId)['quantity'];

        $dataToUpdateDevice = [
            'stock' => $stockLeftToIncrease,
            'total_sold' => $totalSoldToReduce,
        ];

        $updateDevice = $updateDevice($dataToUpdateDevice, $productId);
        $dataToUpdateOrder['status'] = 1;
    }

    $updateOrder = $updateOrder($dataToUpdateOrder, $orderId);

    if ((($updateOrder === true) and ($updateDevice === true)) or (($updateOrder === true) or ($updateDevice === true))) {
        header("Location:manage-order.php?upSuccess");
        exit();
    }
}
