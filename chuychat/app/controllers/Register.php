<?php 
    class Register extends Controller {
        private $md;
        private $list;
        public function __construct(){
            $this->md = $this->model("UserModel");            
        }

        public function Construct(){
            $this->view("base" , [
                "page" => "regist"
            ]);
        }
        
        public function Signup(){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){                    
                    $list = $this->md->checkSignup($email);
                    if(!empty($list[0]['email'])){ 
                        echo "$email - Adresse email déjà existante!";
                    }else{
                        if(isset($_FILES['image'])){
                            $img_name = $_FILES['image']['name'];
                            $img_type = $_FILES['image']['type'];
                            $tmp_name = $_FILES['image']['tmp_name'];
                            
                            $img_explode = explode('.',$img_name);
                            $img_ext = end($img_explode);
            
                            $extensions = ["jpeg", "png", "jpg"];
                            if(in_array($img_ext, $extensions) === true){
                                $types = ["image/jpeg", "image/jpg", "image/png"];
                                if(in_array($img_type, $types) === true){
                                    $time = time();
                                    $new_img_name = 'CHUY Chat_'.$fname.'_'.$time.'_'.$img_name;
                                    if(move_uploaded_file($tmp_name,"./public/images/".$new_img_name)){
                                        //attribution d'un id aleatoire
                                        $ran_id = rand(time(), 100000000);
                                        $status = "Active now";
                                        $encrypt_pass = md5($password);                                        
                                        if($this->md->insertUser($ran_id, $fname, $lname, $email, $encrypt_pass, $new_img_name, $status)){
                                            $list = $this->md->checkSignup($email);
                                            if(!empty($list[0]['email'])){                                
                                                $_SESSION['unique_id'] = $list[0]['unique_id'];
                                                echo "succès";
                                            }else{
                                                echo "Cette adresse email n'existe pas!";
                                            }
                                        }else{
                                            echo "Opps quelque chose ne va pas. Ressayez s'il vous plaît!";
                                        }
                                    }
                                }else{
                                    echo "Ajoutez une images s'il vous plaît - jpeg, png, jpg";
                                }
                            }else{
                                echo "Ajoutez une images s'il vous plaît - jpeg, png, jpg";
                            }
                        }
                    }
                }else{
                    echo "$email n'est pas une adresse email valide!";
                }
            }else{
                echo "Tous les champs sont requis!";
            }
        }
    }
