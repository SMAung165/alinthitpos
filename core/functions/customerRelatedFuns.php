<?php

$customerQueryByCustomerNumber = function ($customerNumber) use ($link) {

    $query = "SELECT * FROM `customers` WHERE `customer_number` = '$customerNumber'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_assoc($queryResult);
    if (!empty($finalizedResult['customer_number'])) {
        return $finalizedResult += ['exist' => true];
    } else {
        return ['exist' => false];
    }
};

$findMaxValueOfCustomerNumber = function () use ($link) {

    $query = "SELECT `customer_number` FROM `customers` ";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_all($queryResult);
    if (!empty($finalizedResult)) {
        $allCustomerNumber = filter_var_array($finalizedResult, FILTER_SANITIZE_NUMBER_INT);
        $allCustomerNumber = array_map('intval', call_user_func_array('array_merge', $allCustomerNumber));
        $maxCustomerNumberValue = max($allCustomerNumber);
        return [$maxCustomerNumberValue, $allCustomerNumber];
    } else {
        return 0;
    }
};

$customerNumberAssignment = function ($customerCount, $findMaxValueOfCustomerNumber) {

    if ($customerCount < $findMaxValueOfCustomerNumber[0]) {
        $range = range(1, $customerCount + 1);
        $customerNumberArray = $findMaxValueOfCustomerNumber[1];
        $missingCustomerNumber = array_diff($range, $customerNumberArray);
        return (min($missingCustomerNumber));
    } else {

        return ($customerCount + 1);
    }
};
$nextCustomerNumber = 'CR' . $customerNumberAssignment($getRowCount('customers'), $findMaxValueOfCustomerNumber());

$listCustomers = function () use ($link) {

    $query =  "SELECT * FROM `customers`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {

        echo ("<tr >
            <td>{$row['customer_number']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['address']}</td>
            <td>{$row['phone_number']}</td>
            <td>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' style='font-size:1rem'>
                        <span>Action</span>
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu myActionDropDown'>
                        <li><form action='edit-customer.php' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><button type='submit' name='editCustomerBtn'><i class='ti-pencil-alt'></i> Edit</button></form></li>
                        <li><form action='{$_SERVER['PHP_SELF']}' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><input type='hidden' name='customer_number' value='{$row['customer_number']}' /><button type='submit' name='deleteCustomerBtn'><i class='ti-trash'></i> Delete</button></form></li>
                    </ul>
                </div>
            </td>
        </tr>");
    }
};

$getCustomerData = function ($customerId) use ($link, $sanatization) {

    $customerId = intval($sanatization($customerId));

    $query = "SELECT * FROM `customers` WHERE `customer_id` = $customerId";
    $queryResutlt = mysqli_query($link, $query);

    return mysqli_fetch_assoc($queryResutlt);
};
