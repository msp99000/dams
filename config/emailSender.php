<?php
class EmailSender
{
    public function sendResetPasswordEmail($username, $newPassword)
    {
        $to = $username;
        $subject = 'Password Reset';
        $message = "Your new password is: $newPassword";
        $headers = 'From: dams@unt.com';

        mail($to, $subject, $message, $headers);
    }
}
