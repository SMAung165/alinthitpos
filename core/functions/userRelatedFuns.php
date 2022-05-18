<?php

$userExist = function ($username) use ($link, $sanatization) {
    $username = $sanatization($username);
    $query = "SELECT `username` FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);

    $finalizedResult = mysqli_fetch_array($queryResult)['username'];
    return ($finalizedResult === $username) ? true : false;
};

$emailExist = function ($email) use ($link, $sanatization) {
    $email = $sanatization($email);
    $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult['email'] === $email) ? true : false;
};

$userActive = function ($username) use ($link, $sanatization) {
    $username = $sanatization($username);
    $query =  "SELECT `active` FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult)['active'];
    return ((bool)$finalizedResult ?? false);
};
$login = function ($username, $password) use ($link, $sanatization) {
    $username = $sanatization($username);
    $password = md5($sanatization($password));
    $query =  "SELECT * FROM `users` WHERE `username` = '$username'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return (($finalizedResult['password'] === $password) ? $finalizedResult['user_id'] : false);
};

$getUserData = function ($sessionUserId) use ($link) {
    $user_id = (int)($sessionUserId);
    $query =  "SELECT * FROM `users` WHERE `user_id` = {$user_id}";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult);
};

$userRecovery = function ($email) use ($link, $sanatization) {
    $email = $sanatization($email);
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $queryResult = mysqli_query($link, $query);
    $finalizedResult = mysqli_fetch_array($queryResult);
    return ($finalizedResult['email'] === $email) ? $finalizedResult : false;
};

function finalizedLoggedIn($sessionUserId)
{
    if (isset($sessionUserId)) {
        return true;
    } else {
        return false;
    }
}

$outPutSessionUserSpecialty = function ($sessionUserSpecialty) {

    $sessionUserSpecialty = explode(',', $sessionUserSpecialty);
    foreach ($sessionUserSpecialty as $specialty) {
        $specialty = trim($specialty, "\n\r\t\v\x00");
        echo "<li>{$specialty}</li>";
    }
};

$listUsers = function () use ($link) {

    $query =  "SELECT * FROM `users`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {
        $btnDeleteAdmin = "<td>
                            <button type='button' class='delete-admin-btn status btn btn-secondary'>
                                <i class='ti-trash'></i>
                                <span id='delete'>Delete</span>
                            </button>
                            <div class='form-container'>
                                <form action='{$_SERVER['PHP_SELF']}' method='post' class='delete-admin-confirm-box card'>
                                <span class='close-btn'><i class='ti-close'></i></span>
                                    <input type='hidden' name='user_id' value='{$row['user_id']}' />
                                    <div class='form-group'>
                                        <label>Enter Your Password</label>
                                        <input type='password' value='' name='delete_confirmation_password' class='form-control' required/>
                                    </div>
                                    
                                    <button type='submit' name='confirmBtn' class='btn btn-secondary' >
                                        Confirm
                                    </button>
                                </form>
                            </div>
                        </td>";

        $btnActive = "<td>
                        <form action='{$_SERVER['PHP_SELF']}' method='post'>
                            <input type='hidden' name='user_id' value='{$row['user_id']}' />
                            <input type='hidden' name='role' value='{$row['role']}' />
                            <button name='activatedBtn' type='submit' class='status btn btn-success'>
                                <i class='ti-check'></i>
                                Activated
                            </button>
                        </form>
                    </td>";

        $btnInactive = "<td>
                            <form action='admin-list.php' method='post'>
                                <input type='hidden' name='user_id' value='{$row['user_id']}' />
                                <input type='hidden' name='role' value='{$row['role']}' />
                                <button name='deactivatedBtn' type='submit' class='status btn btn-danger'>
                                    <i class='ti-close'></i>
                                    Activated
                                </button>
                            </form>
                        </td>";
        $active  = ((bool)$row['active'] === true) ?  $btnActive : $btnInactive;
        echo ("
            
                <tr class='adminTr'>
                    {$btnDeleteAdmin}
                    <form action='admin-profile.php' method='post'>
                        <td>USR{$row['user_id']} <input type='hidden' name='user_id' value='{$row['user_id']}' /> </td>
                    </form>
                    <td>{$row['username']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['role']}</td>
                    {$active}
                    
                </tr>

        ");
    }
};
