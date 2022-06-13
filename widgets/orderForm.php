<form id='orderForm' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label><span class="order-number"></span></label>
                <input type="text" name="order_number" value="<?php echo $nextOrderNumber ?>" class="form-control" placeholder="" required readonly />
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group" id='customer-input'>
                <label><span class="customer-id"></span>*</label>
                <input type="text" name="order_customer_number" class="form-control" placeholder="" id='customer-number' required autocomplete="off" />
                <?php $showSuggestionBox('customers', 'customer_number', 'first_name', 'last_name', 'ti-user') ?>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="form-group" id='device-input'>
                <label><span class='device-id'></span>*</label>
                <input type="text" name="order_device_id" class="form-control" placeholder="" id='device-id' required autocomplete="off" />
                <?php $showSuggestionBox('products', 'device_id', 'product_model', 'color', 'ti-mobile') ?>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label><span class='quantity'></span>*</label>
                <input type="number" name="quantity" class="form-control" placeholder="" value="1" required autocomplete="off" />
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-default" name="addOrderBtn"><span class="submit"></span></button>
        </div>
    </div>
</form>