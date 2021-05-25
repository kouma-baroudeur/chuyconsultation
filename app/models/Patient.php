<?php
    /* model patient */
    /* require APPROOT . '/libraries/fpdf/fpdf.php'; */
    class Patient
    {
        private $db;
      /*   protected $col = 0; // Current column
        protected $y0;      // Ordinate of column start */

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPatientById($user){
            // getPatientByUserId
            if ($user['type']=='patient'){
                $sql1 = 'SELECT * FROM patient WHERE userId = :userId';
            }
            $this->db->query($sql1);
            $this->db->bind(':userId',$user['id']); 
            $row->type=$user['type'];
            $row->email = $user['email'];
            $row->state = $user['state'];
            $row = $this->db->single();
            return $row;
        }
        public function createProfile($data)
        {
            if ($_SESSION['userType'] == 'patient') {
                $sql = "INSERT INTO patient (nomPatient,prenomPatient,adressePatient,sexePatient,dateNaissancePatient,lieuNaissancePatient,userId) ";
                $sql .= "VALUES (:nom,:prenom,:adresse,:sexe,:dateNaissance,:lieuNaissance,:userId) ";
            }
            $this->db->query($sql);
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':sexe', $data['sexe']);
            $this->db->bind(':dateNaissance', $data['dateNaissance']);
            $this->db->bind(':lieuNaissance', $data['lieuNaissance']);
            $this->db->bind(':adresse', $data['adresse']);
            $this->db->bind(':userId', $_SESSION['userId']);
            $answer = $this->db->execute();
             $this->db->query("UPDATE users SET state = 'complet' WHERE id=".$_SESSION['userId']);
             $updateState =$this->db->execute();
            $_SESSION['userState']='complet';
            return $answer && $updateState;
        }

        public function rendezvous($etat)
        {
            $user=[
                'id'    =>  $_SESSION['userId'],
                'type'  =>  $_SESSION['userType'],
                'email' => $_SESSION['userMail'],
                'state' => $_SESSION['userState']
                 ];
            $codePatient=$this->getPatientById($user)->IP;
            $sql = "SELECT * ";
            $sql .="FROM patient,medecin,rendezvous,service ";
            $sql .="WHERE medecin.codeService = service.codeService ";
            $sql .="AND rendezvous.IP = patient.IP ";
            $sql .="AND rendezvous.codeMedecin = medecin.codeMedecin ";
            if($etat=="Attente"){
                $sql .="AND rendezvous.etatRdv = 'Attente' ";
            }elseif($etat=="Confirme"){
                $sql .="AND rendezvous.etatRdv = 'Confirme' ";
            }
            $sql .="AND rendezvous.IP = :IP ";
            $sql .="ORDER BY rendezvous.numeroRdv DESC  ";
            $this->db->query($sql);
            $this->db->bind(':IP',$codePatient);
            $rows= $this->db->resultSet();
            return $rows;
        }
        public function askRdv($data){
            $sql="INSERT INTO rendezvous (dateRdv,heureRdv,IP,codeMedecin,etatRdv) VALUES (:dateRdv,:heureRdv,:IP,:codeMedecin,'Attente') ";
            $this->db->query($sql);
            $this->db->bind(':IP',$data['IP']);
            $this->db->bind(':codeMedecin',$data['codeMedecin']);
            $this->db->bind(':dateRdv',$data['dateRdv']);
            $this->db->bind(':heureRdv',$data['heureRdv']);
            $answer= $this->db->execute();
            return $answer;
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

        public function planning($etat){
            $user=[
                'id'    =>  $_SESSION['userId'],
                'type'  =>  $_SESSION['userType'],
                'email' => $_SESSION['userMail'],
                'state' => $_SESSION['userState']
                 ];
            $codePatient=$this->getPatientById($user)->IP;
            $sql = "SELECT * ";
            $sql .="FROM medecin,plannings,service ";
            $sql .="WHERE medecin.codeService = service.codeService ";
            $sql .="AND plannings.codeMedecin = medecin.CodeMedecin ";
            
            $sql .="ORDER BY plannings.id DESC  ";
            $this->db->query($sql);
            $this->db->bind(':IP',$codePatient);
            $rows= $this->db->resultSet();
            return $rows;
        }
        public function medoc($etat){
            $user=[
                'id'    =>  $_SESSION['userId'],
                'type'  =>  $_SESSION['userType'],
                'email' => $_SESSION['userMail'],
                'state' => $_SESSION['userState']
                 ];
            $codePatient=$this->getPatientById($user)->IP;
            $sql = "SELECT * ";
            $sql .="FROM patient,rendezvous,medecin,plannings,service ";
            $sql .="WHERE medecin.codeService = service.codeService ";
            $sql .="AND plannings.codeMedecin = medecin.CodeMedecin ";
            
            $sql .="ORDER BY plannings.id DESC  ";
            $this->db->query($sql);
            $this->db->bind(':IP',$codePatient);
            $rows= $this->db->resultSet();
            return $rows;
        }
    
    }

    
    
?>