<?php
/**
 * model Patient
 *
 * @author KOUMADOUL Baroud (UY1-ICT4D) <koumadoulbaroud@gmail.com>
 */
class Patient
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

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
    public function updateProfile($data){
        if ($_SESSION['userType']=='patient') {
            $sql1 = "UPDATE patient SET nomPatient='".$data['nom']."',prenomPatient='".$data['prenom']."',sexePatient='".$data['sexe']."',adressePatient='".$data['adresse']."',dateNaissancePatient='".$data['date']."',lieuNaissancePatient='".$data['lieu'];
            $sql1 .="WHERE userId=".$_SESSION['userId'];
        }
        $this->db->query($sql1);
        $answer1 = $this->db->execute();

       /*  $sql2 = "UPDATE contacturgence SET nomContact=':nomContact',prenomContact=':prenomContact',sexeContact=':sexeContact',adresseContact=':adresseContact',telurgence=':telurgence' WHERE IP=".$this->getPatientById($_SESSION['userId'])->IP;
        $this->db->query($sql2);
        $answer2 = $this->db->execute(); */
        
        return $answer1 /* && $answer2 */;
    }
    public function recupurgence(){
        $sql = "SELECT * FROM contacturgence,patient WHERE patient.IP=contacturgence.IP";
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
        $sql = ASKRDV;
        $this->db->query($sql);
        $this->db->bind(':IP', $data['IP']);
        $this->db->bind(':codeMedecin', $data['codeMedecin']);
        $this->db->bind(':dateRdv', $data['dateRdv']);
        $this->db->bind(':heureRdv', $data['heureRdv']);
        $answer = $this->db->execute();
        return $answer;
    }

   /*  public function deleteRdv()
    {
        $rdv = $this-> rendezvous('')->numeroRdv;
        $sql ="DELETE FROM rendezvous WHERE numeroRdv =".$rdv;
        $this->db->query($sql);
        return $this->db->execute();
    } */

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
    /* public function editP($etat)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codePatient = $this->getPatientById($user)->IP;
        $sql = "SELECT * ";
        $sql .= "FROM patient";
        $sql .= "WHERE patient.IP = :IP  ";

        $this->db->query($sql);
        $this->db->bind(':IP', $codePatient);
        $rows = $this->db->resultSet();
        return $rows;
    } */
   
}
