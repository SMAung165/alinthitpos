<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.php">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span>
                    </a></div>
                <li class="label">Main</li>
                <li>
                    <a href="index.php"><i class="ti-home"></i> Dashboard <span class="badge badge-primary"><?php echo number_format_short($totalProfitCalc(true)) ?></span></a>
                </li>
                <li class="label">Stocks</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-mobile"></i> Devices <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="device-list.php">Device List<span class="badge badge-primary"><?php echo number_format_short($getRowCount('products')) ?></span></a></li>
                        <li><a href="add-android-devices.php">Add Devices</a></li>
                        <li><a href="manage-devices.php">Manage Devices</a></li>
                    </ul>
                </li>

                <li class="label">Users</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Admin <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="admin-list.php">Admin List <span class="badge badge-primary"><?php echo number_format_short($getRowCount('users')) ?></span></a></li>
                        <li><a href="add-admin.php">Add Admin</a></li>
                        <li><a href="chartjs.html">Admin Management</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Customer<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="customer-list.php">Customer List <span class="badge badge-primary"><?php echo number_format_short($getRowCount('customers')) ?></span> </a></li>
                        <li><a href="manage-order.php">Manage Order <span class="badge badge-primary"><?php echo number_format_short($getRowCount('customerorder')) ?></span></a></li>
                        <li><a href="add-customer-and-order.php">Add Customer and Order</a></li>
                    </ul>
                </li>
                <li><a href="app-email.html"><i class="ti-email"></i> Email <span class="badge badge-primary">0</span> </a></li>
                <li><a href="app-profile.php"><i class="ti-user"></i>My Profile</a></li>
                <li class="label">Features</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-alerts.html">Alerts</a></li>

                        <li><a href="ui-button.html">Button</a></li>
                        <li><a href="ui-dropdown.html">Dropdown</a></li>

                        <li><a href="ui-list-group.html">List Group</a></li>

                        <li><a href="ui-progressbar.html">Progressbar</a></li>
                        <li><a href="ui-tab.html">Tab</a></li>

                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="uc-calendar.html">Calendar</a></li>
                        <li><a href="uc-carousel.html">Carousel</a></li>
                        <li><a href="uc-weather.html">Weather</a></li>
                        <li><a href="uc-datamap.html">Datamap</a></li>
                        <li><a href="uc-todo-list.html">To do</a></li>
                        <li><a href="uc-scrollable.html">Scrollable</a></li>
                        <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="uc-toastr.html">Toastr</a></li>
                        <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                        <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                        <li><a href="uc-nestable.html">Nestable</a></li>

                        <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                        <li><a href="uc-rating-jRate.html">jRate</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="table-basic.html">Basic</a></li>

                        <li><a href="table-export.html">Datatable Export</a></li>
                        <li><a href="table-row-select.html">Datatable Row Select</a></li>
                        <li><a href="table-jsgrid.html">Editable </a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="font-themify.html">Themify</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="gmaps.html">Basic</a></li>
                        <li><a href="vector-map.html">Vector Map</a></li>
                    </ul>
                </li>
                <li class="label">Form</li>
                <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                <li class="label">Extra</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="invoice.html">Basic</a></li>
                        <li><a href="invoice-editable.html">Editable</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-reset-password.html">Forgot password</a></li>
                    </ul>
                </li>
                <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li>
                <li><a href="core/functions/logout.php"><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>