<div class="col-lg-12 add-salary-form">
    <div class="card">

        <div class="row">
            <div style='text-align:center' class="col-lg-12">
                <a href='#' class='form-close'>
                    <i class="ti-close"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="basic-elements">
                <form id='' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id='employee-input'>
                                <label><span class="employee">Employee</span> ID*</label>
                                <input type="text" name="employee_id" class="form-control" placeholder="" id='employee-id' required value='' autocomplete="off" />
                                <?php $showSuggestionBox('employees', 'employee_id', 'first_name', 'last_name', 'ti-user') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id='device-input'>
                                <label><span class='basic-salary'>Basic Salary</span>*</label>
                                <input type="number" name="basic_salary" class="form-control" placeholder="" value='0' required autocomplete="off" />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><span class='bonus'>Bonus</span>*</label>
                                <input type="number" name="bonus" class="form-control" placeholder="" value="0" required autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><span class='month'>Month</span>*</label>
                                <select class='form-control' name="salary_month" id='select-salary-month' required>
                                    <option><?php echo (date('F - Y')); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label><span class='forced'>Mode</span></label>
                                <select name="forced" class="form-control">
                                    <option selected>Normal</option>
                                    <option>Forced</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button style='width:100%' type="submit" class="btn btn-default" name="add_salary_btn"><span class="submit">Submit</span></button>
                            </div>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>