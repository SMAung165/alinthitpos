<?php
if (isset($_POST['activatedBtn'])) {
    $userId = (int) $_POST['user_id'];
    $query =  "UPDATE `users` SET `active` = '0' WHERE `users`.`user_id` = $userId";
    $queryForActiveUsr = "SELECT COUNT(`active`) FROM `users` WHERE `active` = 1 AND `role` = 'Admin'";
    $queryResultForActiveUsr = mysqli_query($link, $queryForActiveUsr);
    $finalizedResultForActiveUsr = mysqli_fetch_row($queryResultForActiveUsr);
    $finalizedResultForActiveUsr = (int)$finalizedResultForActiveUsr[0];

    if ($finalizedResultForActiveUsr < 2 and $_POST['role'] === 'Admin') {
        header("Location:{$_SERVER['PHP_SELF']}?failure");
        exit();
    } else {
        $queryResult = mysqli_query($link, $query);
        header("Location:{$_SERVER['PHP_SELF']}");
        exit();
    }
}

if (isset($_POST['deactivatedBtn'])) {
    $userId = $_POST['user_id'];
    $query =  "UPDATE `users` SET `active` = '1' WHERE `users`.`user_id` = $userId";
    $queryResult = mysqli_query($link, $query);
    header("Location:{$_SERVER['PHP_SELF']}");
    exit();
}
