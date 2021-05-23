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
                $this->activeUser = $this->medecinModel->getAdminById($user);
        }
    }
    
?>