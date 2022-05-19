<?php

$updateEmployee = function ($dataToupdateEmployee, $employeeId) use ($link, $sanatization) {
    array_walk($dataToupdateEmployee, $sanatization);
    $dataToUpString = '';
    foreach ($dataToupdateEmployee as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `employees` SET {$dataToUpString} WHERE `employee_id` = $employeeId";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['edit_employee_btn'])) {

    $employeeId = intval($sanatization($_POST['employee_id']));

    $required_fileds = ['first_name', 'phone_number', 'position'];

    foreach ($_POST as $key => $value) {
        if (empty($value) and in_array($key, $required_fileds)) {
            $logs[] = "{$key} is required!";
        }
    }

    if (preg_match("/\\s/", $_POST['email'])) {
        $logs[] = 'Email must not contain spaces!';
    } else {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];
        } else {
            $logs[] = "Please enter a valid email address";
        }
    }
    if (empty($logs)) {

        $fileImagePath = '';

        if (empty($_FILES['file_image']['name'])) {
            $fileImagePath = $_POST['image'];
        } else {
            $allowedFileType = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $fileImageName = $_FILES['file_image']['name'];
            $fileImageType = $_FILES['file_image']['type'];
            if (in_array($fileImageType, $allowedFileType)) {
                $generateImageName = substr(md5(time()), 0, 5);
                $generateImageName = $generateImageName . '.' . substr($fileImageType, 6, 10);
                $fileImagePath = "assets/images/avatar/employees/{$_POST['first_name']} {$_POST['last_name']}/{$generateImageName}";
                if (!file_exists("assets/images/avatar/employees/{$_POST['first_name']} {$_POST['last_name']}")) {
                    mkdir("assets/images/avatar/employees/{$_POST['first_name']} {$_POST['last_name']}");
                }
                $fileImageTemp = $_FILES['file_image']['tmp_name'];
                move_uploaded_file($fileImageTemp, $fileImagePath);
            } else {
                $logs[] = 'Please select a valid file';
            }
        }

        //data to update employees table
        $dataToupdateEmployee = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $email,
            'phone_number' => $_POST['phone_number'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
            'date_of_birth' => $_POST['date_of_birth'],
            'date_hired' => $_POST['date_hired'],
            'position' => $_POST['position'],
            'specialty' => $_POST['specialty'],
            'facebook' => $_POST['facebook'],
            'image' => $fileImagePath,
        ];

        $updateEmployee =  $updateEmployee($dataToupdateEmployee, $employeeId);
        if ($updateEmployee === true) {
            header("location:employee-list.php?upSuccess");
            exit();
        }
    }
}
