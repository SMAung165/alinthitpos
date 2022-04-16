<?php

if (isset($_POST['addDevicesBtn'])) {

    $required_fileds = ['product_name', 'product_brand', 'product_model', 'specs', 'price', 'stock'];

    foreach ($_POST as $key => $value) {
        if (empty($value) and in_array($key, $required_fileds)) {
            $logs[] = "{$key} is required! <br/><br/>";
        }
    }

    if (empty($logs)) {
        $fileImagePath = '';

        if (empty($_FILES['file_image']['name'])) {
        } else {
            $allowedFileType = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $fileImageName = $_FILES['file_image']['name'];
            $fileImageType = $_FILES['file_image']['type'];
            if (in_array($fileImageType, $allowedFileType)) {
                $generateImageName = substr(md5(time()), 0, 5);
                $generateImageName = $generateImageName . '.' . substr($fileImageType, 6, 10);
                $fileImagePath = "assets/images/{$_POST['product_name']}/{$generateImageName}";
                if (!file_exists("assets/images/{$_POST['product_name']}")) {

                    mkdir("assets/images/{$_POST['product_name']}");
                }
                $fileImageTemp = $_FILES['file_image']['tmp_name'];
                move_uploaded_file($fileImageTemp, $fileImagePath);
            } else {
                $logs[] = 'Please select a valid file';
            }
        }
        //Insert data into database
        $dateTime = (date("Y-m-d") . ' ' . date("h:i:s"));
        $dataToInsert = [
            'device_id' => $_POST['device_id'],
            'product_name' => $_POST['product_name'],
            'product_model' => $_POST['product_model'],
            'product_brand' => $_POST['product_brand'],
            'specs' => trim($_POST['specs'], " \n\r\t\v\x00"),
            'resolution' => $_POST['resolution'],
            'color' => $_POST['color'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'image' => $fileImagePath,
            'entry_date' => $dateTime,
        ];

        if (empty($logs)) {
            $insertIntoDatabaseDevices =  $insertIntoDatabaseDevices($dataToInsert);
            header("Location:{$_SERVER['PHP_SELF']}?inSuccess");
            exit();
        }
    }
}