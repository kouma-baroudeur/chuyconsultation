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
        if ($_SESSION['userType'] == 'medecin')
            $this->activeUser = $this->medecinModel->getMedecinById($user);
    }

    public function medecin($page = "home")
    {
        if ($_SESSION['userType'] != 'medecin') {
            notAuthorized();
        } else {
            $data = [
                // parametres utilisees pour les sous panneau
                'params' => $page,
                'medecin' => $this->activeUser
            ];
            if ($_SESSION['userState'] == 'incomplet')
                $this->view('medecins/initialForm', $data);
            else
                $this->view('medecins/home', $data);
        }
    }
    public function editP()
    {
        if ($_SESSION['userType'] != 'medecin') {
            notAuthorized();
        } else {
            $data = [
                'medecin' => $this->activeUser
            ];
            $this->view('medecins/editprofile', $data);
        }
    }
    public function rdvs($filter = "only", $etat = "")
    {
        if ($_SESSION['userType'] != 'medecin') {
        notAuthorized();
        } else {
        $data = [
            'rdv' => $this->medecinModel->medRdvAll($filter, $etat),
            'medecin' => $this->activeUser
        ];

        $this->view('medecins/allmedrdvs', $data);
        }
    }
   
}
