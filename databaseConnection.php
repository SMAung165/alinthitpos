<?php
$error_message = 'Sorry! We\'re experiencing difficulties.';
$link = mysqli_connect('sql103.epizy.com', 'epiz_31492145', 'Fezzj3NKEypBt9B') or die($error_message);
mysqli_select_db($link, 'epiz_31492145_pos') or die($error_message);
