<?php

//Methods
$resetSystem = function () use ($link) {
    mysqli_query($link, "TRUNCATE TABLE `daily_profits`");
    mysqli_query($link, "TRUNCATE TABLE `monthly_profits`");
    mysqli_query($link, "TRUNCATE TABLE `customerorder`");
    mysqli_query($link, "DELETE FROM `customers` ");
    mysqli_query($link, "ALTER TABLE `customers` AUTO_INCREMENT = 1");
    mysqli_query($link, "DELETE FROM `products` ");
    mysqli_query($link, "ALTER TABLE `products` AUTO_INCREMENT = 1");

    return true;
};

$resetProfits = function () use ($link) {
    mysqli_query($link, "TRUNCATE TABLE `daily_profits`");
    mysqli_query($link, "TRUNCATE TABLE `monthly_profits`");
    return true;
};
$resetStocks = function () use ($link) {
    mysqli_query($link, "UPDATE `products` SET `total_sold` = 0, `initial_stock`= 0, `stock` = 0");
    return true;
};
$resetSalary = function () use ($link) {
    mysqli_query($link, "DELETE FROM `salary`");
    mysqli_query($link, "ALTER TABLE `salary` AUTO_INCREMENT = 1");
    return true;
};



//Process

if (isset($_POST['confirm_reset_system'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    if (($verifyPassword($userId, $password)) === true) {
        $resetSystem =  $resetSystem();
    } else {
        $logs[] = "Password is incorrect!";
    }
}
if (isset($_POST['confirm_reset_profits'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetProfits =  $resetProfits();
    } else {
        $logs[] = "Password is incorrect!";
    }
}
if (isset($_POST['confirm_reset_stocks'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetStocks =  $resetStocks();
    } else {
        $logs[] = "Password is incorrect!";
    }
}
if (isset($_POST['confirm_reset_salary'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetSalary =  $resetSalary();
    } else {
        $logs[] = "Password is incorrect!";
    }
}

if ($resetSystem === true or $resetProfits === true or $resetStocks === true or $resetSalary === true) {
    header("Location:{$_SERVER['PHP_SELF']}?reSuccess");
    exit();
}
