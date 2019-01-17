<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 13/01/2019
 * Time: 08:21 PM
 */

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    private function send_mail($to, $cc, $bcc, $subject, $body)
    {
        $mail = new PHPMailer(true);                          // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->CharSet = "UTF-8";
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "your email";                 // SMTP username
            $mail->Password = "your password";                           // SMTP password
            // Enable TLS encryption, `ssl` also accepted
            // TCP port to connect to
            //Recipients
            $mail->setFrom('rowtiantech@gmail.com', 'Rowtian Tech');
            //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            $mail->addAddress($to);               // Name is optional
            $mail->addReplyTo('rowtaintech@gmail.com', 'Rowtian Tech');
            if ($cc) {
                $mail->addCC($cc);
            }
            if (!empty($bcc)) {
                $mail->addBCC($bcc);
            }
            /* //Attachments
             $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
             $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $body;
            if ($mail->send()) {
                set_message("mail sent");
                return true;
            } else {
                set_message("unable to send message at this time");
                return false;
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        return true;
    }


    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $to = filter_input(INPUT_POST, "to", FILTER_SANITIZE_EMAIL);
            $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
            $cc = filter_input(INPUT_POST, "cc", FILTER_SANITIZE_EMAIL);
            $bcc = filter_input(INPUT_POST, "bcc", FILTER_SANITIZE_EMAIL);
            $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS);
            $mailer = new Mail();
            $mailer->send_mail($to, $cc, $bcc, $subject, $body);
        }
    }
}
