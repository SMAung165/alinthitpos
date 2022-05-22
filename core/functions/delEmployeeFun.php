<?php

$deleteEmployee = function ($employeeId) use ($link, $queryEmployee) {

    $employeeId = intval($employeeId);
    $queryEmployee = $queryEmployee($employeeId);
    if (!empty($queryEmployee['image'])) {

        unlink($queryEmployee['image']);
    }
    mysqli_query($link, "DELETE FROM `salary` WHERE `employee_id` = {$employeeId}");
    mysqli_query($link, "DELETE FROM `employees` WHERE `employee_id` = {$employeeId}");
    return true;
};

if (isset($_POST['delete_employee_btn'])) {

    $firstName = $queryEmployee($_POST['employee_id'])['first_name'];
    $lastName = $queryEmployee($_POST['employee_id'])['last_name'];

    $warning = "<span class='will-del-related-em'>This will delete all the related data to this employee</span> <span class='text-primary'>'{$firstName} {$lastName}'</span>";
    $input = "<input name='employee_id' value='{$_POST['employee_id']}' type='hidden' />";
    require_once('widgets/confirm.php');
}
if (isset($_POST['okay_btn'])) {
    $deleteEmployee = $deleteEmployee($_POST['employee_id']);
}
if (isset($_POST['cancel_btn'])) {
    header("location:{$_SERVER['PHP_SELF']}");
    exit();
}
if ($deleteEmployee === true) {
    header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
    exit();
}
