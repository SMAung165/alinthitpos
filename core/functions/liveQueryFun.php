<?php
require_once('../config/databaseConnection.php');
require_once('../config/generalConfig.php');
require_once('salaryRelatedFuns.php');
if (isset($_POST['employee_id']) and !empty($_POST['employee_id'])) {
    $selectSalaryMonth($_POST['employee_id']);
}
