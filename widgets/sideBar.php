<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="index.php">
                        <span class='alinthit'></span>
                    </a>
                </div>
                <li class="label">Main</li>
                <li>
                    <a href="index.php"><i class="ti-home"></i> <span id="dashboard">Dashboard</span> <span class="badge badge-primary"><?php echo number_format_short($totalProfitCalc(true)) ?></span></a>
                </li>
                <li class="label">Stocks</li>
                <li><a class="sidebar-sub-toggle" id=""><i class="ti-mobile"></i><span id="devices">Devices</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="device-list.php" id=""><span id="deviceList">Device List</span><span class="badge badge-primary"><?php echo number_format_short($getRowCount('products')) ?></span></a></li>
                        <li><a href="add-android-devices.php" id=""><span id="addDevices">Add Devices</span></a></li>
                        <li><a href="manage-devices.php" id=""><span id="manageDevices">Manage Devices</span></a></li>
                    </ul>
                </li>
                <?php if ($sessionUserRole === 'Admin') { ?>
                    <li class="label">Users</li>
                    <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i><span id="admin">Admin</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin-list.php" id=""><span id="adminList">Admin List</span> <span class="badge badge-primary"><?php echo number_format_short($getRowCount('users')) ?></span></a></li>
                            <li><a href="add-admin.php" id=""><span id="addAdmin">Add Admin</span></a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i><span id="employeesAndSalary">Employees and Salary</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="employee-list.php" id=""><span id="employeeList">Employee List</span> <span class="badge badge-primary"><?php echo number_format_short($getRowCount('employees')) ?></span></a></li>
                            <li><a href="add-employee.php" id=""><span id="addEmployee">Add Employee</span></a></li>
                            <li><a href="manage-salary.php" id=""><span id="manageSalary">Manage Salary</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i> <span id="customerAndOrder">Customer and Order</span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="customer-list.php"><span id="customerList">Customer List </span><span class="badge badge-primary"><?php echo number_format_short($getRowCount('customers')) ?></span> </a></li>
                        <li><a href="manage-order.php"><span id="manageOrder">Manage Order </span><span class="badge badge-primary"><?php echo number_format_short($expectToEarn()['count']) ?></span></a></li>
                        <li><a href="add-customer-and-order.php" id="addCustomerAndOrder">Add Customer and Order</a></li>
                    </ul>
                </li>
                <li><a href="app-profile.php"><i class="ti-user"></i><span id="myProfile">My Profile</span></a></li>
                <?php if ($sessionUserRole === 'Admin') { ?>
                    <li class="label">System</li>
                    <li>
                        <a href="control-panel.php#warning"><i class='ti-settings'></i><span id='controlPanel'>Control Panel</span></a>
                    </li>
                <?php } ?>
                <li class="label">Account Settings</li>
                <li><a href="change-password.php"><i class="ti-lock"></i><span id='changePassword'>Change Password</span></a></li>
                <li><a href="core/functions/logout.php"><i class="ti-close"></i> Logout</a></li>

            </ul>
        </div>
    </div>
</div>