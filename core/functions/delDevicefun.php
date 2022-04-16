<?php
if (isset($_POST['deleteDeviceBtn'])) {

    $deleteDevice = $deleteDevice($_POST['product_id']);
    if ($deleteDevice) {
        header("Location:{$_SERVER['PHP_SELF']}?delSuccess");
    }
}
