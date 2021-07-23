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
    $this->userModel = $this->model('User');
    if ($_SESSION['userType'] == 'patient')
      $this->activeUser = $this->patientModel->getPatientById($user);
  }
  /** première page et la principale, considéré comme index du controlleur patient
   * c'est ici que lorsque le patient se connecte pour la première fois, l'on décide
   * où le rediriger grâce à son état
   * 
   */
  public function _2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C($page = "home")
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
  public function _2y_10_r2W8RrJ3iE_HI4y4H__wmexIpXZQtHTrBALAZqmpvTiz5FR4oiZ5W()
  {
    $data = [
      'patient' => $this->activeUser,
      'urgence' => $this->patientModel->recupurgence(),
      'premiereobserv' => $this->patientModel->premiereobserv(),
      'consultation' => $this->patientModel->consultation()
    ];
    $this->view('patients/Pdf', $data);
  }
  /** création du profile d'un patient, juste après son enrégistrement
   *les données sont récupérées de la vue initialForm
   */
  public function _2y_10_ePkQJGLAsOj0QIRddcQ0hOGVinxi3p14xynxXZpM_zZKOTo4mcQAq()
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
          redirect('patients/_2y_10_3FHVz0a6g94pKKveK9sOFOV43tl1ZLKYCpx4jIbvbxgXDf_yizy3a');
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
  public function _2y_10_3FHVz0a6g94pKKveK9sOFOV43tl1ZLKYCpx4jIbvbxgXDf_yizy3a()
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
        if ($this->patientModel->urgence($data) AND $this->patientModel->premierObservation()) {
          flash('register_success', 'Le contact d\'urgence a été enrégistré avec succès.');
          redirect('patients/_2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C');
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
  public function _2y_10_r13IGKtxD_GnnoFzdRU8seOhbPv6enWDRFDkaPoXmrinlcKUWlbOG()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'urgence' => $this->patientModel->recupurgence(),
        'patient' => $this->activeUser
      ];
      $this->view('patients/profileSettings', $data);
    }
  }
  /** ceci renvoit le formulaire pour éditer les données personnelles
   * et celles du contact d'urgence du patient
   */
  public function _2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W()
  {
    $data = [
      'patient' => $this->activeUser,
      'urgence' => $this->patientModel->recupurgence()
    ];
    $this->view('patients/profileSettings', $data);
  }
  /** affiche les rendez-vous pris par le patient  */
  public function _2y_10_QHwbK_BOb21EWA8cYriLy_3R9eQMrhCEIf6HQJt_9KYrq0pA_4wTa($etat = '')
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

  /** LES FONCTION DE MISE A JOUR DU COTE PATIENT*/

  /** mise à jour des infos de base du patient  */
  public function _2y_10_K6plTEmyUQTo0G6B_2ueLuzexiyhl2iYCebHq2sGchxX_U2At_JhO()
  {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'urgence' => $this->patientModel->recupurgence(),
      'patient' => $this->activeUser,
      'nom' => trim($_POST['nom']),
      'prenom' => trim($_POST['prenom']),
      'dateNaissance' => trim($_POST['date']),
      'lieuNaissance' => trim($_POST['lieu']),
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
      // updating data into de tables
      if ($this->patientModel->editPersInfo($data)) {
        flash('register_success', 'Vos informations ont été mis à jours');
        redirect('patients/_2y_10_r13IGKtxD_GnnoFzdRU8seOhbPv6enWDRFDkaPoXmrinlcKUWlbOG');
      } else {
        die('Quelque chose qui ne va pas bien!');
      }
    } else {
      $this->view('patients/profileSettings', $data);
    }
  }
  /** Mise à jour du contact d'urgence */
  public function _2y_10_19TvXOOjpZf4uamNxoOMweyPY6knWiIcoUCTiPXmXcEbbdOZRi8eq()
  {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'urgence' => $this->patientModel->recupurgence(),
      'patient' => $this->activeUser,
      'nomContact' => trim($_POST['nomContact']),
      'prenomContact' => trim($_POST['prenomContact']),
      'sexeContact' => $_POST['sexeContact'],
      'telurgence' => $_POST['telurgence'],
      'adresseContact' => trim($_POST['adresseContact']),
      'nomContact_err' => '',
      'telurgence_err' => '',
      'prenomContact_err' => '',
      'adresseContact_err' => '',
    ];

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
      // updating data into de tables
      if ($this->patientModel->editEmergencyInfo($data)) {
        redirect('patients/_2y_10_r13IGKtxD_GnnoFzdRU8seOhbPv6enWDRFDkaPoXmrinlcKUWlbOG');
      } else {
        die('Quelque chose qui ne va pas bien!');
      }
    } else {
      $this->view('patients/profileSettings', $data);
    }
  }
  /** Mise à jours des identifiants */
  public function _2y_10_4DhxZuGwU8BfItgECn24mOjbo4GvW7GJdyg4DHq5MQUNS7Ftx50DG()
  {

    $data = [
      'email' => trim($_POST['email']),
      'confirmation' => trim($_POST['confirmation']),
      'password_actu' => trim($_POST['password_actu']),
      'password' => trim($_POST['password']),
      'confirm_pass' => trim($_POST['confirm_pass']),
      'email_err' => '',
      'confirm_email_err' => '',
      'password_actu_err' =>'',
      'password_err' => '',
      'confirm_pass_err' => ''
    ];
    if (empty($data['email'])) { // checking email in server side
      $data['email_err'] = 'Veuillez entrer votre adresse e-mail.';
    } else {
      if ($this->userModel->findUserByEmail($data['email'])) {
        $data['email_err'] = 'Email déja enregistré, veuillez vous connecter';
      }
    }
    if (empty($data['confirm_email'])) {
      $data['confirm_email_err'] = 'Veuillez confirmer votre mot email.';
    } else {
      if ($data['email'] != $data['confirm_email'])
        $data['confirm_pass_err'] = 'La confirmation ne correspond pas';
    }
    if (empty($data['password_actu'])) {
      $data['password_err'] = 'Veuillez entrer votre mot de passe actuel.';
    } else{
        $check = $this->userModel->login($data['email'],$data['password']);
        if ($check) {
          
        }else{
          $data['password_err'] .= 'Mauvais mot de passe';
        }
    }
    if (empty($data['password'])) {
      $data['password_err'] = 'Veuillez entrer votre mot de passe.';
    } elseif (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\]).{8,32}$/", $data['password'])) {
      $data['password_err'] .= 'Votre mot de passe doit respecter les critères ci-dessous';
    }
    if (empty($data['confirm_pass'])) {
      $data['confirm_pass_err'] = 'Veuillez confirmer votre mot de passe.';
    } else {
      if ($data['password'] != $data['confirm_pass'])
        $data['confirm_pass_err'] = 'La confirmation ne correspond pas au mot de passe';
    }

    if (empty($data['email_err']) && empty($data['confirm_email_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['password_actu_err'])) {
      // hashing the password for security
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      // register user
      if ($this->userModel->updateUser($data)) {
        redirect('users/_2y_10_AG_OSzHJ09ubMAfgTiWdM_Lw_aobUlVAr6Kw7bTOUMXEJPIMUn66W');
      } else {
        die('Quelque chose qui ne va pas bien!');
      }
    } else {

      $this->view('patients/profileSettings', $data);
    }
  }


  /** demande rendez-vous, formulaire et traitement  */
  public function a_2y_10_RRW1ouCMC57VBrC0B60HH_EUPEjzQ1K35HAfrIK2cgay4qW2d7MEOskRdv()
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
  public function _2y_10_WCT62wZUrt1AlbhewMZ9Y_nKMaXBLGVGAn_UCdj4UudG9KRl68eLO()
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

      if (empty($data['heureRdv_err']) && empty($data['dateRdv_err'])) {
        if ($this->patientModel->askRdv($data)) {
          flash('EtatPostEditCons', "Votre rendez-vous a été crée avec succés!", 'alert alert-success');
          redirect($this->_2y_10_QHwbK_BOb21EWA8cYriLy_3R9eQMrhCEIf6HQJt_9KYrq0pA_4wTa($etat = ''));
        }
      } else {
        $this->view('patients/askRdv', $data);
      }
    }
  }
  /** affichage du planning hebdomadaire des medecins */
  public function _2y_10_tg5iZO4vknyafZ_e4f6Qze7LkG8Pn3s9gM9cKNlvz_vPJP2_t0OFS($etat = '')
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
  public function me_2y_10_DV0csUis2sK6gkPqhOhXCuWcEHaMFyp9fzSkJxRYMZNVQtuL0wxrKdoc($etat = '')
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
  public function _2y_10_YLh6XK_e1O9D7Kz5tiTs6OgSnohFRDn573TzXRFYJGjFG0idyWEbW($etat = '')
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
  /**fonction redirigeant vers le module de la messagerie instantanée  */
  public function chatapp()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->activeUser
      ];
      redirect('chuychat/Login');
    }
  }
}
