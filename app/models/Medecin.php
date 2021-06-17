<?php
/** model medecin */
class Medecin
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMedecinById($user)
    {
        // getMedecinByUserId
        if ($user['type'] == 'medecin') {
            $sql1 = GETMBYID;
        }
        $this->db->query($sql1);
        $this->db->bind(':userId', $user['id']);
        $row->type = $user['type'];
        $row->email = $user['email'];
        $row->state = $user['state'];
        $row = $this->db->single(); 
        return $row;
    }
    public function listeService()
    {
        $sql = "SELECT * ";
        $sql .= "FROM service ";
        $sql .= "GROUP BY service.codeService ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    public function medRdvAll($forMedecin,$filter){
        $user=[
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
             ];
        $codeMedecin=$this->getMedecinById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .="FROM patient,medecin,consultations,rendezvous,service ";
        $sql .="WHERE medecin.codeService = service.codeService ";
        $sql .="AND rendezvous.IP = patient.IP ";
        $sql .="AND rendezvous.codeMedecin = medecin.codeMedecin ";
        if($filter=="Attente"){
            $sql .="AND rendezvous.etatRdv = 'Attente' ";
        }elseif($filter=="Confirme"){
            $sql .="AND rendezvous.etatRdv = 'Confirme' ";
        }
        if($forMedecin=="only"){
            $sql .="AND medecin.codeMedecin = :codeMedecin ";
        }
        $sql .="ORDER BY rendezvous.numeroRdv DESC  ";
        $this->db->query($sql);
        if($forMedecin=="only"){
            $this->db->bind(':codeMedecin',$codeMedecin);
        }
        $rows= $this->db->resultSet();
        return $rows;
    }
    public function createProfile($data)
    {
        $sql = CREATEMEDECINPROFILE;
        
        $this->db->query($sql);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':codeService', $data['service']);
        $this->db->bind(':userId', $_SESSION['userId']);
        $this->db->bind(':sexe', $data['sexe']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':dateNaissance', $data['dateNaissance']);
        $this->db->bind(':lieuNaissance', $data['lieuNaissance']);
        $this->db->bind(':tel', $data['tel']);
        $answer = $this->db->execute();
        $this->db->query(UPDATESTATE . $_SESSION['userId']);
        $updateState = $this->db->execute();
        $_SESSION['userState'] = 'complet';
        return $answer && $updateState;
    }
}
