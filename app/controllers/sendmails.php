<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //To load the French version
    //$mail->setLanguage('fr', '/optional/path/to/language/directory/');
    // path du dossier PHPMailer % fichier d'envoi du mail
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    function sendmails($email, $motdepass, $url)
    {
        //encoding
        $mail->CharSet = 'UTF-8';
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //contact@chuyconsultation.metchoup.com

        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isMail();                                            //Send using Mail
        $mail->Host       = 'chuyconsultation.metchoup.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'contact@chuyconsultation.metchoup.com';                     //SMTP username
        $mail->Password   = '-ZlarHBVKR!c';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('contact@chuyconsultation.metchoup.com', utf8_decode('CHU Yaoundé Consultation'));
        $mail->addAddress('koumadoulbaroud@gmail.com');     //Add a recipient
        $mail->addReplyTo('contact@chuyconsultation.metchoup.com', 'Information');
        $mail->addCC('contact@chuyconsultation.metchoup.com');
        $mail->addBCC('contact@chuyconsultation.metchoup.com');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Identifiants de connexion';
        $mail->Body    = 'Bienvenue ';

        $body  = "Bienvenue , cher(e) personnel(le) sur  <b><font size=\"4\">CHUYConsultation</font></b> , <p>";
        $body .= "plateforme de prise des rendez-vous en ligne pour une consultation au CHU Yaoundé.</p>";
        $body .= "Voici vos indentifiants de connexion en tant que personnel du CHUY : <br>";
        $body .= "<p><b>Email : ".$email."</b><br>";
        $body .= "<b>Mot de passe : ".$motdepass.".</b></p><br>";
        $body .= 'Ou bien veuillez cliquer <font size=\'3\'><a href='.$url.'>&nbsp; ici &nbsp;</a></font> afin de vous connecter.<br>';
        $body .= "Cordialement<br>";
        $body .= "Le Directeur <b>Dr. KOUMADOUL Baroud</b><br>";


        $mail->Body    = $body;

        $mail->send();
    }