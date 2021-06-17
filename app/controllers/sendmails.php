<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    function sendmails($email, $motdepass='', $url='')
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
        $mail->addAddress($email,'Personnel CHUY');     
        $mail->addReplyTo('koumadoulbaroud@gmail.com', 'CHUYC Administrateur');
        $mail->addCC('koumadoulbaroud@gmail.com');
        $mail->addBCC('koumadoulbaroud@gmail.com');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Identifiants de connexion';
        $body  = "Bienvenue , cher personnel sur  <b><font size=\"3\">CHUYConsultation</font></b>, &nbsp;";
        $body .= utf8_decode("plateforme de prise des rendez-vous en ligne pour une consultation au CHU Yaoundé.<br><br>");
        $body .= "Voici vos indentifiants de connexion en tant que personnel du CHUY : <br>";
        $body .= "<p><b>Email : ".$email."</b><br>";
        $body .= "<b>Mot de passe : ".$motdepass."</b></p><br>";
        $body .= 'Ou bien veuillez cliquer <font size=\'3\'><a href='.$url.'>&nbsp; ici &nbsp;</a></font> afin de vous authentifier.<br>';
        $body .= "Cordialement<br>";
        $body .= "Le Directeur <b>Dr. KOUMADOUL Baroud</b><br>";
        $mail->Body    = $body;
        $mail->send();
    }