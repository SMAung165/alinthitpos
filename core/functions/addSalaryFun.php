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
    if ($isEmployeeExists($_POST['employee_id']) === true) {
        $monthByYear = array_combine(['month', 'year'], (explode(' - ', $_POST['salary_month'])));
        $haveSalary = $haveSalary($_POST['employee_id'], monthNumberConvert($monthByYear['month']), $monthByYear['year']);

        //If empty salary row does not exist create one but with salary status paid.
        if ($haveSalary === false) {
            $dataToInsert = [

                'employee_id' => $_POST['employee_id'],
                'basic_salary' => $_POST['basic_salary'],
                'bonus' => $_POST['bonus'],
                'salary_date' => date('Y-m-d'),
                'salary_month' => monthNumberConvert($monthByYear['month']),
                'salary_year' => $monthByYear['year'],
                'salary_status' => 1,
            ];
            $inserIntoDataBaseSalary = $inserIntoDataBaseSalary($dataToInsert);
        } else {
            //Check mode if Normal
            if ($_POST['mode'] === 'Normal') {
                //If salary is not given but Empty salary row exists, update it.
                if ($isSalaryGiven($_POST['employee_id'], monthNumberConvert($monthByYear['month']), $monthByYear['year'], 'status') === true) {
                    $monthName = $isSalaryGiven($_POST['employee_id'], monthNumberConvert($monthByYear['month']), $monthByYear['year'], 'month');
                    $logs[] = "Salary is already given for month : <b class='text-info'>'{$monthName}'</b>";
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
            //Execute when mode is Forced
            else if ($_POST['mode'] === 'Update') {
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
    } else {
        $logs[] = "Cannot find employee ID : <b class='text-info'>{$_POST['employee_id']}</b>";
    }
}

if ($inserIntoDataBaseSalary === true) {
    header("location:{$_SERVER['PHP_SELF']}?inSuccess");
}
if ($updateSalary === true) {
    header("location:{$_SERVER['PHP_SELF']}?upSuccess");
}
