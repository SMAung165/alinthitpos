<?php
$deleteSalary = function ($salaryId) use ($link) {

    $salaryId = intval($salaryId);
    $query = "DELETE FROM `salary` WHERE `salary_id` = {$salaryId}";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['confirmBtn'])) {
    if (empty($_POST['delete_confirmation_password'])) {
        $logs[] = 'Please enter your password!';
    } else {
        $currentAdminPass = $_POST['delete_confirmation_password'];
        $verifyPassword = $verifyPassword($sessionUserId, $currentAdminPass);
        if ($verifyPassword === true) {
            $salaryId = $_POST['salary_id'];
            $deleteSalary =  $deleteSalary($salaryId);
        } else {
            $logs[] = "Password is incorrect!";
        }
    }

    if (($deleteSalary === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
