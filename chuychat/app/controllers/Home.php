<?php
    class Home extends Controller{
        private $mdUser;
        private $mdMessage;
        private $list;
        public function __construct(){
            $this->mdUser = $this->model("UserModel");
            $this->mdMessage = $this->model("MessageModel");
        }

        public function Construct(){
            $list = $this->mdUser->getUser($_SESSION['unique_id']);
            $this->view("base", [
                "page" => "home",
                "list" => $list
            ]);
        }

        public function search(){
            $outgoing_id = $_SESSION['unique_id'];
            $searchTerm = $_POST['searchTerm'];

            $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
            $output = "";
            $list = $this->mdUser->executeResult($sql);
            if(!empty($list)){
                $output = $this->data($list, $outgoing_id);
            }else{
                $output .= 'Aucun résultat';
            }
            echo $output;
        }        

        public function getUser(){
            $list = "";
            $outgoing_id = $_SESSION['unique_id'];            
            $output = "";
            $list = $this->mdUser->getAllUserChat($outgoing_id);
            
            if(empty($list)){
                $output .= "Aucun utilisateur n'est disponible";
            }else{
                $output = $this->data($list, $outgoing_id);
            }
            echo $output;
        }

        public function data($list, $outgoing_id){
            $output = "";    
            foreach($list as $row){
                $list1 = "";
                $list1 = $this->mdMessage->findUserAndMessage($row['unique_id'] ,$outgoing_id);
                
                (!empty($list1)) ? $result = $list1[0]['msg'] : $result ="Aucun message";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

                if(isset($list1[0]['outgoing_msg_id'])){
                    ($outgoing_id == $list1[0]['outgoing_msg_id']) ? $you = "You: " : $you = "";
                }else{
                    $you = "";
                }
                ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
                ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
                $output .= '<a href="./Chat/User/'. $row['unique_id'] .'">
                            <div class="content">
                            <img src="public/images/'. $row['img'] .'" alt="">
                            <div class="details">
                                <span>'. $row['fname']. " " . $row['lname'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
            }
            return $output;
        }

        public function logOut($logout_id){
            if(isset($_SESSION['unique_id'])){
                if(isset($logout_id)){
                    $status = "Offline now";                    
                    if($this->mdUser->logOut($status, $logout_id)){
                        session_unset();
                        session_destroy();
                        header("location: ../../../");
                    }
                }else{
                }
            }else{
            }
        }
    }
?>