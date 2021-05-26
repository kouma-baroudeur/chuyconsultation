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

        public function user(){
            $sql = "SELECT * ";
            $sql .= "FROM medecin,service,users ";
            $sql .= "WHERE medecin.codeService = service.codeService ";
            $sql .= "AND medecin.userId = users.id ";
            $sql .= "GROUP BY medecin.codeMedecin ";
            $this->db->query($sql);
            $answer = $this->db->resultSet();
            return $answer;
    
        }
    }
    
?>