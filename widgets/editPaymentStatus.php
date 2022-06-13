<?php
if (($getOrderDetails['status'] == 1) and ($getOrderDetails['payment_status'] == 1)) { ?>
    <div class="form-group">
        <label class='overall-status'>Overall Status</label>

        <select class="form-control" name="" disabled>
            <option selected>Completed</option>
            <option>Pending</option>
        </select>
    </div>
    <div class="form-group">
        <label class='payment-status'>Payment Status</label>
        <select class="form-control" name="" disabled>
            <option selected>Paid</option>
            <option>Pending</option>
            <option>Cancelled</option>
        </select>
    </div>
<?php } else if (($getOrderDetails['status'] == 1) and ($getOrderDetails['payment_cancelled'] == 1)) { ?>

    <div class="form-group">
        <label class='overall-status'>Overall Status</label>

        <select class="form-control" name="" disabled>
            <option selected>Completed</option>
            <option>Pending</option>
        </select>
    </div>
    <div class="form-group">
        <label class='payment-status'>Payment Status</label>
        <select class="form-control" name="" disabled>
            <option>Paid</option>
            <option>Pending</option>
            <option selected>Cancelled</option>
        </select>
    </div>


<?php } else { ?>

    <div class="form-group">
        <label class='overall-status'>Overall Status</label>
        <select class="form-control" name="" disabled>
            <option selected>Pending</option>
        </select>
    </div>
    <div class="form-group">
        <label class='payment-status'>Payment Status</label>
        <select class="form-control" name="payment_status">
            <option>Paid</option>
            <option selected>Pending</option>
            <option>Cancelled</option>
        </select>
    </div>


<?php } ?>