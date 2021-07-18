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
    $this->adminModel = $this->model('Admin');
    if ($_SESSION['userType'] == 'medecin')
      $this->activeUser = $this->medecinModel->getMedecinById($user);
  }

  public function _2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C($page = "home")
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'params' => $page,
        'services' => $this->medecinModel->listeService(),
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
        'services' => $this->medecinModel->listeService()
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
          redirect('medecins/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C');
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
        'services' => $this->medecinModel->listeService(),
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
  public function _2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser
      ];
      $this->view('medecins/profileSettings', $data);
    }
  }

  public function profil()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser
      ];
      $this->view('medecins/profile', $data);
    }
  }

  public function addPatient()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser
      ];
      $this->view('medecins/add-patient', $data);
    }
  }

  public function addConsultationNew()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser
      ];
      $this->view('medecins/add-consultaion', $data);
    }
  }

  public function addConsultation($idPatient)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'idPatient' => $idPatient
      ];
      $this->view('medecins/add-consultation', $data);
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

  public function patients()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser
      ];
      $this->view('medecins/all-patients', $data);
    }
  }

  public function patientProfil($id)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'patient' => $this->medecinModel->profilePatient($id),
        'premiereinfo'=>$this->medecinModel->premiereInfo($id),
        'contacturgence'=>$this->medecinModel->recupurgence($id),
        'id'=>$id
      ];
      $this->view('medecins/patient-profil', $data);
    }
  }
  
  /** mise a jour hebdomadaire du planning des medecins */
  public function planning()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'planning' => $this->medecinModel->planning(),
        'jours' => $this->medecinModel->listeJour()
      ];
      $this->view('medecins/programme', $data);
    }
  }
  /** formulaire permettant d'emerger son planning */
  public function addPlanning()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'planning' => $this->medecinModel->planning(),
        'jours' => $this->medecinModel->listeJour()
      ];
      $this->view('medecins/planning', $data);
    }
  }
  /** control for planning fullfiling input */
  public function planningControl()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'jour' => trim($_POST['jours']),
        'disponibilites' => trim($_POST['disponibilites']),
        'jours' => $this->medecinModel->listeJour()
      ];
      if (empty($data['disponibilites'])) {
        $data['disponibilites_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['disponibilites_err'])) {
        // adding information into de table planning
        if ($this->medecinModel->planningAction($data)) {
          flash('register_success', 'Planning ajouté avec succès');
          redirect('medecins/planning');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $this->view('medecins/planning', $data);
      }
    }
  }
  /**fonction redirigeant vers le module de la messagerie instantanée  */
  public function chatapp()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser
      ];
      redirect('chuychat/Login');
    }
  }
}
