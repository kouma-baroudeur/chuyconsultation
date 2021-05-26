<?php
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
            if($_SESSION['userType']=='admin')
                $this->activeUser = $this->adminModel->getAdminById($user);
        }
       
        public function admin($page="home")
        { 
            if ($_SESSION['userType'] != 'admin') {
                notAuthorized();
            } else {
                $data = [
                // parametres utilisees pour les sous panneau
                'params' => $page,
                'admin' => $this->activeUser
                ];
                if($_SESSION['userState']=='incomplet')
                $this->view('admins/initialForm', $data);
                else
                $this->view('admins/home', $data);
            }
        }
        public function staff(){
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

        /* public function add(){
            if ($_SESSION['userType'] != 'admin'){
                notAuthorized();
            }else{
                $data = [
                    'admin' => $this->activeUser,
                    'userId' => $_SESSION['userId'],
                    'medecins' => $this->adminModel->user()
                  ];
                $this->view('admins/registerstaff', $data);
            }
        } */

        public function registerstaff()
        {
            // check for posts
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                // sanitizing the inputs (to avoid sql injection)
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
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
                if(empty($data['email'])){ // checking email in server side
                    $data['email_err'] = 'Veuillez entrer l\'e-mail.';
                }else
                {
                    if($this->adminModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email déja enregistré, veuillez entrer un nouveau';
                    }
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'Veuillez entrer un mot de passe.';
                }elseif(strlen($data['password'])<6){
                    $data['password_err'] .= 'Le mot de passe doit être au moins 6 caracteres';
                }
                if(empty($data['confirm_pass'])){
                    $data['confirm_pass_err'] = 'Veuillez confirmer le mot de passe.';
                }else{
                    if($data['password']!=$data['confirm_pass'])
                        $data['confirm_pass_err'] = 'La confirmation ne correspond pas au mot de passe';
                }

                if(empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['type_err'])){
                    // hashing the password for security
                    $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                    // register user
                    if($this->adminModel->registerstaff($data)){
                        flash('register_success','Suivant');

                        redirect('admins/createprofile');
                    }else{
                        die('Quelque chose ne va pas bien!');
                    }           
                }else{
                
                    $this->view('admins/registerstaff',$data);
                }
            }else
            {
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
                $this->view('admins/registerstaff',$data);
            }
        }
        public function createprofile(){
           // check for posts
           if($_SERVER['REQUEST_METHOD']=='POST')
           {
               // sanitizing the inputs (to avoid sql injection)
               $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

               // init data
               $data = [
                   'services' => $this->adminModel->listeServices(),
                   'email' => trim($_POST['email']),
                   'nom' => trim($_POST['nom']),
                   'prenom' => trim($_POST['prenom']),
                   'dateNaissance' => trim($_POST['dateNaissance']),
                   'lieuNaissance' => trim($_POST['lieuNaissance']),
                   'sexe' => trim($_POST['sexe']),
                   'service' => trim($_POST['service']),
                   'adresse' => trim($_POST['adresse']),
                   'tel' => trim($_POST['tel']),
                   'nom_err' => '',
                   'prenom_err' => '',
                   'date_err' => '',
                   'lieu_err' => '',
                   'tel_err' => '',
                   'adresse_err' => '',
                   'email_err' => '',
                   'services' => $this->adminModel->listeServices()
               ];
               if(empty($data['email'])){ // checking email in server side
                $data['email_err'] = 'Veuillez entrer l\'e-mail.';
               }
               if(empty($data['nom'])){ // checking email in server side
                   $data['nom_err'] = 'Veuillez entrer le nom.';
               }
               if(empty($data['tel'])){
                   $data['tel_err'] = 'Veuillez entrer un numéro de téléphone.';
               }elseif(strlen($data['tel'])<9 || strlen($data['tel'])>9){
                   $data['tel_err'] .= 'Le numéro doit être 9 chiffres';
               }
               if(empty($data['prenom'])){
                   $data['prenom_err'] = 'Veuillez entrer le prénom.';
               }
               if(empty($data['lieuNaissance'])){
                $data['lieu_err'] = 'Veuillez entrer le le lieu de naissance.';
               }
               if(empty($data['dateNaissance'])){
                $data['date_err'] = 'Veuillez choisr Une date valide.';
               }
               if(empty($data['adresse'])){
                $data['adresse_err'] = 'Veuillez entrer une adresse.';
               }

               if(empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['tel_err']) && empty($data['adresse_err']) && empty($data['email_err'])){
                   
                   // register user
                   if($this->adminModel->createprofile($data)){
                       flash('register_success','Suivant');
                       redirect('admins/staff');
                   }else{
                       die('Quelque chose ne va pas bien!');
                   }           
               }else{
               
                   $this->view('admins/addusersforms',$data);
               }
           }else
           {
               // Init data
               $data = [
                   'email' => '',
                   'nom' => '',
                   'prenom' => '',
                   'dateNaissance' => '',
                   'lieuNaissance' => '',
                   'service' => '',
                   'adresse' => '',
                   'sexe' => '',
                   'tel' => '',
                   'nom_err' => '',
                   'prenom_err' => '',
                   'date_err' => '',
                   'lieu_err' => '',
                   'tel_err' => '',
                   'adresse_err' => '',
                   'email_err' => '',
                   'services' => $this->adminModel->listeServices()
               ];
               
               // load form
               $this->view('admins/addusersforms',$data);
           }
        }

    }
    
?>