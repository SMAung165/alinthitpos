<?php

$userExist = function ($username) use ($link, $sanatization) {
    $username = $sanatization($username);
    $query = "SELECT `username` FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);

    $finalizedResult = mysqli_fetch_array($queryResult)['username'];
    return ($finalizedResult === $username) ? true : false;
};

$emailExist = function ($email) use ($link, $sanatization) {
    $email = $sanatization($email);
    $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $queryResult = mysqli_query($link, $query);

    $finalizedResult = mysqli_fetch_array($queryResult)['email'];
    return ($finalizedResult === $email) ? true : false;
};

$userActive = function ($username) use ($link, $sanatization) {
    $username = $sanatization($username);
    $query =  "SELECT `active` FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult)['active'];
    return ((bool)$finalizedResult ?? false);
};
$login = function ($username, $password) use ($link, $sanatization) {
    $username = $sanatization($username);
    $password = md5($sanatization($password));
    $query =  "SELECT * FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return (($finalizedResult['password'] === $password) ? $finalizedResult['user_id'] : false);
};

$getUserData = function ($sessionUserId) use ($link) {
    $user_id = (int)($sessionUserId);
    $query =  "SELECT * FROM `users` WHERE `user_id` = {$user_id}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult);
};

$outPutSessionUserSpecialty = function ($sessionUserSpecialty) {

    $sessionUserSpecialty = explode(',', $sessionUserSpecialty);
    foreach ($sessionUserSpecialty as $specialty) {
        $specialty = trim($specialty, "\n\r\t\v\x00");
        echo "<li>{$specialty}</li>";
    }
};

function finalizedLoggedIn($sessionUserId)
{
    if (isset($sessionUserId)) {
        return true;
    } else {
        return false;
    }
}

$userCount = function () use ($link) {
    $query =  "SELECT * FROM `users` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    return ($finalizedResult);
};

$customerCount = function () use ($link) {
    $query =  "SELECT * FROM `customers` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    return ($finalizedResult);
};

$deviceCount = function () use ($link) {
    $query =  "SELECT * FROM `products`";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_num_rows($queryResult);
    return ($finalizedResult);
};


$listDevices = function ($list) use ($link) {

    $query =  "SELECT * FROM `products`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $specs = (strlen((string)$row['specs']) > 20 ? '<td><a href="#">' . substr($row['specs'], 0, 20) . "..." . '</a></td>' : '<td><a href="#">' . $row['specs'] . '</a></td>');
        $stock  = ((int)$row['stock'] >= 10) ? "<td><span class='badge badge-success'>{$row['stock']}</span></td>" : "<td><span class='badge badge-danger'>{$row['stock']}</span></td>";
        $profit = filter_var($row['price'], FILTER_SANITIZE_NUMBER_INT) * intval($row['total_sold']);
        $profit = (string)($profit);
        $profit = implode(',', str_split($profit, 3)) . 'MMK';
        if ($list === 'list') {
            // $specs = '<td><a href="#">' . $row['specs'] . '</a></td>';

            echo ("<tr >
            <td>{$row['device_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['product_model']}</td>
            <td>{$row['product_brand']}</td>
            <td>{$row['color']}</td>
            <td>{$row['price']}</td>
            {$stock}
            <td>{$row['total_sold']}</td>
            <td>{$profit}</td>
        </tr>");
        } else if ($list === 'manage') {

            echo ("<tr >
            <td>

            <span>
                <span class='imageBox'>
                    <div class='imgContainer'>
                        <img src='{$row['image']}' alt='{$row['product_name']}'/>
                    </div>
                </span>   
                <img class='tblImg' src='{$row['image']}' alt='{$row['product_name']}' width='80px'/>
            </span>
               
                 
            </td>
            <td>{$row['device_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['product_model']}</td>
            <td>{$row['product_brand']}</td>
            {$specs}
            <td>{$row['color']}</td>
            <td>{$row['price']}</td>
            {$stock}
            <td>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' style='font-size:1rem'>
                        <span>Action</span>
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu myActionDropDown'>
                        <li><form action='device-details.php' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='deviceDetailsBtn'><i class='ti-file'></i> Details</button></form></li>
                        <li><form action='edit-device.php' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='editDeviceBtn'><i class='ti-pencil-alt'></i> Edit</button></form></li>
                        <li><form action='edit-device.php' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='editDeviceBtn'><i class='ti-printer'></i> Print</button></form></li>
                        <li><form action='{$_SERVER['PHP_SELF']}' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='deleteDeviceBtn'><i class='ti-trash'></i> Delete</button></form></li>
                    </ul>
                </div>
            </td>
        </tr>");
        }
    }
};

$listUsers = function () use ($link) {

    $query =  "SELECT * FROM `users`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $btnActive = "<td>
                        <form action='{$_SERVER['PHP_SELF']}' method='post'>
                            <input type='hidden' name='user_id' value='{$row['user_id']}' />
                            <input type='hidden' name='role' value='{$row['role']}' />
                            <button name='activatedBtn' type='submit' class='status btn btn-success'>
                                <i class='ti-check'></i>
                                Activated
                            </button>
                        </form>
                    </td>";

        $btnInactive = "<td>
                            <form action='admin-list.php' method='post'>
                                <input type='hidden' name='user_id' value='{$row['user_id']}' />
                                <input type='hidden' name='role' value='{$row['role']}' />
                                <button name='deactivatedBtn' type='submit' class='status btn btn-danger'>
                                    <i class='ti-close'></i>
                                    Activated
                                </button>
                            </form>
                        </td>";
        $active  = ((bool)$row['active'] === true) ?  $btnActive : $btnInactive;
        echo ("<tr>
            <td>USR{$row['user_id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['role']}</td>
            {$active}
        </tr>");
    }
};

$insertIntoDatabase = function ($dataToInsert) use ($link, $sanatization) {

    array_walk($dataToInsert, $sanatization);
    $dataToInsert['password'] = md5($dataToInsert['password']);
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `users` ({$fieldNames}) VALUES ({$dataToInsert})";
    mysqli_query($link, $query);
    return true;
};

$insertIntoDatabaseDevices = function ($dataToInsert) use ($link, $sanatization) {

    array_walk($dataToInsert, $sanatization);
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `products` ({$fieldNames}) VALUES ({$dataToInsert})";
    echo $query;
    mysqli_query($link, $query);
    return true;
};

function success()
{
    if (isset($_GET['inSuccess'])) {
        echo "<span class='badge badge-success'>Data inserted successfully!</span>";
    }
    if (isset($_GET['upSuccess'])) {
        echo "<span class='badge badge-success'>Data updated successfully!</span>";
    }
    if (isset($_GET['delSuccess'])) {
        echo "<span class='badge badge-success'>Successfully deleted!</span>";
    }
}

$deviceQuery = function ($deviceId) use ($link) {

    $query = "SELECT * FROM `products` WHERE `product_id` = {$deviceId}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return $finalizedResult;
};

$updateDevice = function ($dataToUpdateDevice, $productId) use ($link, $sanatization) {
    array_walk($dataToUpdateDevice, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateDevice as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `products` SET {$dataToUpString} WHERE `product_id` = $productId";
    mysqli_query($link, $query);
    return true;
};

$updateUser = function ($dataToUpdateUser, $userId) use ($link, $sanatization) {
    array_walk($dataToUpdateUser, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateUser as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `users` SET {$dataToUpString} WHERE `user_id` = $userId";
    mysqli_query($link, $query);
    return true;
};

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

$orderStatus = function ($orderId) use ($link) {

    $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_product_id` = `products`.`product_id` INNER JOIN `customers` ON `customerorder`.`order_customer_id` = `customers`.`customer_id` WHERE `order_id`= '{$orderId}'";
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

$orderQuery = function ($pageTitle, $productId) use ($link) {

    if ($pageTitle === 'customer-order') {
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_product_id` = `products`.`product_id` INNER JOIN `customers` ON `customerorder`.`order_customer_id` = `customers`.`customer_id`";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $totalPrice = filter_var($row['price'], FILTER_SANITIZE_NUMBER_INT) * intval($row['quantity']);
            $totalPrice = (string)($totalPrice);
            $totalPrice = implode(',', str_split($totalPrice, 3)) . 'MMK';
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
                    <td>{$row['price']}</td>
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
                                <li><form action='order-details.php' method='post'><input type='hidden' name='order_id' value='{$row['order_id']}' /><button type='submit' name='orderDetailsBtn'><i class='ti-file'></i> Details</button></form></li>
                                <li><form action='edit-order.php' method='post'><input type='hidden' name='order_id' value='{$row['order_id']}' /><button type='submit' name='editOrderBtn'><i class='ti-pencil-alt'></i> Edit</button></form></li>
                                <li><form action='edit-device.php' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='editDeviceBtn'><i class='ti-printer'></i> Print</button></form></li>
                                <!-- <li><form action='{$_SERVER['PHP_SELF']}' method='post'><input type='hidden' name='product_id' value='{$row['product_id']}' /><button type='submit' name='deleteDeviceBtn'><i class='ti-trash'></i> Delete</button></form></li> -->
                            </ul>
                        </div>
                    </td>
                </tr>
                ";
        }
    } else if ($pageTitle === 'device-details') {
        $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_product_id` = `products`.`product_id` INNER JOIN `customers` ON `customerorder`.`order_customer_id` = `customers`.`customer_id` WHERE `product_id` = {$productId}";
        $queryResult = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $totalPrice = filter_var($row['price'], FILTER_SANITIZE_NUMBER_INT) * intval($row['quantity']);
            $totalPrice = (string)($totalPrice);
            $totalPrice = implode(',', str_split($totalPrice, 3)) . 'MMK';
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

$getOrderDetails = function ($orderId) use ($link) {

    $query = "SELECT * FROM `products` INNER JOIN `customerorder` ON `customerorder`.`order_product_id` = `products`.`product_id` INNER JOIN `customers` ON `customerorder`.`order_customer_id` = `customers`.`customer_id` WHERE `order_id` = {$orderId}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return $finalizedResult;
};

$findMaxValueOfDeviceId = function () use ($link) {

    $query = "SELECT `device_id` FROM `products` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_all($queryResult);
    $allDeviceIdVal = filter_var_array($finalizedResult, FILTER_SANITIZE_NUMBER_INT);
    $allDeviceIdVal = array_map('intval', call_user_func_array('array_merge', $allDeviceIdVal));
    $maxIdValue = max($allDeviceIdVal);
    return [$maxIdValue, $allDeviceIdVal];
};

$deviceIdAssignment = function ($deviceCount, $findMaxValueOfDeviceId) {

    if ($deviceCount < $findMaxValueOfDeviceId[0]) {
        $range = range(1, $deviceCount + 1);
        $deviceIdArray = $findMaxValueOfDeviceId[1];
        $missingDeviceId = array_diff($range, $deviceIdArray);
        return (min($missingDeviceId));
    } else {

        return ($deviceCount + 1);
    }
};
$deviceIdAssignment = $deviceIdAssignment($deviceCount(), $findMaxValueOfDeviceId());
