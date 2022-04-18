<?php

$orderQuery = function ($pageTitle, $deviceId) use ($link) {

    if ($pageTitle === 'customer-order') {
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number`";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $price = number_format($row['price'], 2) . ' MMK';
            $totalPrice = number_format(($row['price'] * $row['quantity']), 2) . ' MMK';
            $status = (bool)$row['status'] ? "<span class='badge badge-success'>Completed</span>" : "<span class='badge badge-warning'>Pending</span>";
            if ((bool)$row['payment_status'] === false) {
                if ((bool)$row['payment_cancelled'] === true) {
                    $paymentStatus = "<span class='badge badge-danger'>Cancelled</span>";
                } else {
                    $paymentStatus = "<span class='badge badge-warning'>Pending</span>";
                }
            } else {
                $paymentStatus = "<span class='badge badge-success'>Paid</span>";
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
                                <li>
                                    <form action='edit-device.php' method='post'>
                                        <input type='hidden' name='product_id' value='{$row['product_id']}' />
                                            <button type='submit' name='editDeviceBtn'>
                                                <i class='ti-printer'></i>
                                                Print
                                            </button>
                                    </form>
                                </li>
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
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number` WHERE `device_id` = {$deviceId}";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $price = number_format($row['price'], 2) . ' MMK';
            $totalPrice = number_format(($row['price'] * $row['quantity']), 2) . ' MMK';
            $status = (bool)$row['status'] ? "<button type='submit' class='btn badge btn-success'>Completed</button>" : "<button type='submit' class='btn badge btn-warning'>Pending</button>";
            $gender = $row['gender'] === 'Male' ? 'Mr. ' : 'Ms. ';

            echo "
                <tr>
                    <td><a href='#'>$gender{$row['first_name']} {$row['last_name']}</a></td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['quantity']}</td>
                    <td class='color-primary'>{$totalPrice}</td>
                    <td>
                        <form method='post' action='order-details.php'>
                            <input type='hidden' name='order_id' value='{$row['order_id']}'/>
                            {$status}
                        </form>
                    </td>
                </tr>
                ";
        }
    }
};

$getOrderDetails = function ($orderId) use ($link) {

    $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_device_id` = `products`.`device_id` INNER JOIN `customers` ON `customerorder`.`order_customer_number` = `customers`.`customer_number` WHERE `order_id` = {$orderId}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return $finalizedResult;
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
