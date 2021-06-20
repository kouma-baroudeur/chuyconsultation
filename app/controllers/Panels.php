<?php
  class Panels extends Controller
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
      $this->panelModel = $this->model('Panel');
      if($_SESSION['userType']=='patient' || $_SESSION['userType']=='medecin')
      $this->activeUser = $this->panelModel->getPorMById($user);
    }
    
  }
?>