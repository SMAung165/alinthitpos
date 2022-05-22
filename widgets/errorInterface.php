<?php function success()
{ ?>
    <?php if (isset($_GET['inSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="insert-S">Data inserted successfully!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php } ?>

    <?php if (isset($_GET['upSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="update-S">Data updated successfully!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php  } ?>

    <?php if (isset($_GET['delSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="delete-S">Successfully deleted!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php } ?>

    <?php if (isset($_GET['passUp'])) { ?>

        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="pass-update-S">Password updated successfully!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php } ?>

    <?php if (isset($_GET['reSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="sys-reset-S">System reset completed!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php  } ?>
    <?php if (isset($_GET['mailed'])) { ?>
        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0 msg"><span class="em-S">Email has been sent!</span></p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php  } ?>
    <?php if (isset($_GET['warning'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--warning flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class='text text-warning'>Warning!</h4>
                    <p class="text-muted mb-0 msg">
                        <span class='loss-of-data'>Performing any of these will result in loss of data!</span>
                    </p>
                </div>
                <a href="#" onclick="closeNotice(event)" class="close m-2 p-2">&times;</a>
            </div>
        </div>
        <script src="assets/language/notifications.js"></script>
    <?php  } ?>


<?php } ?>

<?php success() ?>

<?php if (!empty($logs)) { ?>
    <div class="fixed-notification bottom-right-corner">
        <div class="info card info--danger flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
            <div class="d-block">
                <h4 class="text text-danger">Error!</h4>
                <?php $outputLogs($logs); ?>
            </div>
            <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
        </div>
    </div>
    <script src="assets/language/notifications.js"></script>
<?php } ?>