<?php

if (isset($_POST['updateOrderBtn'])) {

    $dataToUpdateOrder = [];

    if ($_POST['status'] === 'Completed') {

        $overallStatus = 1;
    } else {
        $overallStatus = 0;
    }


    if ($_POST['payment_status'] === 'Paid') {

        $paymentStatus = 1;
    } else if ($_POST['payment_status'] === 'Pending') {

        $paymentStatus = 0;
    } else if ($_POST['payment_status'] === 'Cancelled') {

        $paymentStatus = 0;
        $paymentCancelled = 1;
        $dataToUpdateOrder += ['payment_cancelled' => $paymentCancelled];
    }

    $dataToUpdateOrder += ['status' => $overallStatus, 'payment_status' => $paymentStatus];

    $updateOrder = $updateOrder($dataToUpdateOrder, $_POST['order_id']);

    if ($updateOrder) {
        header("Location:customer-order.php?upSuccess");
        exit();
    }
}
