<?php

$updateUser = function ($dataToUpdateUser, $userId) use ($link, $sanatization) {
    array_walk($dataToUpdateUser, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateUser as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `users` SET {$dataToUpString} WHERE `user_id` = $userId";
    mysqli_query($link, $query);
    return true;
};


if (isset($_POST['updateUserBtn'])) {
    $fileImagePath = '';
    if (empty($_FILES['profile_image']['name'])) {
        $fileImagePath = $_POST['stored_Profile_Image'];
    } else {
        $allowedFileType = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $fileImageName = $_FILES['profile_image']['name'];
        $fileImageType = $_FILES['profile_image']['type'];
        if (in_array($fileImageType, $allowedFileType)) {
            $generateImageName = substr(md5(time()), 0, 5);
            $generateImageName = $generateImageName . '.' . substr($fileImageType, 6, 10);
            $fileImagePath = "assets/images/avatar/{$_POST['first_name']} {$_POST['last_name']}/{$generateImageName}";

            //Checking if folder empty
            if (!file_exists("assets/images/avatar/{$_POST['first_name']} {$_POST['last_name']}")) {
                mkdir("assets/images/avatar/{$_POST['first_name']} {$_POST['last_name']}");
            } else {
                //Checking if the stored path in database is empty
                if (!empty($sessionUserProfileImage)) {
                    //Checking if the linked file exist 
                    if (file_exists($sessionUserProfileImage)) {
                        unlink($sessionUserProfileImage);
                    }
                }
            }
            $fileImageTemp = $_FILES['profile_image']['tmp_name'];
            move_uploaded_file($fileImageTemp, $fileImagePath);
        } else {
            $logs[] = 'Please select a valid file';
        }
    }

    $dataToUpdateUser = [

        'username' => $_POST['username'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'gmaps' =>  $_POST['gmaps'],
        'phone_number' => $_POST['phone_number'],
        'gender' => $_POST['gender'],
        'date_of_birth' => $_POST['date_of_birth'],
        'specialty' => $_POST['specialty'],
        'profile_image' => $fileImagePath,
    ];
    array_walk($dataToUpdateUser, $sanatization);

    if (empty($logs)) {
        $updateUser = $updateUser($dataToUpdateUser, $_POST['user_id']);
        if ($updateUser) {
            header("Location:{$_SERVER['PHP_SELF']}?upSuccess");
            exit();
        }
    }
}
