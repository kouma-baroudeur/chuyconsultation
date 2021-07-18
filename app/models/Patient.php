<?php
/**
 * model Patient
 *
 * @author KOUMADOUL Baroud (UY1-ICT4D) <koumadoulbaroud@gmail.com>
 * @author MOYOPO FOTSO Michelle (UY1-ICT4D) <michellefosto2@gmail.com>
 * @author KOUMADOUL Baroud (UY1-ICT4D 2020-2021) <koumadoulbaroud@gmail.com>
 */
class Patient
{
    private $db; //variable de connection a la BD
    /** Contructeur du modele */
    public function __construct()
    {
        $this->db = new Database; // creation d'une connection a la BD
    }
    /** recuperation des patient par Id  */
    public function getPatientById($user)
    {
        /**
         * getPatientByUserId
         *
         * @author KOUMADOUL Baroud (UY1-ICT4D) <koumadoulbaroud@gmail.com>
         */
        if ($user['type'] == 'patient') {
            $sql1 = FINDPATIENTBYID;
        }
        $this->db->query($sql1);
        $this->db->bind(':userId', $user['id']);
        $row->type = $user['type'];
        $row->email = $user['email'];
        $row->state = $user['state'];
        $row = $this->db->single();
        return $row;
    }
    /** traitement pour la creation du profile du patient  */
    public function createProfile($data)
    {
        if ($_SESSION['userType'] == 'patient') {
            $sql = CREATEPATIENTPROFILE;
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
        $this->db->query(UPDATESTATE . $_SESSION['userId']);
        $updateState = $this->db->execute();
        $_SESSION['userState'] = 'complet';
        return $answer && $updateState;
    }
    public function urgence($data)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        if ($_SESSION['userType'] == 'patient') {
            $sql = ADDPATIENTEMERGENGYCONTACT;
        }
        $this->db->query($sql);
        $this->db->bind(':nomContact', $data['nomContact']);
        $this->db->bind(':prenomContact', $data['prenomContact']);
        $this->db->bind(':sexeContact', $data['sexeContact']);
        $this->db->bind(':telurgence', $data['telurgence']);
        $this->db->bind(':adresseContact', $data['adresseContact']);
        $this->db->bind(':IP', $codePatient);
        $answer = $this->db->execute();
        
        return $answer;
    }
    /** edition des informations personnelles */
    public function editPersInfo($data){
        $sql = "UPDATE patient SET nomPatient='".$data['nom']."',prenomPatient='".$data['prenom']."',sexePatient='".$data['sexe']."',adressePatient='". $data['adresse']."',dateNaissancePatient='".$data['dateNaissance']."',lieuNaissancePatient='".$data['lieuNaissance']."' WHERE userId=".$_SESSION['userId'];
        $this->db->query($sql);
        $answer = $this->db->execute();    
        return $answer ;
    }
   
    /** edition des informations sur le contact d'urgence */
    public function editEmergencyInfo($data){
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        
        $sql = "UPDATE contacturgence SET nomContact='".$data['nomContact']."',prenomContact='".$data['prenomContact']."',sexeContact='".$data['sexeContact']."',adresseContact='".$data['adresseContact']."',telurgence='".$data['telurgence']."' WHERE IP=".$codePatient;
        $this->db->query($sql);
        $answer = $this->db->execute();   
        return $answer;
    }
    public function recupurgence(){
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * FROM contacturgence,patient WHERE contacturgence.IP=".$codePatient;
        $this->db->query($sql);
        $answer = $this->db->single();
        return $answer;
    }
    public function rendezvous($etat)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,rendezvous,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        $sql .= "AND rendezvous.codeMedecin = medecin.codeMedecin ";
        if ($etat == "Attente") {
            $sql .= RDVETATATTENTE;
        } elseif ($etat == "Confirme") {
            $sql .= RDVETATCONFIRME;
        }
        $sql .= "AND rendezvous.IP = :IP ";
        $sql .= RDVORDRE;
        $this->db->query($sql);
        $this->db->bind(':IP', $codePatient);
        $rows = $this->db->resultSet();
        return $rows;
    }
    public function askRdv($data)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        
        $sql = ASKRDV;
        $this->db->query($sql);
        $this->db->bind(':dateRdv', $data['dateRdv']);
        $this->db->bind(':heureRdv', $data['heureRdv']);
        $this->db->bind(':IP', $codePatient);
        $this->db->bind(':codeMedecin', $data['codeMedecin']);
        $answer = $this->db->execute();
        return $answer;
    }
    /** liste tous les medecins du systeme */
    public function listeMedecins()
    {
        $sql = "SELECT * ";
        $sql .= "FROM medecin,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "GROUP BY medecin.codeMedecin ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    public function planning($etat)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * ";
        $sql .= "FROM medecin,plannings,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND plannings.codeMedecin = medecin.CodeMedecin ";

        $sql .= "ORDER BY plannings.id DESC  ";
        $this->db->query($sql);
        $this->db->bind(':IP', $codePatient);
        $rows = $this->db->resultSet();
        return $rows;
    }
    public function medoc($etat)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * ";
        $sql .= "FROM patient,rendezvous,medecin,plannings,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND plannings.codeMedecin = medecin.CodeMedecin ";

        $sql .= "ORDER BY plannings.id DESC  ";
        $this->db->query($sql);
        $this->db->bind(':IP', $codePatient);
        $rows = $this->db->resultSet();
        return $rows;
    }
    public function consult($etat)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,service, consultations ";
        $sql .= "WHERE consultations.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND consultations.IP = :IP ";
        $sql .= "AND patient.IP = :IP ";
        $sql .= "AND medecin.codeService = service.codeService ";
        $sql .= "ORDER BY consultations.numeroConsultation DESC  ";
        $this->db->query($sql);
        $this->db->bind(':IP', $codePatient);
        $rows = $this->db->resultSet();
        return $rows;
    }
   
}
