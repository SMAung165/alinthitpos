<div class="confirm-form-container" style="display:none">
    <div class="card">
        <div class="card-title">
            <h5 class="text-warning">Warning!</h5>
        </div>
        <div class="card-subtitle">
            <h6 class="msg"><?php echo "{$warning}" ?></h6>
        </div>
        <div class="card-body">
            <form method='post' action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <?php echo $input ?>
                <div class="form-group">
                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success col-12" name="okay_btn">Okay</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger col-12" name="cancel_btn">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/language/notifications.js"></script>