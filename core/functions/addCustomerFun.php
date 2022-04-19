<?php

$insertIntoDatabaseCustomers = function ($dataToInsert) use ($link, $sanatization) {

    array_walk($dataToInsert, $sanatization);
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `customers` ({$fieldNames}) VALUES ({$dataToInsert})";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['addCustomerBtn'])) {

    $dataToInsert = [
        'customer_number' => $_POST['customer_number'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number'],
        'address' => $_POST['address'],
    ];

    $insertIntoDatabaseCustomers = $insertIntoDatabaseCustomers($dataToInsert);

    if ($insertIntoDatabaseCustomers) {
        header("Location:{$_SERVER['PHP_SELF']}?inSuccess");
        exit();
    }
}
