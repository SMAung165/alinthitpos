<?php
$deleteCustomer = function ($customerId) use ($link) {

    $customerId = intval($customerId);
    $query = "DELETE FROM `customers` WHERE `customer_id` = {$customerId}";
    mysqli_query($link, $query);
    return true;
};
$isCustomerExistInOrders = function ($customerNumber) use ($link) {

    $query = "SELECT * FROM `customerorder` WHERE `order_customer_number` = '{$customerNumber}'";
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

if (isset($_POST['deleteCustomerBtn'])) {

    $customerNumber = $_POST['customer_number'];

    $isCustomerExistInOrders = $isCustomerExistInOrders($customerNumber);

    if ($isCustomerExistInOrders === false) {
        $deleteCustomer = $deleteCustomer($_POST['customer_id']);
    } else {
        $grammer = count($isCustomerExistInOrders) > 1 ? 'these order numbers : ' : 'this order number : ';
        $logs[] = "This customer ({$customerNumber}) is listed on {$grammer}" . '(' . implode(', ', $isCustomerExistInOrders) . ')';
    }

    if ($deleteCustomer === true) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
    }
}
