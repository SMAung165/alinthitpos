<?php
$error_message = 'Sorry! We\'re experiencing difficulties.';
$link = mysqli_connect('localhost', 'pos_admin', 'admin@pos') or die($error_message);
mysqli_select_db($link, 'alinnthit_pos') or die($error_message);
