<form method="post" class='mode-switch-btn' action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <?php if ($sessionUserDarkMode == 1) { ?>

        <input value="0" type="hidden" name='dark_mode' />

    <?php } else { ?>

        <input value="1" type="hidden" name='dark_mode' />

    <?php } ?>
    <input value="<?php echo $sessionUserId ?>" type="hidden" name='user_id' />
    <button name='modeSwitchBtn' type="submit">

        <?php if ($sessionUserDarkMode == 1) { ?>

            <span><i class="fa-regular fa-sun"></i></span>

        <?php } else { ?>


            <span><i style='color:white' class="fa-regular fa-moon"></i></span>


        <?php } ?>

    </button>


</form>