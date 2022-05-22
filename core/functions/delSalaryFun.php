<?php
$deleteSalary = function ($salaryId) use ($link) {

    $salaryId = intval($salaryId);
    $query = "DELETE FROM `salary` WHERE `salary_id` = {$salaryId}";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['confirmBtn'])) {
    if (empty($_POST['delete_confirmation_password'])) {
        $logs[] = "<span class='empty-pass'>Please enter your password!</span>";
    } else {
        $currentAdminPass = $_POST['delete_confirmation_password'];
        $verifyPassword = $verifyPassword($sessionUserId, $currentAdminPass);
        if ($verifyPassword === true) {
            $salaryId = $_POST['salary_id'];
            $deleteSalary =  $deleteSalary($salaryId);
        } else {
            $logs[] = "<span class='wrong-pass'>Password is incorrect!</span>";
        }
    }

    if (($deleteSalary === true)) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
        exit();
    }
}
