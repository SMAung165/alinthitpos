<?php

$findMaxValueOfOrderNumber = function () use ($link) {

    $query = "SELECT `order_number` FROM `customerorder` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_all($queryResult);
    if (!empty($finalizedResult)) {
        $allOrderNumber = filter_var_array($finalizedResult, FILTER_SANITIZE_NUMBER_INT);
        $allOrderNumber = array_map('intval', call_user_func_array('array_merge', $allOrderNumber));
        $maxOrderNumberValue = max($allOrderNumber);
        return [$maxOrderNumberValue, $allOrderNumber];
    } else {
        return 0;
    }
};

$customerNumberAssignment = function ($orderCount, $findMaxValueOfOrderNumber) {

    if ($orderCount < $findMaxValueOfOrderNumber[0]) {
        $range = range(1, $orderCount + 1);
        $orderNumberArray = $findMaxValueOfOrderNumber[1];
        $missingOrderNumber = array_diff($range, $orderNumberArray);
        return (min($missingOrderNumber));
    } else {

        return ($orderCount + 1);
    }
};
$nextOrderNumber = 'OR' . $customerNumberAssignment($getRowCount('customerorder'), $findMaxValueOfOrderNumber());

$orderQuery = function ($pageTitle, $deviceId) use ($link) {

    if ($pageTitle === 'customer-order') {
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number`";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $price = number_format($row['price']) . ' MMK';
            $totalPrice = number_format(($row['price'] * $row['quantity'])) . ' MMK';
            $status = (bool)$row['status'] ? "<span class='badge badge-success'>Completed</span>" : "<span class='badge badge-warning'>Pending</span>";
            if ((bool)$row['payment_status'] === false) {
                if ((bool)$row['payment_cancelled'] === true) {
                    $paymentStatus = "<span class='badge badge-danger'>Cancelled</span>";
                    $invoice = null;
                } else {
                    $paymentStatus = "<span class='badge badge-warning'>Pending</span>";
                    $invoice = null;
                }
            } else {
                $paymentStatus = "<span class='badge badge-success'>Paid</span>";
                $invoice = "<li>
                                <form action='invoice.php' method='post'>
                                    <input type='hidden' name='order_id' value='{$row['order_id']}' />
                                        <button type='submit' name='invoiceBtn'>
                                            <i class='ti-receipt'></i>
                                            Invoice
                                        </button>
                                </form>
                            </li>";
            }



            echo "
                <tr>
                    
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['order_number']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$price}</td>
                    <td>{$row['quantity']} PCS</td>
                    <td>{$totalPrice}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$status}</td>
                    <td>{$paymentStatus}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown'>
                                <span style=''>Action</span>
                                <span style='' class='caret'></span></button>
                            <ul class='dropdown-menu myActionDropDown'>
                                <li>
                                    <form action='order-details.php' method='post'>
                                        <input type='hidden' name='order_id' value='{$row['order_id']}' />
                                        <button type='submit' name='orderDetailsBtn'>
                                            <i class='ti-file'></i> 
                                            Details
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form action='edit-order.php' method='post'>
                                        <input type='hidden' name='order_id' value='{$row['order_id']}' />
                                        <button type='submit' name='editOrderBtn'>
                                            <i class='ti-pencil-alt'></i> 
                                            Edit
                                        </button>
                                    </form>
                                </li>
                                {$invoice}
                                <li>
                                    <form action='{$_SERVER['PHP_SELF']}' method='post'>
                                        <input type='hidden' name='order_id' value='{$row['order_id']}' />
                                            <button type='submit' name='deleteOrderBtn'>
                                                <i class='ti-trash'></i>
                                                Delete
                                            </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
        }
    } else if ($pageTitle === 'device-details') {
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number` WHERE `device_id` = '{$deviceId}'";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $price = number_format($row['price']) . ' MMK';
            $totalPrice = number_format(($row['price'] * $row['quantity'])) . ' MMK';
            if ($row['payment_cancelled'] == 1) {
                $status = "<button type='submit' class='btn badge btn-danger'>Cancelled</button>";
            }
            if ($row['payment_status'] == 1) {

                $status = "<button type='submit' class='btn badge btn-success'>Paid</button>";
            } else if (($row['status'] == 0) and ($row['payment_status'] == 0) and ($row['payment_cancelled'] == 0)) {
                $status = "<button type='submit' class='btn badge btn-warning'>Pending</button>";
            }
            if ($row['gender'] === 'Male') {
                $gender = 'Mr. ';
            } else if ($row['gender'] === 'Female') {
                $gender = 'Ms. ';
            } else {
                $gender = '';
            }

            echo "

                <tr class='customerTr'>
                    <form method='post' action='order-details.php' class='recentBuyersForm'>
                        <td><a href='#' class='recentByrFormSubmit'>$gender{$row['first_name']} {$row['last_name']}</a></td>
                        <td>{$row['order_date']}</td>
                        <td>{$row['quantity']}</td>
                        <td class='color-primary'>{$totalPrice}</td>
                        <td>

                                <input type='hidden' name='order_id' value='{$row['order_id']}'/>
                                {$status}
                            
                        </td>
                    </form>
                </tr>

                ";
        }
    }
};

$getOrderDetails = function ($orderId) use ($link) {

    $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number` WHERE `order_id` = {$orderId}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_assoc($queryResult);
    return $finalizedResult;
};

$expectToEarn = function () use ($link) {

    $query = "SELECT * FROM `customerorder` WHERE `status` = 0 ";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $finalizedResult[] = $row['order_profit'];
    }
    if (!empty($finalizedResult)) {
        return ['count' => count($finalizedResult), 'total_profit' => array_sum($finalizedResult)];
    } else {
        return ['count' => 0, 'total_profit' => 0];
    }
};

$orderStatus = function ($orderId) use ($link) {

    $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number` WHERE `order_id`= '{$orderId}'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    $status = (bool)$finalizedResult['status'] ? "<span class='badge badge-success'>Completed</span>" : "<span class='badge badge-warning'>Pending</span>";
    if ((bool)$finalizedResult['payment_status'] === false) {
        if ((bool)$finalizedResult['payment_cancelled'] === true) {
            $paymentStatus = "<span class='badge badge-danger'>Cancelled</span>";
        } else {
            $paymentStatus = "<span class='badge badge-warning'>Pending</span>";
        }
    } else {
        $paymentStatus = "<span class='badge badge-success'>Paid</span>";
    }
    return ['status' => $status, 'payment_status' => $paymentStatus];
};
