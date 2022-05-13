<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('vendor/phpmailer/phpmailer/src/Exception.php');
require_once('vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('vendor/phpmailer/phpmailer/src/SMTP.php');

if (isset($_POST['forgot_password'])) {


    $email = $_POST['recovery_email'];

    if ($userRecovery($email) === false) {

        $logs[] = "Email does not exist!";
    } else {
        $recovery_email = $userRecovery($email)['email'];
        $username = $userRecovery($email)['username'];
        $userId = intval($userRecovery($email)['user_id']);
        $OTP = mt_rand(10000, 99999);

        $query = "UPDATE `users` SET `OTP` = '{$OTP}' WHERE `user_id` = {$userId}";
        mysqli_query($link, $query);

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "alinthitpos@gmail.com";
        $mail->Password   = "admin@alinthitpos";

        $mail->IsHTML(true);
        $mail->AddAddress($recovery_email, $username);
        $mail->SetFrom("alinthitpos@gmail.com", "Alin Thit");
        $mail->AddReplyTo("alinthitpos@gmail.com", "Alin Thit");
        // $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = "Account Recovery";
        $content = "Your recovery code is : <b>{$OTP}</b>";
        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            $logs[] = "Error while sending Email.";
        } else {
            $_SESSION['recover_user_id'] = $userId;
            header("location:confirm-otp.php");
            // echo "<form method='post' action='confirm-otp.php' id='header'>

            //         <input name='user_id' type='hidden' value='{$userId}'/>

            //      </form>

            //     <script type='text/javascript'>

            //     window.onload = ()=>{

            //         document.getElementById('header').submit();

            //     }

            //     </script>

            //      ";
            exit();
        }
    }
}
