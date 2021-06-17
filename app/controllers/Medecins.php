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
                'services'=>$this->medecinModel->listeService(),
                'medecin' => $this->activeUser
            ];
            if ($_SESSION['userState'] == 'incomplet')
                $this->view('medecins/initialForm', $data);
            else
                $this->view('medecins/home', $data);
        }
    }
    public function createProfile()
    {
      if (isLoggedIn() && $_SESSION['userState'] == 'incomplet') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'service' => trim($_POST['service']),
          'tel' => trim($_POST['tel']),
          'dateNaissance' => trim($_POST['dateNaissance']),
          'lieuNaissance' => trim($_POST['lieuNaissance']),
          'sexe' => $_POST['sexe'],
          'adresse' => trim($_POST['adresse']),
          'nom_err' => '',
          'prenom_err' => '',
          'tel_err' => '',
          'date_err' => '',
          'lieu_err' => '',
          'adresse_err' => '',
          'services'=>$this->medecinModel->listeService()
        ];
  
        if (empty($data['nom'])) {
          $data['nom_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['prenom'])) {
          $data['prenom_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['dateNaissance'])) {
          $data['date_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['lieuNaissance'])) {
          $data['lieu_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['adresse'])) {
          $data['adresse_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['tel']) || (!preg_match("/^[0-9]{9}$/", $data['tel']))) {
          $data['tel_err'] = 'Veuillez renseigner ce champ.';
        }
  
        if (empty($data['nom_err']) && empty($data['tel_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['adresse_err'])) {
          // adding information into de table patient
          if ($this->medecinModel->createProfile($data)) {
            flash('register_success', 'Vous êtes bien inscrit');
            redirect('medecins/medecin');
            //$this->view('medecins/home', $data);
          } else {
            die('Quelque chose qui ne va pas bien!');
          }
        } else {
          $this->view('medecins/initialForm', $data);
        }
      } else {
        // Init data
        $data = [
          'nom' => '',
          'prenom' => '',
          'tel' => '',
          'service' => '',
          'services'=>$this->medecinModel->listeService(),
          'dateNaissance' => '',
          'lieuNaissance' => '',
          'adresse' => '',
          'nom_err' => '',
          'prenom_err' => '',
          'tel_err' => '',
          'date_err' => '',
          'lieu_err' => '',
          'adresse_err' => ''
        ];
  
        // load form
        $this->view('medecins/initialForm', $data);
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
