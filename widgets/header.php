<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <div class="dropdown dib">
                        <div class="header-icon">
                            <span class="user-avatar">Language
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="lang-container">

                                            <a href="#" class='change-language' onclick="changeLanguage('en')">
                                                <i class="fa fa-globe" aria-hidden="true"></i>
                                                <span style="margin-left: 10px;">English</span>
                                                <span class="active-lang-indicator"></span>
                                            </a>
                                        </li>

                                        <li class="lang-container">
                                            <a href="#" class='change-language' onclick="changeLanguage('mm')">
                                                <i class="fa fa-globe" aria-hidden="true"></i>
                                                <span style="margin-left: 10px;">Myanmar</span>
                                                <span class="active-lang-indicator"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown dib">
                        <div class="header-icon">
                            <span class="user-avatar"><?php echo "{$sessionUserName}" ?>
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">

                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.php">
                                                <i class="ti-user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li onclick="modeSwitch(event)" class="mode-switch">
                                            <?php if ($sessionUserDarkMode == 1) { ?>
                                                <form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                                    <input value="0" type="hidden" name='dark_mode' />
                                                    <input value="<?php echo $sessionUserId ?>" type="hidden" name='user_id' />
                                                    <a class="lightMode">
                                                        <i class="fa-regular fa-sun" style='margin-right:5px;'></i>
                                                        <span>Light Mode</span>
                                                    </a>
                                                </form>
                                            <?php } else { ?>
                                                <form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                                    <input value="1" type="hidden" name='dark_mode' />
                                                    <input value="<?php echo $sessionUserId ?>" type="hidden" name='user_id' />
                                                    <a class='darkMode' onclick="">
                                                        <i style='margin-right:5px;' class="fa-regular fa-moon"></i>
                                                        <span>Dark Mode</span>
                                                    </a>
                                                </form>
                                            <?php } ?>
                                        </li>
                                        <li>
                                            <a href="core/functions/logout.php">
                                                <i class="ti-power-off"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>