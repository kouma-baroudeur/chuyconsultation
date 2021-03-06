<?php

require 'sendmails.php';
require 'sendnotifbymail.php';
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
    if ($_SESSION['userType'] == 'admin')
      $this->activeUser = $this->adminModel->getAdminById($user);
  }
  /*Fonction renvoyant le main du dashbord admin */
  public function _2y_10_rBg9JAf8xXLLAL506TuAoOXjaPWXAf7e5XZ9sf1cscgbeSW6gCg2C($page = "home")
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'params' => $page,
        'admin' => $this->activeUser
      ];
      $this->view('admins/home', $data);
    }
  }
  public function _2y_10_Cb7AAwLgh7Mmx5IH_MW6huC7BFuFsidzcjeA1UDrRep8VzYj0Er6W()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'admin' => $this->activeUser
      ];
      $this->view('admins/editprofile', $data);
    }
  }
  public function staff()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'admin' => $this->activeUser,
        'userId' => $_SESSION['userId'],
        'medecins' => $this->adminModel->user()
      ];
      $this->view('admins/user', $data);
    }
  }
  public function patient()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->adminModel->patient()
      ];
      $this->view('admins/patient', $data);
    }
  }

  public function rendezvous($etat = " ")
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'admin' => $this->activeUser,
        'userId' => $_SESSION['userId'],
        'rdv' => $this->adminModel->rendezvous($etat)
      ];
      $this->view('admins/rdvAdmin', $data);
    }
  }
  public function consult()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'rdv' => $this->adminModel->consultAdmin()
      ];
      $this->view('admins/consultationAdmin', $data);
    }
  }
  public function registerstaff()
  {
    // check for posts
    if (isLoggedIn() && $_SESSION['userType'] == 'admin') {
      // sanitizing the inputs (to avoid sql injection)
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_pass' => trim($_POST['confirm_pass']),
        'type' => trim($_POST['type']),
        'email_err' => '',
        'password_err' => '',
        'confirm_pass_err' => '',
        'type_err' => ''
      ];
      if (empty($data['email'])) { // checking email in server side
        $data['email_err'] = 'Veuillez entrer l\'e-mail.';
      } else {
        if ($this->adminModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email d??ja enregistr??, veuillez entrer un nouveau';
        }
      }
      if (empty($data['password'])) {
        $data['password_err'] = 'Veuillez entrer un mot de passe.';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] .= 'Le mot de passe doit ??tre au moins 6 caracteres';
      }
      if (empty($data['confirm_pass'])) {
        $data['confirm_pass_err'] = 'Veuillez confirmer le mot de passe.';
      } else {
        if ($data['password'] != $data['confirm_pass'])
          $data['confirm_pass_err'] = 'La confirmation ne correspond pas au mot de passe';
      }
      if (empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['type_err'])) {

        $email = $data['email'];
        $pass = $data['password'];
        $url = LOGINURLROOT . '';
        sendmails($email, $pass, $url);
        // hashing the password for security
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // register user
        if ($this->adminModel->registerstaff($data)) {
          flash('register_success', 'Un mail est a ??t?? envoy?? au m??decin, il est bien ajout?? dans le syst??me');

          redirect('admins/staff');
        } else {
          die('Quelque chose ne va pas bien!');
        }
      } else {

        $this->view('admins/registerstaff', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'confirm_pass' => '',
        'type' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_pass_err' => '',
        'type_err' => ''
      ];
      // load form
      $this->view('admins/registerstaff', $data);
    }
  }
  //profile d'un medecin
  public function profileStaff()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      $data = [
        'medecins' => $this->adminModel->profileStaff($id)
      ];

      $this->view('admins/profileuser', $data);
    }
  }
  //affiche la page de modification
  public function modStaff()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'medecins' => $this->adminModel->profileStaff($id)
      ];
      $this->view('admins/modUser', $data);
    }
  }
  //fonction modifier un medecin
  public function modifStaff()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      if (isset($_POST["submit"])) {
        $data = [
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'dateNaissance' => trim($_POST['dateNaissance']),
          'lieuNaissance' => trim($_POST['lieuNaissance']),
          'sexe' => $_POST['sexe'],
          'adresse' => trim($_POST['adresse']),
          'service' => trim($_POST['service']),
          'tel' => trim($_POST['tel']),
          'email' => trim($_POST['email']),
          'nom_err' => '',
          'prenom_err' => '',
          'date_err' => '',
          'lieu_err' => '',
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
        if (empty($data['adresse'])) {
          $data['adresse_err'] = 'Veuillez renseigner ce champ.';
        }

        if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['date_err']) && empty($data['lieu_err']) && empty($data['adresse_err'])) {
          // adding information into de table patient
          if ($this->patientModel->modifierStaff($data, $id)) {
            flash('modifier_success', 'Vos informations ont ??t?? mis ?? jours');
            redirect('admins/staff');
          } else {
            die('Quelque chose qui ne va pas bien!');
          }
        } else {
          $this->view('admins/home', $data);
        }
      }
    }
  }
  public function supprStaff()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'medecins' => $this->adminModel->supprStaff($id)
      ];
      $this->view($this->staff(), $data);
    }
  }
  public function profilePatient()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'patient' => $this->adminModel->profilePatient($id)
      ];
      $this->view('admins/profilePatient', $data);
    }
  }

  public function modPatient()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];

      $data = [
        'patient' => $this->adminModel->profilePatient($id)
      ];
      $this->view('admins/modPatient', $data);
    }
  }

  /** mise ?? jour du profile du patient  */
  public function modifierPatient()
  {
    $id = $_GET['id'];
    
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      //'urgence' => $this->patientModel->recupurgence(),
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
      if ($this->adminModel->editPersInfo($id, $data) && $this->adminModel->editEmerInfo($id, $data)) {
        flash('register_success', 'Vos informations ont ??t?? mis ?? jours');
        redirect('patients/profile');
      } else {
        die('Quelque chose qui ne va pas bien!');
      }
    } else {
      $this->view('patients/editprofile', $data);
    }
  }

  public function statutC()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      $patientRdv = $this->adminModel->patientRdv($id);
      $data = [
        'rdv' => $this->adminModel->statutC($id)
      ];
      $etat = "Confirm??";
      $email = $patientRdv->email;
      $patient = $patientRdv->nomPatient . ' ' . $patientRdv->prenomPatient;
      $medecin = $patientRdv->nomMedecin . ' ' . $patientRdv->prenomMedecin;
      $service = $patientRdv->codeService;
      $date = $patientRdv->dateRdv;
      $heure = $patientRdv->heureRdv;
      //appel de ma fonction d'envoie de mail
      sendnotifbymail($etat, $email, $patient, $medecin, $service, $date, $heure);
      $this->view($this->rendezvous($etat = ''), $data);
    }
  }
  public function statutA()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      $patientRdv = $this->adminModel->patientRdv($id);
      $data = [
        'rdv' => $this->adminModel->statutA($id)
      ];
      $etat = "Annul??";
      $email = $patientRdv->email;
      $patient = $patientRdv->nomPatient . ' ' . $patientRdv->prenomPatient;
      $medecin = $patientRdv->nomMedecin . ' ' . $patientRdv->prenomMedecin;
      $service = $patientRdv->codeService;
      $date = $patientRdv->dateRdv;
      $heure = $patientRdv->heureRdv;
      //appel de ma fonction d'envoie de mail
      sendnotifbymail($etat, $email, $patient, $medecin, $service, $date, $heure);
      $this->view($this->rendezvous($etat = ''), $data);
    }
  }
  public function registerRapport()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $id = $_GET['id'];
      $data = [
        //'rdv' => $this->adminModel-> statutA($id)
        //'state' => $this->adminModel->rendezvous($etat)
      ];
      $this->view('includes/addRapport', $data);
    }
  }
  /**fonction redirigeant vers le module de la messagerie instantan??e  */
  public function chatapp()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        'admin' => $this->activeUser
      ];
      redirect('chuychat/Login');
    }
  }
}
