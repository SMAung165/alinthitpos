<?php
$deleteCustomer = function ($customerId) use ($link) {

    $customerId = intval($customerId);
    $query = "DELETE FROM `customers` WHERE `customer_id` = {$customerId}";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['deleteCustomerBtn'])) {

    $customerId = $_POST['customer_id'];
    $deleteCustomer = $deleteCustomer($customerId);

    if ($deleteCustomer) {

        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
