<?php

//Methods
$resetSystem = function () use ($link) {
    mysqli_query($link, "DELETE FROM `daily_profits`");
    mysqli_query($link, "ALTER TABLE `daily_profits` AUTO_INCREMENT = 1");

    mysqli_query($link, "DELETE FROM  `monthly_profits`");
    mysqli_query($link, "ALTER TABLE `monthly_profits` AUTO_INCREMENT = 1");

    mysqli_query($link, "DELETE FROM  `customerorder`");
    mysqli_query($link, "ALTER TABLE `customerorder` AUTO_INCREMENT = 1");

    mysqli_query($link, "DELETE FROM `customers` ");
    mysqli_query($link, "ALTER TABLE `customers` AUTO_INCREMENT = 1");

    mysqli_query($link, "DELETE FROM `products` ");
    mysqli_query($link, "ALTER TABLE `products` AUTO_INCREMENT = 1");
    rmrf('assets/images/products');

    mysqli_query($link, "DELETE FROM `salary`");
    mysqli_query($link, "ALTER TABLE `salary` AUTO_INCREMENT = 1");

    return true;
};

$resetProfits = function () use ($link) {
    mysqli_query($link, "DELETE FROM `daily_profits`");
    mysqli_query($link, "ALTER TABLE `daily_profits` AUTO_INCREMENT = 1");

    mysqli_query($link, "DELETE FROM `monthly_profits`");
    mysqli_query($link, "ALTER TABLE `monthly_profits` AUTO_INCREMENT = 1");
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
$resetOrders = function () use ($link) {
    mysqli_query($link, "DELETE FROM  `customerorder`");
    mysqli_query($link, "ALTER TABLE `customerorder` AUTO_INCREMENT = 1");
    return true;
};

//Process

if (isset($_POST['confirm_reset_system'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    if (($verifyPassword($userId, $password)) === true) {
        $resetSystem =  $resetSystem();
    } else {
        $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
    }
}
if (isset($_POST['confirm_reset_profits'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetProfits =  $resetProfits();
    } else {
        $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
    }
}
if (isset($_POST['confirm_reset_stocks'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetStocks =  $resetStocks();
    } else {
        $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
    }
}
if (isset($_POST['confirm_reset_salary'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetSalary =  $resetSalary();
    } else {
        $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
    }
}
if (isset($_POST['confirm_reset_orders'])) {

    $userId = intval($sanatization($_POST['user_id']));
    $password = $sanatization($_POST['confirm_password']);

    $verifyPassword($userId, $password);

    if (($verifyPassword($userId, $password)) === true) {
        $resetOrders =  $resetOrders();
    } else {
        $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
    }
}

if (
    $resetSystem === true
    or
    $resetProfits === true
    or
    $resetStocks === true
    or
    $resetSalary === true
    or
    $resetOrders === true
) {
    header("location:{$_SERVER['PHP_SELF']}?reSuccess");
    exit();
}
