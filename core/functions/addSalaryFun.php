<?php
$inserIntoDataBaseSalary = function ($dataToInsert) use ($link) {
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `salary` ({$fieldNames}) VALUES ({$dataToInsert})";
    mysqli_query($link, $query);
    return true;
};
$updateSalary = function ($dataToUpdateSalary, $salaryId) use ($link, $sanatization) {

    array_walk($dataToUpdateSalary, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateSalary as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `salary` SET {$dataToUpString} WHERE `salary_id` = $salaryId";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['add_salary_btn'])) {
    $haveSalary = $haveSalary($_POST['employee_id'], monthNumberConvert($_POST['salary_month']));
    if ($haveSalary === false) {
        $dataToInsert = [

            'employee_id' => $_POST['employee_id'],
            'basic_salary' => $_POST['basic_salary'],
            'bonus' => $_POST['bonus'],
            'salary_date' => date('Y-m-d'),
            'salary_month' => date('m'),
            'salary_status' => 1,
        ];
        $inserIntoDataBaseSalary = $inserIntoDataBaseSalary($dataToInsert);
    } else {
        if ($isSalaryGiven($_POST['employee_id'], 'status') === 'paid') {
            $logs[] = 'Salary is already given for this month.';
        } else {
            $dataToUpdateSalary = [
                'basic_salary' => $_POST['basic_salary'],
                'bonus' => $_POST['bonus'],
                'salary_date' => date('Y-m-d'),
                'salary_status' => 1,
            ];
            // $haveSalary returned Salary ID
            $updateSalary = $updateSalary($dataToUpdateSalary, $haveSalary);
        }
    }
}

if ($inserIntoDataBaseSalary === true) {
    header("location:{$_SERVER['PHP_SELF']}?inSuccess");
}
if ($updateSalary === true) {
    header("location:{$_SERVER['PHP_SELF']}?upSuccess");
}
