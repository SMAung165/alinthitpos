<form id='customerEditForm' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" style="display:none">
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <label>First Name*</label>
                <input type="text" name="first_name" class="form-control" placeholder="" required />
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="" />
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" class="form-control" placeholder="" />
            </div>

        </div>
        <div class="col-lg-4">


            <div class="form-group">
                <label>Address</label><textarea id="example-email" class="form-control" type="text" name="specs" style="height:235px"></textarea>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-default" name="addDevicesBtn">Submit</button>
        </div>
    </div>
</form>