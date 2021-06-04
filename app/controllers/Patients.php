<?php
/* controller of our model Patient */
class Patients extends Controller
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
    $this->patientModel = $this->model('Patient');
    if ($_SESSION['userType'] == 'patient')
      $this->activeUser = $this->patientModel->getPatientById($user);
  }

  public function index()
  {
    /* this->patient("patient"); */
  }
  public function patient($page = "home")
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        // parametres utilisees pour les sous panneau
        'params' => $page,
        'patient' => $this->activeUser
      ];
      if ($_SESSION['userState'] == 'incomplet')
        $this->view('patients/initialForm', $data);
      else
        $this->view('patients/home', $data);
    }
  }

  public function dm()
  {
    $activeUser = $this->activeUser;
    $this->view('patients/Pdf', $activeUser);
  }
  public function createProfile()
  {
    if (isLoggedIn() && $_SESSION['userState'] == 'incomplet') 
    {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'nom' => trim($_POST['nom']),
        'prenom' => trim($_POST['prenom']),
        'dateNaissance' => trim($_POST['dateNaissance']),
        'lieuNaissance' => trim($_POST['lieuNaissance']),
        'sexe' => $_POST['sexe'],
        'adresse' => trim($_POST['adresse']),
        'nom_err' => '',
        'prenom_err' => '',
        'date_err' => '',
        'lieu_err' => '',
        'adresse_err' =>''
      ];

      if(empty($data['nom'])){
        $data['nom_err'] = 'Veuillez renseigner ce champ.';
      }
      if(empty($data['prenom'])){
          $data['prenom_err'] = 'Veuillez renseigner ce champ.';
      }
      if(empty($data['dateNaissance'])){
          $data['date_err'] = 'Veuillez renseigner ce champ.';
      }
      if(empty($data['lieuNaissance'])){
        $data['lieu_err'] = 'Veuillez renseigner ce champ.';
      }
      if(empty($data['adresse'])){
        $data['adresse_err'] = 'Veuillez renseigner ce champ.';
      }

      if(empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['adresse_err']))
      {
        // adding information into de table patient
        if($this->patientModel->createProfile($data))
        {
          flash('register_success','Vous êtes bien inscrit');
          redirect('patients/patient');
        }else {
          die('Quelque chose qui ne va pas bien!');
        }      
      }else{
        $this->view('patients/initialForm',$data);
      }
    }else {
      // Init data
      $data = [
        'nom' => '',
        'prenom' => '',
        'dateNaissance' => '',
        'lieuNaissance' => '',
        'sexe' => '',
        'adresse' => '',
        'nom_err' => '',
        'prenom_err' => '',
        'date_err' => '',
        'lieu_err' => '',
        'adresse_err' =>''
      ];
      
      // load form
      $this->view('patients/initialForm',$data);
    }
  }

  public function profile()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $activeUser = $this->activeUser;
      $this->view('patients/profile', $activeUser);
    }
  }

  public function rendezvous($etat = '')
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'rdv' => $this->patientModel->rendezvous($etat),
        'patient' => $this->activeUser
      ];
      $this->view('patients/report', $data);
    }
  }
  public function editP()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->activeUser
      ];
      $this->view('patients/editprofile', $data);
    }
  }

  public function askRdv()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->activeUser,
        'userId' => $_SESSION['userId'],
        'medecins' => $this->patientModel->listeMedecins()
      ];
      $this->view('patients/askRdv', $data);
    }
  }

  public function askRdvAction($id)
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['dateRdv']) && isset($_POST['codeMedecin'])) {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'IP' => $id,
            'codeMedecin' => $_POST['codeMedecin'],
            'dateRdv' => $_POST['dateRdv'],
            'heureRdv' => $_POST['heureRdv']
          ];
          if ($this->patientModel->askRdv($data)) {
            flash('EtatPostEditCons', "Votre rendez-vous a été crée avec succés!", 'alert alert-success');
          } else {
            flash('EtatPostEditCons', "oops! erreur inattendue!", 'alert alert-danger');
          }
        } else {
          flash('EtatPostEditCons', "Veuiller remplir tous les champs requis!", 'alert alert-danger');
        }
      }
    }
    redirect('patients/patient');
  }
  public function planning($etat = '')
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'planning' => $this->patientModel->planning($etat),
        'patient' => $this->activeUser
      ];
      $this->view('patients/planning', $data);
    }
  }
  public function medoc($etat = '')
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'medoc' => $this->patientModel->medoc($etat),
        'patient' => $this->activeUser
      ];
      $this->view('patients/medoc', $data); 
    }
  }

  public function consult($etat = '')
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'consult' => $this->patientModel->consult($etat),
        'patient' => $this->activeUser
      ];
      $this->view('patients/consultations', $data);
    }
  }
}
