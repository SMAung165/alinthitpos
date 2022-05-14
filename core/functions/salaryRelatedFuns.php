<?php

$querySalaryByEmId = function ($employeeId) use ($link) {
    $employeeId = intval($employeeId);
    $query = "SELECT * FROM `salary` INNER JOIN `employees` ON `employees`.`employee_id` = `salary`.`employee_id` WHERE `employees`.`employee_id` = $employeeId";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $salary_status = $row['salary_status'] == 1 ? '<span class=\'badge badge-success\'>Paid</span>' : '<span class=\'badge badge-warning\'>Unpaid</span>'; ?>
            <tr>
                <td><?php echo "{$row['first_name']} {$row['last_name']}" ?></td>
                <td><?php echo monthNameConvert($row['salary_month']) ?></td>
                <td><?php echo number_format($row['basic_salary']) ?> <span class="currency">MMK</span></td>
                <td><?php echo $row['bonus'] ?> <span class="currency">MMK</span></td>
                <td><?php echo number_format($row['basic_salary'] + $row['bonus']) ?> <span class="currency">MMK</span></td>
                <td><?php echo $row['salary_date'] ?></td>
                <td style="text-align:center;"><?php echo $salary_status; ?></td>
            </tr>

        <?php }
    }
};


$haveSalary = function ($employeeId, $month, $year) use ($link) {

    $query = "SELECT * FROM `salary` WHERE `employee_id` = $employeeId AND `salary_month` = '{$month}' AND `salary_year` = '{$year}'";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) === 0) {
        return false;
    } else {
        return intval(mysqli_fetch_assoc($queryResult)['salary_id']);
    }
};

$createEmptyRowSalary = function ($employeeId, $month, $year) use ($link, $haveSalary) {

    if ($haveSalary($employeeId, $month, $year) === false) {

        $createRowSalary = function ($dataToInsert) use ($link) {
            $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
            $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
            $query =  "INSERT INTO `salary` ({$fieldNames}) VALUES ({$dataToInsert})";
            mysqli_query($link, $query);
            return true;
        };
        $dataToInsert = [
            'employee_id' => $employeeId,
            'salary_month' => date('m'),
            'salary_year' => date('Y'),
            'basic_salary' => 0,
            'bonus' => 0,
            'salary_status' => 0,
        ];
        $createRowSalary = $createRowSalary($dataToInsert);
    }
};


$listSalaries = function () use ($link) {

    $query = "SELECT * FROM `salary` INNER JOIN `employees` ON `employees`.`employee_id` = `salary`.`employee_id`";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $salary_status = $row['salary_status'] == 1 ? '<span class=\'badge badge-success\'>Paid</span>' : '<span class=\'badge badge-warning\'>Unpaid</span>'; ?>

            <tr>
                <td><?php echo $row['salary_id'] ?></td>
                <td><?php echo "{$row['first_name']} {$row['last_name']}" ?></td>
                <td><?php echo $row['position'] ?></td>
                <td><?php echo monthNameConvert($row['salary_month']) ?></td>
                <td><?php echo $row['salary_date'] ?></td>
                <td><?php echo number_format($row['basic_salary']) ?> <span class="currency">MMK</span></td>
                <td><?php echo number_format($row['bonus']) ?> <span class="currency">MMK</span></td>
                <td><?php echo number_format($row['basic_salary'] + $row['bonus']) ?> <span class="currency">MMK</span></td>
                <td style="text-align:center;"><?php echo $salary_status; ?></td>
            </tr>


<?php }
    }
};

$isSalaryGiven = function ($employeeId, $month, $year, $statusOrMonth) use ($link, $sanatization) {

    $month = $sanatization($month);
    $employeeId = intval($sanatization($employeeId));
    $query = "SELECT `salary_status`, `salary_month`, `salary_year` FROM `salary` INNER JOIN `employees` ON `employees`.`employee_id` = `salary`.`employee_id` WHERE `salary`.`employee_id` = {$employeeId} AND `salary_month`= '{$month}' AND `salary_year` ='{$year}'";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        if ($statusOrMonth == 'status') {
            return mysqli_fetch_assoc($queryResult)['salary_status'] == 1 ? true : false;
        } else if ($statusOrMonth == 'month') {
            $finalizedResult = mysqli_fetch_assoc($queryResult);
            return monthNameConvert($finalizedResult['salary_month']) . ' - ' . ($finalizedResult['salary_year']);
        }
    }
};
$selectSalaryMonth = function ($employeeId) use ($link) {

    $currentMonth = (date('F - Y'));

    $query = "SELECT `salary_month`, `salary_year` FROM `salary` INNER JOIN `employees` ON `employees`.`employee_id` = `salary`.`employee_id` WHERE `salary`.`employee_id` = {$employeeId}";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $salaryMonth = monthNameConvert($row['salary_month']);
            $salaryYear = $row['salary_year'];
            $salaryMonthArr[] = $salaryMonth . ' - ' . $salaryYear;
            if ($row['salary_month'] === date('m') and $row['salary_year'] === date('Y')) {
                echo "<option selected>{$salaryMonth} - {$salaryYear}</option>";
            } else {
                echo "<option>{$salaryMonth} - {$salaryYear}</option>";
            }
        }
        if (!in_array($currentMonth, $salaryMonthArr)) {
            echo "<option selected>{$currentMonth}</option>";
        }
    } else {
        echo "<option selected>No Result</option>";
    }
};
