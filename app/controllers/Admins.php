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
            if($_SESSION['userType']=='admin')
                $this->activeUser = $this->adminModel->getAdminById($user);
        }
       
        public function admin($page="home")
        { 
            if ($_SESSION['userType'] != 'admin') {
                notAuthorized();
            } else {
                $data = [
                // parametres utilisees pour les sous panneau
                'params' => $page,
                'admin' => $this->activeUser
                ];
                if($_SESSION['userState']=='incomplet')
                $this->view('admins/initialForm', $data);
                else
                $this->view('admins/home', $data);
            }
        }
    }
    
?>