<?php

$updateCustomer = function ($dataToUpCustomer, $customerId) use ($link, $sanatization) {
    array_walk($dataToUpCustomer, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpCustomer as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `customers` SET {$dataToUpString} WHERE `customer_id` = $customerId";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['upCustomerBtn'])) {
    $dataToUpCustomer = [

        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number'],
        'address' => $_POST['address'],
    ];

    $updateCustomer = $updateCustomer($dataToUpCustomer, $_POST['customer_id']);
}

if ($updateCustomer === true) {
    header('location:customer-list.php?upSuccess');
    exit();
}
