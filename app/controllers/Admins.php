<?php
class Admins extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn())
            notAuthorized();
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $this->adminModel = $this->model('Admin');
        if ($_SESSION['userType'] == 'admin')
            $this->activeUser = $this->adminModel->getAdminById($user);
    }

    public function admin($page = "home")
    {
        if ($_SESSION['userType'] != 'admin') {
            notAuthorized();
        } else {
            $data = [
                // parametres utilisees pour les sous panneau
                'params' => $page,
                'admin' => $this->activeUser
            ];
            $this->view('admins/home', $data);
        }
    }
    public function staff()
    {
        if ($_SESSION['userType'] != 'admin') {
            notAuthorized();
        } else {
            $data = [
                'admin' => $this->activeUser,
                'userId' => $_SESSION['userId'],
                'medecins' => $this->adminModel->user()
            ];
            $this->view('admins/user', $data);
        }
    }
    /* public function sendMail($mail_to, $pass)
    {
        //sending mail to physician
        // create email headers
        $email = "koumadoulbaroud@gmail.com";
        $email_subject = "Identifiants de compte au CHUY";
        $email_message = "Bienvenue dans le système cher personnel du CHU Yaoundé.";
        $email_message.="Voici vos identifiants pour avoir accès à votre espace :\n";
        $email_message.="adresse email".$mail_to." et mot de passe" .$pass."\n";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$email."\r\n".'No-Reply: ' . $email . "\r\n";
        @mail($mail_to, $email_subject, $email_message, $headers);
    } */
    public function registerstaff()
    {
        // check for posts
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitizing the inputs (to avoid sql injection)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'type' => trim($_POST['type']),
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
                'type_err' => ''
            ];
            if (empty($data['email'])) { // checking email in server side
                $data['email_err'] = 'Veuillez entrer l\'e-mail.';
            } else {
                if ($this->adminModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email déja enregistré, veuillez entrer un nouveau';
                }
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Veuillez entrer un mot de passe.';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] .= 'Le mot de passe doit être au moins 6 caracteres';
            }
            if (empty($data['confirm_pass'])) {
                $data['confirm_pass_err'] = 'Veuillez confirmer le mot de passe.';
            } else {
                if ($data['password'] != $data['confirm_pass'])
                    $data['confirm_pass_err'] = 'La confirmation ne correspond pas au mot de passe';
            }

            if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['type_err'])) {


                // hashing the password for security
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // register user
                if ($this->adminModel->registerstaff($data)) {

                    flash('register_success', 'Un mail est a été envoyé au médecin, il est bien ajouté dans le système');

                    redirect('admins/staff');
                } else {
                    die('Quelque chose ne va pas bien!');
                }
            } else {

                $this->view('admins/registerstaff', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'confirm_pass' => '',
                'type' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
                'type_err' => ''
            ];

            // load form
            $this->view('admins/registerstaff', $data);
        }
    }
}
