<?php
    class Admin
    {
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function getAdminById($user){
            // getAdminByUserId
            if ($user['type']=='admin'){
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