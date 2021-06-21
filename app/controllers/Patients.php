<?php
/**
 * controller of our model Patient
 * C'est dans ce controlleur qu'on traite toutes les données des
 * formulaires du patient et on renvoit des données qui seront afficher à la vue
 * en invoquant le modèle qui fait les différents traitements (requêtes, accès à la BD, etc.)
 *
 * @author KOUMADOUL Baroud (UY1-ICT4D 2020-2021) <koumadoulbaroud@gmail.com>
 */
class Patients extends Controller
{
  //the constructor
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
  /** première page et la principale, considéré comme index du controlleur patient
   * c'est ici que lorsque le pqtient se connecte pour la première fois, l'on décide
   * où le rediriger grâce à son état
   * 
  */
  public function patient($page = "home")
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'params' => $page,
        'patient' => $this->activeUser
      ];
      if ($_SESSION['userState'] == 'incomplet')
        $this->view('patients/initialForm', $data);
      else
        $this->view('patients/home', $data);
    }
  }
  /** fonction appelant le dossier médicale en pdf afin de permettre le telechargement */
  public function dm()
  {
    $data = [
      'patient' => $this->activeUser,
      'urgence' => $this->patientModel->recupurgence()
    ];
    $this->view('patients/Pdf', $data);
  }
  /** création du profile d'un patient, juste après son enrégistrement
   *les données sont récupérées de la vue initialForm
  */
  public function createProfile()
  {
    if (isLoggedIn() && $_SESSION['userState'] == 'incomplet') {
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
        'adresse_err' => ''
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

      if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['adresse_err'])) {
        // adding information into de table patient
        if ($this->patientModel->createProfile($data)) {
          flash('register_success', 'Vous êtes bien inscrit');
          redirect('patients/urgence');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $this->view('patients/initialForm', $data);
      }
    } else {
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
        'adresse_err' => ''
      ];

      // load form
      $this->view('patients/initialForm', $data);
    }
  }
  /** enrégistrement du contact d'urgence */
  public function urgence()
  {
    if (isLoggedIn()) {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'nomContact' => trim($_POST['nomContact']),
        'prenomContact' => trim($_POST['prenomContact']),
        'sexeContact' => $_POST['sexeContact'],
        'telurgence' => $_POST['telurgence'],
        'adresseContact' => trim($_POST['adresseContact']),
        'nomContact_err' => '',
        'telurgence_err' => '',
        'prenomContact_err' => '',
        'adresseContact_err' => ''
      ];

      //$tel_valid = '693553454';
      if (empty($data['nomContact'])) {
        $data['nomContact_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['telurgence']) || (!preg_match("/^[0-9]{9}$/", $data['telurgence']))) {
        $data['telurgence_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['prenomContact'])) {
        $data['prenomContact_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['adresseContact'])) {
        $data['adresseContact_err'] = 'Veuillez renseigner ce champ.';
      }

      if (empty($data['nomContact_err']) && empty($data['prenomContact_err']) && empty($data['telurgence_err']) && empty($data['adresseContact_err'])) {
        // adding information into de table
        if ($this->patientModel->urgence($data)) {
          flash('register_success', 'Le contact d\'urgence a été enrégistré avec succès.');
          redirect('patients/patient');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $this->view('patients/contactUrgence', $data);
      }
    } else {
      // Init data
      $data = [
        'nomContact' => '',
        'prenomContact' => '',
        'sexeContact' => '',
        'telurgence' => '',
        'adresseContact' => '',
        'nomContact_err' => '',
        'telurgence_err' => '',
        'prenomContact_err' => '',
        'adresseContact_err' => ''
      ];

      // load form
      $this->view('patients/contactUrgence', $data);
    }
  }
  /**  affichage du profile du patient */
  public function profile()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->activeUser,
        'urgence' => $this->patientModel->recupurgence()
      ];
      $this->view('patients/profile', $data);
    }
  }
  /** ceci renvoit le formulaire pour éditer les données personnelles
   * et celles du contact d'urgence du patient
  */
  public function editP()
  {
    $data = [
      'patient' => $this->activeUser,
      'urgence' => $this->patientModel->recupurgence()
    ];
    $this->view('patients/editprofile', $data);
  }
  /** affiche les rendez-vous pris par le patient  */
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
  /** mise à jour du profile du patient  */
  public function updateProfile()
  {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'patient' => $this->activeUser,
      'urgence' => $this->patientModel->recupurgence(),
      'nom' => trim($_POST['nom']),
      'prenom' => trim($_POST['prenom']),
      'dateNaissance' => trim($_POST['date']),
      'lieuNaissance' => trim($_POST['lieu']),
      'sexe' => $_POST['sexe'],
      'adresse' => trim($_POST['adresse']),
      'nomContact' => trim($_POST['nomContact']),
      'prenomContact' => trim($_POST['prenomContact']),
      'sexeContact' => $_POST['sexeContact'],
      'telurgence' => $_POST['telurgence'],
      'adresseContact' => trim($_POST['adresseContact']),
      'nomContact_err' => '',
      'telurgence_err' => '',
      'prenomContact_err' => '',
      'adresseContact_err' => '',
      'nom_err' => '',
      'prenom_err' => '',
      'date_err' => '',
      'lieu_err' => '',
      'adresse_err' => ''
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
    if (empty($data['nomContact'])) {
      $data['nomContact_err'] = 'Veuillez renseigner ce champ.';
    }
    if (empty($data['telurgence']) || (!preg_match("/^[0-9]{9}$/", $data['telurgence']))) {
      $data['telurgence_err'] = 'Veuillez renseigner ce champ.';
    }
    if (empty($data['prenomContact'])) {
      $data['prenomContact_err'] = 'Veuillez renseigner ce champ.';
    }
    if (empty($data['adresseContact'])) {
      $data['adresseContact_err'] = 'Veuillez renseigner ce champ.';
    }

    if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['adresse_err']) && empty($data['nomContact_err']) && empty($data['prenomContact_err']) && empty($data['telurgence_err']) && empty($data['adresseContact_err'])) {
      // updating data into de tables
      if ($this->patientModel->editPersInfo($data) && $this->patientModel->editEmerInfo($data)) {
        flash('register_success', 'Vos informations ont été mis à jours');
        redirect('patients/profile');
      } else {
        die('Quelque chose qui ne va pas bien!');
      }
    } else {
      $this->view('patients/editprofile', $data);
    }
  }
  /** demande rendez-vous, for,ulaire et traitement  */
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
  /** action acconpagnant la prise de rendew-vous  */
  public function askRdvAction()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'medecins' => $this->patientModel->listeMedecins(),
          'codeMedecin' => $_POST['codeMedecin'],
          'dateRdv' => $_POST['dateRdv'],
          'heureRdv' => $_POST['heureRdv']
        ];

        if (empty($data['dateRdv'])) {
          $data['dateRdv_err'] = 'Veuillez renseigner ce champ.';
        }
        if (empty($data['heureRdv'])) {
          $data['heureRdv_err'] = 'Veuillez renseigner ce champ.';
        }

        if (empty($data['heureRdv_err']) && empty($data['dateRdv_err']))
        {
          if ($this->patientModel->askRdv($data)) {
            flash('EtatPostEditCons', "Votre rendez-vous a été crée avec succés!", 'alert alert-success');
            redirect($this->rendezvous($etat = ''));
          }
        }else{
          $this->view('patients/askRdv', $data);
        }
      }
  }
  /** affichage du planning hebdomadaire des medecins */
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
  /** affichage de la page du dossier medical */
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
  /** affichage des consultations */
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
