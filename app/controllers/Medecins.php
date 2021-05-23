<?php
    class Medecins extends Controller
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
            $this->medecinModel = $this->model('Medecin');
            if($_SESSION['userType']=='medecin')
                $this->activeUser = $this->medecinModel->getMedecinById($user);
        }

    }
    
?>