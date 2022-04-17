<?php

$deviceQuery = function ($deviceId) use ($link) {

    $query = "SELECT * FROM `products` WHERE `product_id` = {$deviceId}";
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
$deviceIdAssignment = $deviceIdAssignment($getRowCount('products'), $findMaxValueOfDeviceId());

$listDevices = function ($list) use ($link) {

    $query =  "SELECT * FROM `products`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $initialStock = intval($row['initial_stock']);
        $specs = (strlen((string)$row['specs']) > 12 ? '<td><a href="#">' . substr($row['specs'], 0, 12) . "..." . '</a></td>' : '<td><a href="#">' . $row['specs'] . '</a></td>');
        $stock  = ((int)$row['stock'] >= 10) ? "<td><strong class='text text-success'>{$row['stock']}</strong></td>" : "<td><strong class='text text-danger'>{$row['stock']}</strong></td>";
        $total_sold  = ((int)$row['total_sold'] >= 10) ? "<td><strong style='color:rgba(0,132,255,0.8)'>{$row['total_sold']}</strong></td>" : "<td><strong style='color:rgba(255,94,0,0.6)'>{$row['total_sold']}</strong></td>";
        $price = number_format($row['price'], 2) . ' MMK';
        $expense = number_format($row['expense'], 2) . ' MMK';
        $profitPerOne = ($row['price'] - $row['expense']);
        // $totalRevenue = $row['price'] * $row['total_sold'];
        $profit = number_format(($profitPerOne * $row['total_sold']), 2) . ' MMK';
        $initialStock  = ($initialStock >= 10) ? "<td><strong style='color:rgba(0,132,255,0.8)'>{$initialStock}</strong></td>" : "<td><strong style='color:rgba(255,94,0,0.6)'>{$initialStock}</strong></td>";
        if ($list === 'list') {
            // $specs = '<td><a href="#">' . $row['specs'] . '</a></td>';

            echo ("<tr >
            <td>{$row['device_id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['product_model']}</td>
            <td>{$row['product_brand']}</td>
            <td>{$row['color']}</td>
            <td>{$expense}</td>
            <td>{$price}</td>
            {$initialStock}
            {$total_sold}
            {$stock}
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
            <td>{$price}</td>
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
