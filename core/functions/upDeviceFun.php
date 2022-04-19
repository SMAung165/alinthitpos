<?php

$updateDevice = function ($dataToUpdateDevice, $productId) use ($link, $sanatization) {
    array_walk($dataToUpdateDevice, $sanatization);
    $dataToUpString = '';
    foreach ($dataToUpdateDevice as $index => $dataToUp) {

        $dataToUpString .= "`$index` = '$dataToUp', ";
    }
    $dataToUpString = substr($dataToUpString, 0, strlen($dataToUpString) - 2);
    $query =  "UPDATE `products` SET {$dataToUpString} WHERE `product_id` = $productId";
    mysqli_query($link, $query);
    return true;
};

if (isset($_POST['updateDeviceBtn'])) {
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
            $fileImagePath = "assets/images/{$_POST['product_name']}/{$generateImageName}";
            if (!file_exists("assets/images/{$_POST['product_name']}")) {
                mkdir("assets/images/{$_POST['product_name']}");
            } else {
                if (!empty($deviceQuery($_POST['product_id'])['image'])) {
                    if (file_exists($deviceQuery($_POST['product_id'])['image'])) {
                        unlink($deviceQuery($_POST['product_id'])['image']);
                    }
                }
            }
            $fileImageTemp = $_FILES['file_image']['tmp_name'];
            move_uploaded_file($fileImageTemp, $fileImagePath);
        } else {
            $logs[] = 'Please select a valid file';
        }
    }

    if (empty($_POST['initial_stock']) or $_POST['initial_stock'] == 0) {
        $initialStock = $_POST['stock'];
    } else {
        $initialStock = $_POST['initial_stock'];
    }


    $dataToUpdateDevice = [

        'product_name' => $_POST['product_name'],
        'product_brand' => $_POST['product_brand'],
        'product_model' => $_POST['product_model'],
        'specs' => $_POST['specs'],
        'color' => $_POST['color'],
        'resolution' => $_POST['resolution'],
        'expense' => $_POST['expense'],
        'price' => $_POST['price'],
        'initial_stock' => $initialStock,
        'stock' => $_POST['stock'],
        'total_sold' => $_POST['total_sold'],
        'image' => $fileImagePath,
    ];
    array_walk($dataToUpdateDevice, $sanatization);

    if (empty($logs)) {
        $updateDevice = $updateDevice($dataToUpdateDevice, $_POST['product_id']);
        if ($updateDevice) {
            header("Location:manage-devices.php?upSuccess");
            exit();
        }
    }
}
