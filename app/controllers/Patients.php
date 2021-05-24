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
            if($_SESSION['userType']=='patient')
                $this->activeUser = $this->patientModel->getPatientById($user);
        }

        public function index()
        {  
          /* this->patient("patient"); */
        }
        public function patient($page="home")
        { 
            if ($_SESSION['userType'] != 'patient') {
                notAuthorized();
            } else {
                $data = [
                // parametres utilisees pour les sous panneau
                'params' => $page,
                'patient' => $this->activeUser
                ];
                if($_SESSION['userState']=='incomplet')
                $this->view('patients/initialForm', $data);
                else
                $this->view('patients/home', $data);
            }
        }

        public function createProfile(){
            if(isLoggedIn() && $_SESSION['userState']=='incomplet' ){
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data=[
                  'nom' => $_POST['nom'],
                  'prenom' => $_POST['prenom'],
                  'dateNaissance' => $_POST['dateNaissance'],
                  'lieuNaissance' => $_POST['lieuNaissance'],
                  'sexe' => $_POST['sexe'],
                  'adresse' => $_POST['adresse'],
                ];
                
                if(!$this->patientModel->createProfile($data)){
                  flash('ErrorProfileCreate','Erreur de création du profile!','alert alert-danger');
                }
            }else {
              flash('ErrorProfileCreate','Erreur de création du profile!','alert alert-danger');
            }
            redirect('patients/'.$_SESSION['userType']);
          }

          public function profile()
          {
            if ($_SESSION['userType'] != 'patient') {
              notAuthorized();
            } else {
              $activeUser = $this->activeUser;
              $this->patientModel->Header();
              $this->patientModel->Footer();
              $this->patientModel->SetCol();
              $this->view('patients/profile', $activeUser);
            }
          }

          public function rendezvous($etat='')
          { 
            if ($_SESSION['userType'] != 'patient') {
              notAuthorized();
            } else
            {
              $data = [
                'rdv' => $this->patientModel->rendezvous($etat),
                'patient' => $this->activeUser
              ];
              $this->view('patients/report', $data);
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
            $this->view('patients/askRdv',$data);
            }
          }

          public function askRdvAction($id){
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
          public function planning($etat=''){
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
          public function medoc($etat=''){
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
    }
    
?>