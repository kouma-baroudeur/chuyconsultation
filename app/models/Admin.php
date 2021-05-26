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
        // find user by email
        public function findUserByEmail($email)
        {
            $this->db->query(FINDUSERBYMAIL);
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            // check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function listeMedecins(){
            $sql = "SELECT * ";
            $sql .= "FROM medecin,service ";
            $sql .= "WHERE medecin.codeService = service.codeService ";
            $sql .= "GROUP BY medecin.codeMedecin ";
            $this->db->query($sql);
            $answer = $this->db->resultSet();
            return $answer; 
        }
        public function listeServices(){
            $sql = 'SELECT * FROM service';
            $this->db->query($sql);
            return $this->db->resultSet();
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
        public function registerstaff($data)
        {
            $this->db->query(REGISTERUSER);
            // bind value
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':password',$data['password']);
            $this->db->bind(':type',$data['type']);
            $this->db->bind(':state','complet');
            // excecute and return the stat
            return $this->db->execute();
        }

        public function createprofile($data){
            /* $this->db->query(FINDUSERBYMAIL);

            if(  =$data['email']){
                $sql = CREATEMEDECINPROFILE;
            }
            $this->db->query($sql);
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':sexe', $data['sexe']);
            $this->db->bind(':dateNaissance', $data['dateNaissance']);
            $this->db->bind(':lieuNaissance', $data['lieuNaissance']);
            $this->db->bind(':adresse', $data['adresse']);
            $this->db->bind(':email', $answer->email);
            $this->db->bind(':userId', $answer->userId);
            $this->db->bind(':service', $data['service']);
            $this->db->bind(':tel', $data['tel']);

            $insertM =$this->db->execute();
            
            return $answer && $insertM; */

        }
    }
    
?>