<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require  __DIR__.'\..\vendor\autoload.php';

    function setUp() {
        //Create an instance; passing `true` enables exceptions
        $phpmailer = new PHPMailer(true);

        try {
            //Server settings
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '83717fc5bc0648';
            $phpmailer->Password = '874597b4159a2b';
        } catch (Exception $e) {
            echo "Server cannot be setup. Error: {$phpmailer->ErrorInfo}";
        }
        return $phpmailer;
    }

    function sendNotification($sender, $receiver, $message){
        try {
            //Setup Server first
            $phpmailer = setUp();
            //Recipients
            $phpmailer->setFrom($sender);
            $phpmailer->addAddress($receiver);

            //Content
            $phpmailer->Subject = 'Notification from your personal assistant!';
            $phpmailer->Body    = $message;

            $phpmailer->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }
        return false;
    }
?>