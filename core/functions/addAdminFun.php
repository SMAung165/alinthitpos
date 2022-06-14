<?php
$insertIntoDatabaseUsers = function ($dataToInsert) use ($link, $sanatization) {

    array_walk($dataToInsert, $sanatization);
    $dataToInsert['password'] = md5($dataToInsert['password']);
    $fieldNames = '`' . implode('`,`', array_keys($dataToInsert)) . '`';
    $dataToInsert = '\'' . implode('\',\'', $dataToInsert) . '\'';
    $query =  "INSERT INTO `users` ({$fieldNames}) VALUES ({$dataToInsert})";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['registerBtn'])) {

    $isUsernameValid = $isEmailValid = $isPasswordValid  = 'invalid';
    $required_fileds = ['username', 'first_name', 'email', 'password', 'confirm_password'];

    foreach ($_POST as $key => $value) {
        if (empty($value) and in_array($key, $required_fileds)) {
            $logs[] = "{$key} is required! <br/><br/>";
        }
    }

    if (empty($logs)) {
        //Username error handling
        if (preg_match("/\\s/", $_POST['username'])) {
            $logs[] = 'Username must not contain spaces <br/><br/>';
        } else {
            if ($userExist($_POST['username'])) {
                $logs[] = "Username <strong>{$_POST['username']}</strong> is already taken <br/><br/>";
            } else {
                $isUsernameValid = 'valid';
            }
        }

        //Email error handling
        if (preg_match("/\\s/", $_POST['email'])) {
            $logs[] = 'Email must not contain spaces <br/><br/>';
        } else {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                if ($emailExist($_POST['email']) === true) {
                    $logs[] = "Email address is already registered <br/><br/>";
                } else {
                    $isEmailValid = 'valid';
                }
            } else {
                $logs[] = "Please enter a valid email address";
            }
        }

        //Password error handling
        if (preg_match("/\\s/", $_POST['password'])) {
            $logs[] = 'Password must not contain spaces <br/><br/>';
        } else {

            if (strlen($_POST['password']) < 8) {
                $logs[] = 'Password must be at least 8 characters';
            } else {
                if ($_POST['confirm_password'] !== $_POST['password']) {
                    $logs[] = 'Passwords do not match';
                } else {
                    $isPasswordValid = 'valid';
                }
            }
        }
    }
    $validation = ['isUsernameValid' => $isUsernameValid, 'isEmailValid' => $isEmailValid, 'isPasswordValid' => $isPasswordValid];

    if (!in_array('invalid', $validation)) {
        //Insert data into database
        $dataToInsert = [
            'username' => $_POST['username'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => $_POST['role'],
            'active' => $_POST['active'],
        ];

        $insertIntoDatabaseUsers =  $insertIntoDatabaseUsers($dataToInsert);
        if ($insertIntoDatabaseUsers) {
            header("Location:{$_SERVER['PHP_SELF']}?inSuccess");
            exit();
        }
    }
}
