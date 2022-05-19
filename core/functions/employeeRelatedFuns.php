<?php

$emailExistEmployee = function ($email) use ($link, $sanatization) {
    $email = $sanatization($email);
    $query = "SELECT `email` FROM `employees` WHERE `email` = '$email'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult['email'] === $email) ? true : false;
};

$listEmployees = function () use ($link) {

    $month = date('m');
    $query = "SELECT * FROM `employees`";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        while ($row = mysqli_fetch_assoc($queryResult)) {
            $employeeId = intval($row['employee_id']);
            $query1 = "SELECT * FROM `salary` WHERE MONTH(`salary_date`) = '{$month}' AND `employee_id` = $employeeId";
            $queryResult1 = mysqli_query($link, $query1);
            if (mysqli_num_rows($queryResult1) > 0) {
                $thisEmployee = mysqli_fetch_assoc($queryResult1);
                $month = $thisEmployee['salary_month'];
                $salary_status = $thisEmployee['salary_status'] == 1 ? '<span class=\'badge badge-success paid\'>Paid</span>' : '<span class=\'badge badge-warning unpaid\'>Unpaid</span>';
            } else {
                $month = date('m');
                $salary_status = '<span class=\'badge badge-warning unpaid\'>Unpaid</span>';
            }
?>
            <tr class='employee-tr'>
                <td>
                    <form action='employee-details.php' method='post'>
                        <input type="hidden" name='employee_id' value='<?php echo $row['employee_id'] ?>' />
                    </form>
                    <span>
                        <span class='imageBox'>
                            <div class='imgContainer'>
                                <img src="<?php echo $row['image'] ?>" alt='<?php echo $row['first_name'] ?>' />
                            </div>
                        </span>
                        <img class='tblImg' src="<?php echo $row['image'] ?>" alt='<?php echo $row['first_name'] ?>' width="80px" />
                    </span>

                </td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone_number'] ?></td>
                <td><?php echo monthNameConvert($month) ?></td>
                <td><?php echo $salary_status ?></td>
                <td>
                    <div class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' style='font-size:1rem'>
                            <span>Action</span>
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu myActionDropDown'>
                            <li>
                                <form action='employee-details.php' method='post'><input type='hidden' name='employee_id' value='<?php echo $row['employee_id'] ?>' /><button type='submit' name=''><i class='ti-file'></i> Details</button></form>
                            </li>
                            <li>
                                <form action='edit-employee.php' method='post'><input type='hidden' name='employee_id' value='<?php echo $row['employee_id'] ?>' /><button type='submit' name=''><i class='ti-pencil-alt'></i> Edit</button></form>
                            </li>

                            <li>
                                <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'><input type='hidden' name='employee_id' value='<?php echo $row['employee_id'] ?>' /><button type='submit' name='delete_employee_btn'><i class='ti-trash'></i> Delete</button></form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>

<?php   }
    }
};


$queryEmployee = function ($employeeId) use ($link) {

    $employeeId = intval($employeeId);
    $query = "SELECT * FROM `employees` WHERE `employee_id` = $employeeId ";
    $queryResult = mysqli_query($link, $query);
    if (mysqli_num_rows($queryResult) > 0) {
        return mysqli_fetch_assoc($queryResult);
    } else {
        return false;
    }
};
