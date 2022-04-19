<?php

$deleteOrder = function ($orderId) use ($link) {

    $orderId = intval($orderId);
    $query = "DELETE FROM `customerorder` WHERE `order_id` = {$orderId}";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['deleteOrderBtn'])) {

    $orderId = $_POST['order_id'];

    if ($getOrderDetails($orderId)['status'] == 1) {
        $deleteOrder = $deleteOrder($orderId);
    } else {
        $logs[] = "Status must be completed before deleting the order";
    }

    if (($deleteOrder === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
