<?php
$error_message = 'Sorry! We\'re experiencing difficulties.';
$link = mysqli_connect('localhost', 'pos_admin', 'Admin@pos1652000') or die($error_message);
mysqli_select_db($link, 'pos') or die($error_message);
