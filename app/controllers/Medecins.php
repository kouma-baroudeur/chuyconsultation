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
  // fonction parametrage profile.
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

  //Affiche profil du medecin
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

  //Affiche page d'ajout patient
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

  //Affiche page list des consultaion du medecin
  public function consultations()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'consultations' => $this->medecinModel->consultMedecin()
      ];
      $this->view('medecins/all-consultations', $data);
    }
  }

  //Affiche page ajout consultation sans parametre
  public function addConsultationNew()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'medecin' => $this->activeUser,
        'patients' => $this->medecinModel->listePatient()
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
        'idPatient' => $idPatient
      ];
      $this->view('medecins/add-consultation', $data);
    }
  }

  /**traitement d'ajout de consultation */
  public function ajouterConsultation()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      $data = [
        'patient' => trim($_POST['patient']),
        'medecin' => trim($_POST['medecin']),
        'symptomes' => implode(",", $_POST['symptomes']),
        'contenu' => trim($_POST['contenu']),
        'file' => "filezkopkdop",
        'date_consultation' => date('y/m/d'),
        'patient_err' => '',
        'medecin_err' => '',
        'symptomes_err' => '',
        'contenu_err' => '',
        'date_consultation_err' => '',
      ];
      if (empty($data['patient'])) {
        $data['patient_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['medecin'])) {
        $data['medecin_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['symptomes'])) {
        $data['symptomes_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['contenu'])) {
        $data['contenu_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['file'])) {
        $data['file_err'] = 'Veuillez renseigner ce champ.';
      }
      if (empty($data['date_consultation'])) {
        $data['date_consultation_err'] = 'Veuillez renseigner ce champ.';
      }
      $data['date_edition'] = $data['date_consultation'];
      var_dump($data);
      if (empty($data['patient_err']) && empty($data['medecin_err']) && empty($data['symptomes_err']) && empty($data['contenu_err']) && empty($data['file_err']) && empty($data['date_consultation_err'])) {
        // adding information into de table patient

        if ($this->medecinModel->add_consultation($data)) {
          flash('modifier_success', 'Vos informations ont été mis à jours');
          redirect('medecins/home');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $this->view('medecins/home', $data);
      }
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

  //Affiche page liste des patients
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

  //Affiche page profil du patient
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
        'id' => $id
      ];
      $this->view('medecins/patient-profil', $data);
    }
  }

  //Affiche page edition premiere observation du patient
  public function premiereObservation($patient)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        //'patients' => $this->medecinModel->patients(),
        'medecin' => $this->activeUser,
        'patient' => $patient,
      ];
      $this->view('medecins/premiere-observation', $data);
    }
  }

  //affiche page liste rdv en attente du medecin
  public function rdvAttente()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $etat = "attente";
      $data = [
        'rdvs' => $this->medecinModel->rvdAttente($etat)

      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }

  //Operation de validation du rendez vous
  public function validerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $etat = "confirmer";

      $data = [
        //'patients' => $this->medecinModel->rvdValide($etat),
        //'medecin' => $this->activeUser,
        'msg' => 'success-message'
      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }
  //change le statut d'un rdv à annuler
  public function annulerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $data = [
        'rvd' => $this->medecinModel->rvdAnnuler($id),
        //'medecin' => $this->activeUser,
        'msg' => 'success-message'
      ];
      $this->view('medecins/rdvAvenirMed', $data);
    }
  }
  //change le statut d'un rdv à confirmer
  public function confirmerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $data = [
        'rvd' => $this->medecinModel->rvdConfirmer($id),
        //'medecin' => $this->activeUser,
        'msg' => 'success-message'
      ];
      $this->view('medecins/rdvAvenirMed', $data);
    }
  }
  //change le statut d'un rdv à refuser
  public function supprimmerRdv()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        'patients' => $this->medecinModel->rvdSupprimer(),
        //'medecin' => $this->activeUser,
        'msg' => 'delete-message'
      ];
      $this->view('medecins/rdvAttenteMed', $data);
    }
  }
  //change le statut d'un rdv à confirmer
  public function rdvAvenir()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_POST["id"];
      $data = [
        'rvd' => $this->medecinModel->rvdConfirmer($id),
        //'medecin' => $this->activeUser,
        'msg' => 'success-message'
      ];
      $this->view('medecins/rdvAvenirMed', $data);
    }
  }

  //non utiliser
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

  //non ajour
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
  
  public function profilePatient()
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'patient' => $this->medecinModel->profilePatient($id)
      ];
      $this->view('medecins/profilePatient', $data);
    }
  }
  // fonction editer profile medecin.
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
        'email_err' => ''
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
          redirect('medecins/_2y_10_AG_OSzHJ09ubMAfgTiWdM_Lw_aobUlVAr6Kw7bTOUMXEJPIMUn66W');
        } else {
          die('Quelque chose qui ne va pas bien!');
        }
      } else {
        $this->view('medecins/_2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W', $data);
      }
    }
  }

  //changer le mot de passe
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
        $this->view('medecins/home', $data);
      }
    }
  }
  public function detailConsultation()
  {
  }
}
