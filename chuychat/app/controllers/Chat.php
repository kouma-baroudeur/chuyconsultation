<?php
    class Chat extends Controller {
        private $mdMessage;
        private $mdUser;
        private $list;
        public function __construct(){
            $this->mdUser = $this->model("UserModel");
            $this->mdMessage = $this->model("MessageModel");
        }

       

        public function User($id){
            $list = $this->mdUser->getUser($id);            
            $this->view("base", [
                "page" => "chat",
                "list" => $list
            ]);
        }

        public function insertChat(){
            if(isset($_SESSION['unique_id'])){
                $outgoing_id = $_SESSION['unique_id'];
                $incoming_id = $_POST['incoming_id'];
                $message = $_POST['message'];
                if(!empty($message)){
                    $this->mdMessage->insertChat($incoming_id, $outgoing_id, $message);
                }
            }else{
                header("location: ../login.php");
            }
        }

        public function getChat(){
            if(isset($_SESSION['unique_id'])){
                $outgoing_id = $_SESSION['unique_id'];
                $incoming_id = $_POST['incoming_id'];
                $output = "";
                $list = [];
                $list = $this->mdMessage->getMessageChat($outgoing_id, $incoming_id);
                if(!empty($list)){                    
                    foreach($list as $row){
                        if($row['outgoing_msg_id'] === $outgoing_id){
                            $output .= '<div class="chat outgoing">
                                        <div class="details">
                                            <p>'. $row['msg'] .'</p>
                                        </div>
                                        </div>';
                        }else{
                            $output .= '<div class="chat incoming">
                                        <img src="public/images/'.$row['img'].'" alt="">
                                        <div class="details">
                                            <p>'. $row['msg'] .'</p>
                                        </div>
                                        </div>';
                        }
                    }
                }else{
                    $output .= '<div class="text">Aucun message disponible. Lorsque vous allez discuter, vos messages apparaîtront ici.</div>';
                }
                echo $output;
            }else{
                header("location: ../login.php");
            }
        }
    }
