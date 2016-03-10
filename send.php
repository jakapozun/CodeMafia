<?php
if(isset($_POST)){
    
$vsebina = $_POST['vsebina'];
$zadeva = $_POST['zadeva'];
$uporabnik = $_POST['uporabnik'];
}



 $to = $user['mail'];


                require_once('phpmailer/class.phpmailer.php');

                $mail = new PHPMailer();  // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->CharSet = 'utf-8';
                $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true;  // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = "jaka.pozun"; //  SMTP username
                $mail->Password = "" // SMTP password           
                $mail->SetFrom("jaka.pozun@gmail.com", "Turistika");
                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AddAddress($to);
                if (!$mail->Send()) {
                    $error = 'Mail error: ' . $mail->ErrorInfo;
                } else {
                    $error = 'Message sent!';

                    header("Location: index.php");
                    die();
                }
?> 