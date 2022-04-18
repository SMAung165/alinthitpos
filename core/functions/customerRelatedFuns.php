<?php
$listCustomers = function () use ($link) {

    $query =  "SELECT * FROM `customers`";
    $queryResult = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($queryResult)) {

        echo ("<tr >
            <td>{$row['customer_id']}</td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['address']}</td>
            <td>{$row['phone_number']}</td>
            <td>
                <div class='dropdown'>
                    <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' style='font-size:1rem'>
                        <span>Action</span>
                        <span class='caret'></span>
                    </button>
                    <ul class='dropdown-menu myActionDropDown'>
                        <li><form action='#' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><button type='submit' name='deviceDetailsBtn'><i class='ti-file'></i> Details</button></form></li>
                        <li><form action='#' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><button type='submit' name='editDeviceBtn'><i class='ti-pencil-alt'></i> Edit</button></form></li>
                        <li><form action='#' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><button type='submit' name='editDeviceBtn'><i class='ti-printer'></i> Print</button></form></li>
                        <li><form action='{$_SERVER['PHP_SELF']}' method='post'><input type='hidden' name='customer_id' value='{$row['customer_id']}' /><button type='submit' name='deleteDeviceBtn'><i class='ti-trash'></i> Delete</button></form></li>
                    </ul>
                </div>
            </td>
        </tr>");
    }
};
