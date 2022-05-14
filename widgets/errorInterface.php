<?php function success()
{ ?>
    <?php if (isset($_GET['inSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">Data inserted successfully!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($_GET['upSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">Data updated successfully!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php  } ?>

    <?php if (isset($_GET['delSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">
            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">Successfully deleted!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($_GET['passUp'])) { ?>

        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">Password updated successfully!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($_GET['reSuccess'])) { ?>
        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">System reset completed!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php  } ?>
    <?php if (isset($_GET['mailed'])) { ?>
        <div class="fixed-notification bottom-right-corner">

            <div class="info card info--success flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
                <div class="d-block">
                    <h4 class="text text-success">Success</h4>
                    <p class="text-muted mb-0">Email has been sent!</p>
                </div>
                <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
            </div>
        </div>
    <?php  } ?>


<?php } ?>

<?php success() ?>

<?php if (!empty($logs)) { ?>
    <div class="fixed-notification bottom-right-corner">
        <div class="info card info--danger flex-row p-4 mb-3 shadow d-flex justify-content-between align-items-center">
            <div class="">
                <h4 class="text text-danger">Error!</h4>
                <?php $outputLogs($logs); ?>
            </div>
            <a onclick="closeNotice(event)" class="close m-2 p-2"><i class="ti-close" style="font-size: 1rem;"></i></a>
        </div>
    </div>
<?php } ?>