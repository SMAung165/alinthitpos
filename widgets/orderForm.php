<form id='orderForm' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>Order No.</label>
                <input type="text" name="order_number" value="<?php echo $nextOrderNumber ?>" class="form-control" placeholder="" required readonly />
            </div>

        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Customer ID*</label>
                <input type="text" name="order_customer_number" class="form-control" placeholder="" required />
            </div>

        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Device ID*</label>
                <input type="text" name="order_device_id" class="form-control" placeholder="" required />
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Quantity*</label>
                <input type="text" name="quantity" class="form-control" placeholder="" value="1" required />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-default" name="addOrderBtn">Submit</button>
        </div>
    </div>
</form>