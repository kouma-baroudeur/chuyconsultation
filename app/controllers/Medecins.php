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
    $this->patientModel = $this->model('Patient');
    $this->medecinModel = $this->model('Medecin');
    $this->adminModel = $this->model('Admin');
    if ($_SESSION['userType'] == 'medecin')
      $this->activeUser = $this->medecinModel->getMedecinById($user);
  }

  //Dashboard
  public function _2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C($page = "home")
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'params' => $page,
        'services' => $this->medecinModel->listeService(),
        'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'page' => 'Dashboard'
      ];
      if ($_SESSION['userState'] == 'incomplet')
        $this->view('medecins/initialForm', $data);
      else
        $this->view('medecins/dashboardMed', $data);
    }
  }

  //Ajouter un medecin
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

  //Affiche page parametre profile.
  public function _2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'page' => 'Parametre du Compte'
      ];
      $this->view('medecins/profileSettings', $data);
    }
  }

  //Affiche le du medecin
  public function profil()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'page' => 'Mon Profil'
      ];
      $this->view('medecins/profile', $data);
    }
  }

  //Affiche page ajout patient
  public function addPatient()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'page' => 'Ajouter un Patient'
      ];
      $this->view('medecins/add-patient', $data);
    }
  }

  //Affiche page liste des consultations du medecin
  public function consultations()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'page' => 'Mes Consultations'
      ];
      $this->view('medecins/all-consultations', $data);
    }
  }

  //Affiche page ajout consultation
  public function addConsultationNew()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'patients' => $this->medecinModel->listePatient(),
        'page' => 'Ajouter une Consultation'
      ];
      $this->view('medecins/add-consultation', $data);
    }
  }

  //Affiche page ajout consultation avec parametre
  public function addConsultation($idPatient)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'patient' => $this->medecinModel->profilePatient($idPatient),
        'idPatient' => $idPatient,
        'page' => 'Ajouter une Consultation'
      ];
      $this->view('medecins/add-consultation', $data);
    }
  }

  //Traitement ajout consultation
  public function ajouterConsultation()
  {
    if ($_POST)
      var_dump($_POST['symptomes']);
  }

  //non-utiliser
  public function rdvs($filter = "only", $etat = "")
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'rdv' => $this->medecinModel->medRdvAll($filter, $etat),
        'medecin' => $this->activeUser,
      ];

      $this->view('medecins/allmedrdvs', $data);
    }
  }

  //Affiche page liste des patients
  public function patients()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'page' => 'Liste des Patients'
      ];
      $this->view('medecins/all-patients', $data);
    }
  }

  //Affiche page profile du patient
  public function patientProfil($id)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'patient' => $this->medecinModel->profilePatient($id),
        'premiereinfo' => $this->medecinModel->premiereInfo($id),
        'contacturgence' => $this->medecinModel->recupurgence($id),
        'id' => $id,
        'page' => 'Profil du Patient'
      ];
      $this->view('medecins/patient-profil', $data);
    }
  }

  //Affiche page edition premiere consultation du patient
  public function premiereObservation($idPatient)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'page' => 'Premiere Observation'
        //'patient' => $patient,
      ];
      $this->view('medecins/premiere-observation', $data);
    }
  }

  //Affiche page ajout rendez-vous
  public function addRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'medecins' => $this->patientModel->listeMedecins(),
        'page' => 'Ajouter un Rendez-vous'
      ];
      $this->view('medecins/add-rendez-vous', $data);
    }
  }

  //Affiche page rendez vous en attente
  public function rdvAttente()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $etat = "attente";
      $data = [
        'medecin' => $this->activeUser,
        'rdvs' => $this->medecinModel->rvdAttente(),
        'page' => 'Rendez-vous en Attente'
      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }

  //Traitement valider un rendez vous (statut = confirmer ou valider) puis redirection vers page rdv attente
  public function validerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $this->medecinModel->confirmerRdv($id);
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'rdvs' => $this->medecinModel->rvdAttente(),
        'msg' => 'success-message',
        'page' => 'Rendez-vous en Attente'
      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }

  //Traitement annuler un rendez vous (statut = annuler) puis redirection vers page rdv attente
  public function annulerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $this->medecinModel->annulerRdv($id);
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'rdvs' => $this->medecinModel->rvdValide(),
        'msg' => 'success-message',
        'page' => 'Rendez-vous en Attente'
      ];
      $this->view('medecins/rdvAvenirMed', $data);
    }
  }

  //Traitement supprimmer un rendez vous (statut = refuser) puis redirection vers page rdv attente
  public function supprimmerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $this->medecinModel->supprimerRdv($id);
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'rdvs' => $this->medecinModel->rvdAttente(),
        'msg' => 'delete-message',
        'page' => 'Rendez-vous en Attente'
      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }

  //Affiche page rendez vous a venir
  public function rdvAvenir()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'rdvs' => $this->medecinModel->rvdValide(),
        'medecin' => $this->activeUser,
        'page' => 'Rendez-vous a Venir'
      ];
      $this->view('medecins/rdvAvenirMed', $data);
    }
  }

  //Affiche page planning du medecin
  public function medPlanning()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'planning' => $this->medecinModel->planning(),
        'jours' => $this->medecinModel->listeJour(),
        'page' => 'Mon Planning'
      ];
      $this->view('medecins/planningMed', $data);
    }
  }

  //Affiche page Mise a jour du planning
  public function emergerPlanning()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'planning' => $this->medecinModel->planning(),
        'jours' => $this->medecinModel->listeJour(),
        'page' => 'Mise a Jour du Planning'
      ];
      $this->view('medecins/MAJ-planningMed', $data);
    }
  }

  /** method non utiliser */
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

  //Affiche page profil du patient
  public function profilePatient()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'patient' => $this->medecinModel->profilePatient($id),
        'page' => 'Profile du Patient'
      ];
      $this->view('medecins/profilePatient', $data);
    }
  }

  //Traitement editer information profile medecin.
  public function editProfile()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {

      $data = [
        'nom' => trim($_POST['firstName']),
        'prenom' => trim($_POST['lastName']),
        'dateNaissance' => trim($_POST['dateNaissance']),
        'lieuNaissance' => trim($_POST['lieuNaissance']),
        'sexe' => $_POST['choices-gender'],
        'service' => trim($_POST['service']),
        'adresse' => trim($_POST['location']),
        'tel' => trim($_POST['phone']),
        'nom_err' => '',
        'prenom_err' => '',
        'date_err' => '',
        'lieu_err' => '',
        'service_err' => '',
        'adresse_err' => '',
        'service_err' => '',
        'tel_err' => '',
        'email_err' => '',
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
      if (empty($data['service'])) {
        $data['service_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['adresse'])) {
        $data['adresse_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['tel']) || (!preg_match("/^[0-9]{9}$/", $data['tel']))) {
        $data['tel_err'] = 'Veuillez renseigner ce champ.';
      }

      if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['service_err']) && empty($data['adresse_err']) && empty($data['date_err'])) {
        // adding information into de table patient
        if ($this->medecinModel->editProfile($data)) {
          flash('modifier_success', 'Vos informations ont été mis à jours');
          redirect('medecins/_2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $data = [
          'medecin' => $this->activeUser,
          'page' => 'Parametre du Compte'
        ];
        $this->view('medecins/profileSettings', $data);
      }
    }
  }

  //changer le mot de passe et email
  public function editInfo()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $user = [
        'id'    =>  $_SESSION['userId'],
        'type'  =>  $_SESSION['userType'],
        'email' => $_SESSION['userMail'],
        'state' => $_SESSION['userState']
      ];
      $data = [

        'email' => trim($_POST['email']),
        'confirmEmail' => trim($_POST['confirmation']),
        'password' => trim($_POST['currentPwd']),
        'newPwd' => trim($_POST['newPwd']),
        'confirmPassword' => trim($_POST['connfirmPwd']),
        'email_err' => '',
        'confirmEmail_err' => '',
        'password_err' => '',
        'newPwd_err' => '',
        'confirmPwd_err' => '',
      ];
      if (empty($data['email'])) {
        $data['email_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['confirmEmail'])) {
        $data['confirmEmail_err'] = 'Veuillez renseigner ce champ.';
      }

      if (empty($data['password'])) {
        $data['password_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['newPwd']) and strlen($data['password']) < 6) {
        $data['newPwd_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['confirmPassword'])) {
        $data['confirmPassword_err'] = 'Veuillez renseigner ce champ.';
      }
      if ($data['email'] == $data['confirmEmail']) {
        $tab["user"] = $this->medecinModel->recuperId();
        foreach ($tab as $email => $pers) {
          if ($pers->email == $data['email'] and $data['email'] != $this->medecinModel->getMedecinById($user)->$email) {
            $data['email_err'] = 'Email existant.';
          }
        }
      } else {
        $data['email_err'] = 'Veuillez renseigner ce champ.';
        $data['confirmEmail_err'] = 'Email différent.';
      }
      // $password = password_hash($data['password'], PASSWORD_DEFAULT);
      $userPassword = $this->medecinModel->users();
      // // $pwd = $pass[]->password;
      // //var_dump($pass);
      // echo $data['password'] ."<br>";
      // echo $userPassword . "<br>";
      // echo password_verify($data['password'], $userPassword);

      //echo $data['password'];
      if (password_verify($data['password'], $userPassword)) {
        if ($data['newPwd'] == $data['confirmPassword']) {
          $data['newPwd'] = password_hash($data['newPwd'], PASSWORD_DEFAULT);
        } else {
          $data['confirmPassword_err'] = ' Ce mot de passe ne correspond pas.';
        }
      } else {
        $data['password_err'] = 'Ancien mot passe incorrect.';
      }

      if (empty($data['email_err']) && empty($data['confirmEmail_err']) && empty($data['password_err']) && empty($data['newPwd_err']) && empty($data['confirmPassword_err'])) {
        // adding information into de table patient
        if ($this->medecinModel->editInfo($data)) {
          flash('modifier_success', 'Vos informations ont été mis à jours');
          endUserSession();
        } else {

          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $data = [
          'medecin' => $this->activeUser,
          'page' => 'Parametre du Compte'
        ];
        $this->view('medecins/profileSettings', $data);
      }
    }
  }
}
