<?php
    /* model medecin */
    class Medecin
    {
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        public function getMedecinById($user){
            // getMedecinByUserId
            if ($user['type']=='medecin'){
                $sql1 = GETMBYID;
            }
            $this->db->query($sql1);
            $this->db->bind(':userId',$user['id']); 
            $row->type=$user['type'];
            $row->email = $user['email'];
            $row->state = $user['state'];
            $row = $this->db->single();
            return $row;
        }
       
    }
    
?>