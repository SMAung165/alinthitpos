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
                    <a href="index.php"><i class="ti-home"></i> <span class="dashboard">Dashboard</span> <span class="badge badge-primary"><?php echo number_format_short($totalProfitCalc(true)) ?></span></a>
                </li>
                <li class="label">Stocks</li>
                <li><a class="sidebar-sub-toggle" id=""><i class="ti-mobile"></i><span class="devices">Devices</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="device-list.php" id=""><span class="device-list">Device List</span><span class="badge badge-primary"><?php echo number_format_short($getRowCount('products')) ?></span></a></li>
                        <li><a href="add-android-devices.php" id=""><span class="add-devices">Add Devices</span></a></li>
                        <li><a href="manage-devices.php" id=""><span class="manage-devices">Manage Devices</span></a></li>
                    </ul>
                </li>
                <?php if ($sessionUserRole === 'Admin') { ?>
                    <li class="label">Users</li>
                    <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i><span class="admin">Admin</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="admin-list.php" id=""><span class="admin-list">Admin List</span> <span class="badge badge-primary"><?php echo number_format_short($getRowCount('users')) ?></span></a></li>
                            <li><a href="add-admin.php" id=""><span class="add-admin">Add Admin</span></a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i><span class="employees-and-salary">Employees and Salary</span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="employee-list.php" id=""><span class="employee-list">Employee List</span> <span class="badge badge-primary"><?php echo number_format_short($getRowCount('employees')) ?></span></a></li>
                            <li><a href="add-employee.php" id=""><span class="add-employee">Add Employee</span></a></li>
                            <li><a href="manage-salary.php" id=""><span class="manage-salary">Manage Salary</span></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li><a class="sidebar-sub-toggle" id=""><i class="ti-user"></i> <span class="customer-and-order">Customer and Order</span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="customer-list.php"><span class="customer-list">Customer List </span><span class="badge badge-primary"><?php echo number_format_short($getRowCount('customers')) ?></span> </a></li>
                        <li><a href="manage-order.php"><span class="manage-order">Manage Order </span><span class="badge badge-primary"><?php echo number_format_short($expectToEarn()['count']) ?></span></a></li>
                        <li><a href="add-customer-and-order.php" class="add-customer-and-order">Add Customer and Order</a></li>
                    </ul>
                </li>
                <li><a href="app-profile.php"><i class="ti-user"></i><span class="my-profile">My Profile</span></a></li>
                <?php if ($sessionUserRole === 'Admin') { ?>
                    <li class="label">System</li>
                    <li>
                        <a href="control-panel.php?warning"><i class='ti-settings'></i><span class='control-panel'>Control Panel</span></a>
                    </li>
                <?php } ?>
                <li class="label">Account Settings</li>
                <li><a href="change-password.php"><i class="ti-lock"></i><span class='change-password'>Change Password</span></a></li>
                <li><a href="core/functions/logout.php"><i class="ti-close"></i> Logout</a></li>

            </ul>
        </div>
    </div>
</div>