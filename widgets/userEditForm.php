<?php
if (!isset($_SESSION['user_id'])) {
    header("location:../page-login.php");
}
?>
<form id="formEditUser" style='display:none' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input name='user_id' type="hidden" value="<?php echo $sessionUserId ?>" />
                <label>Username*</label>
                <input type="text" name="username" class="form-control" placeholder="" value="<?php echo $sessionUserName ?>" required />
            </div>
            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" class="form-control" value="<?php echo $sessionUserEmail ?>" required />
            </div>
            <div class="form-group">
                <label>First Name*</label>
                <input class="form-control" type="text" name="first_name" value="<?php echo $sessionUserFirstName ?>" required />
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" name="last_name" value="<?php echo $sessionUserLastName ?>" />
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="text" name="phone_number" value="<?php echo $sessionUserPhoneNumber ?>" />
            </div>

            <div class="form-group">
                <label>Location</label>
                <div class="row">
                    <div class="col-lg-7">
                        <label>Google Maps</label>
                        <textarea style='height:80px' class="form-control" type="text" name="gmaps"><?php echo $sessionUserGmaps ?></textarea>
                    </div>
                    <div class="col-lg-5">
                        <label>Address</label>
                        <textarea style='height:80px' class="form-control" type="text" name="address"><?php echo $sessionUserAddress ?></textarea>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-4">

            <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="gender">
                    <?php if ($sessionUserGender === 'Male') { ?>
                        <option selected>Male</option>
                        <option>Female</option>
                    <?php } else { ?>
                        <option>Male</option>
                        <option selected>Female</option>

                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input class="form-control" type="date" name="date_of_birth" value="<?php echo $sessionUserDOB  ?>" />
            </div>

            <div class="form-group">
                <label>Specialty (Skills)</label>
                <textarea style="height:100px" class="form-control" name="specialty" placeholder="Sales & Marketing, Accountant, HR"><?php echo $sessionUserSpecialty; ?></textarea>
            </div>

            <div class="form-group">
                <div class="user-photo m-b-30">
                    <label for='image' class="customImageInput">
                        <span class="imageOverlay"><i class="ti-image"></i></span>
                        <img class="img-fluid" src="<?php echo (!file_exists($sessionUserProfileImage) ? 'assets/images/user-profile.jpg' : $sessionUserProfileImage); ?>" alt="" />
                        <input style="display: none;" type="file" name="profile_image" id="image" />
                    </label>

                    <input name='stored_Profile_Image' value="<?php echo "{$sessionUserProfileImage}" ?>" type="hidden" />
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-default" name="updateUserBtn">Submit</button>
        </div>
    </div>
</form>