<?php
if(isset($_POST)){
    
$body = $_POST['vsebina'];
$subject = $_POST['zadeva'];
$to = $_POST['uporabnik'];
    
    $to = strstr($to, '|', true);
}

                require_once('PHPMailer/PHPMailerAutoload.php');

                $mail = new PHPMailer();  // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->CharSet = 'utf-8';
                $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true;  // authentication enabled
                $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->Username = "urban2.kovacic@gmail.com"; //  SMTP username
                $mail->Password = "urbankovacic"; // SMTP password           
                $mail->SetFrom("urban2.kovacic@gmail.com", "Turistika");
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                if(!$mail->send()) {
                        echo 'Message was not sent.';
                        echo 'Mailer error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message has been sent.';
                    header ("Location: sporocila.php");
                    }
?> 