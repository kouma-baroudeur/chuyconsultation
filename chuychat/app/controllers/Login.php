<?php 
    class Login extends Controller{
        public $md;

        public function __construct(){
            $this->md = $this->model("UserModel");
        }

        public function Construct(){
            $this->view("base", [
                "page" => "login"
            ]);
        }

        public function checkLogin(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($email) && !empty($password)){
                
                $list = $this->md->checkSignup($email);
                if(isset($list[0]['email'])){
                    $user_pass = md5($password);
                    $enc_pass = $list[0]['password'];
                    if($user_pass === $enc_pass){
                        $status = "Active now";
                        if($this->md->updateStatus($list[0]['unique_id'], $status)){
                            $_SESSION['unique_id'] = $list[0]['unique_id'];
                            echo "success";
                        }else{
                            echo "Opps, quelque chose ne va pas. Ressayez s'il vous plaît!";
                        }
                    }else{
                        echo "Adresse email ou mot de passe incorrecte!";
                    }
                }else{
                    echo "$email - Email inexistante!";
                }
            }else{
                echo "Tous les champs sont requis!";
            }
        }
    }
