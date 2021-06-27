<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    function sendnotifbymail($etat,$email,$patient,$medecin,$service,$date,$heure)
    {
        //encoding
        $mail->CharSet = 'UTF-8';
        $mail = new PHPMailer(true);
        $mail->isMail();                                   
        $mail->Host       = 'koumadoulbaroud@gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 25;

        //Recipients
        $mail->setFrom('koumadoulbaroud@gmail.com', utf8_decode('CHU Yaoundé Consultation'));
        $mail->addAddress($email,'Patient CHUY');     
        $mail->addReplyTo('koumadoulbaroud@gmail.com', 'CHUYC Administrateur');
        $mail->addCC('koumadoulbaroud@gmail.com');
        $mail->addBCC('koumadoulbaroud@gmail.com');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'CHUY Confirmation/Annulation de rendez-vous';
        $body  = utf8_decode("Bonjour M./Mme/Mlle...  <b><font size=\"2\">".strtoupper($patient).".</font></b> &nbsp;");
        $body .= utf8_decode("Votre rendez vous avec Dr  &nbsp;<b><font size=\"2\">".strtoupper($medecin)." &nbsp;</font></b>  du service &nbsp;<b><font size=\"2\">".$service.",&nbsp;</font></b> prévu pour le ".$date." à ".$heure);
        $body .= utf8_decode(" &nbsp; a été ".$etat.".<br>");
        $body .= utf8_decode("<p>Nous espérons vous voir très bientôt.<br>");
        $body .= utf8_decode("<b>Prenez soin de vous, car la santé n'a pas de prix.</b></p><br><br>");
        $body .= "Cordialement<br>";
        $body .= "Le Directeur &nbsp;<b>Dr. KOUMADOUL Baroud</b><br>";
        $mail->Body    = $body;
        $mail->send();
    }