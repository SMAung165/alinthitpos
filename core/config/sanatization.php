<?php

$sanatization = function ($data) use ($link) {
    return mysqli_real_escape_string($link, $data);
};
