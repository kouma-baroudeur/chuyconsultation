<?php
class Admin
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAdminById($user)
    {
        // getAdminByUserId
        if ($user['type'] == 'admin') {
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
    public function findUserByEmail($email)
    {
        $this->db->query(FINDUSERBYMAIL);
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function user()
    {
        $sql = "SELECT * ";
        $sql .= "FROM medecin,service,users ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND medecin.userId = users.id ";
        $sql .= "GROUP BY medecin.codeMedecin ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    public function patient()
    {
        $sql = "SELECT * FROM patient,users WHERE patient.userId = users.id "; 
        $this->db->query($sql);
        $answer = $this->db->resultSet();
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
        $codeMedecin = $this->getAdminById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,rendezvous ";
        $sql .= "WHERE rendezvous.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        if ($etat == "Attente") {
            $sql .= RDVETATATTENTE;
        } elseif ($etat == "Confirme") {
            $sql .= RDVETATCONFIRME;
        }
        $sql .= "AND medecin.codeMedecin =:codeMedecin ";
        $sql .= RDVORDRE;
        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $rows = $this->db->resultSet();
        return $rows;
    }
   
    public function registerstaff($data)
    {
        $this->db->query(REGISTERUSER);
        // bind value
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':state', 'incomplet');

        // excecute and return the stat
        return $this->db->execute();
    }
    public function profileStaff($id){
        $sql = "SELECT * FROM medecin,users WHERE userId = $id AND medecin.userId = users.id";
          $this->db->query($sql);
          $data = $this->db->resultSet();
          return $data;

    }
    public function profilePatient($id){
        $sql = "SELECT * FROM patient,users WHERE userId=$id AND patient.userId=users.id";
          $this->db->query($sql);
          $data = $this->db->resultSet();
          return $data;

    }
    public function modifierStaff($id, $data){
       $sql ="UPDATE medecin SET nomMedecin ='".$data['nom']."',prenomMedecin ='".$data['prenom']."',codeService = '".$data['service']."',sexeMedecin = '".$data['sexe']."',adresseMedecin = '".$data['adresse']."',dateNaissanceMedecin = '".$data['dateNaissance']."',lieuNaissanceMedecin = '".$data['lieuNaissance']."',telMedecin ='".$data['tel']."'  WHERE userId= $id";
       $this->db->query($sql);
        return $this->db->execute();

    }
    public function supprPatient($id){
        $sql = "DELETE FROM patient,users WHERE userId=$id AND patient.userId=users.id";
          $this->db->query($sql);
          $data = $this->db->resultSet();
          return $data;
    }
    public function supprStaff($id){
        $sql = "DELETE FROM medecin WHERE userId=$id";
            $this->db->query($sql);
            return $this->db->execute();
    }
    public function statutC($id)
    {
        $conf = 'Confirmé';
        $sql ="UPDATE rendezvous SET etatRdv=:statut WHERE numeroRdv=:id";
        $this->db->query($sql); 
        $this->db->bind(':statut', $conf);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function statutA($id)
    {
        $conf = 'Annulé';
        $sql ="UPDATE rendezvous SET etatRdv=:statut WHERE numeroRdv=:id";
        $this->db->query($sql); 
        $this->db->bind(':statut', $conf);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    /** recuperation des donnees nécessaire pour l'envoi des mails de confirmation ou d'annulation au patient*/
    public function patientRdv($id)
    {
        $sql =PATGETRDVINF;
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function consultAdmin()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getAdminById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,rendezvous ";
        $sql .= "WHERE rendezvous.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        $sql .= RDVETATCONFIRME;
        $sql .= "AND medecin.codeMedecin =:codeMedecin ";
        $sql .= RDVORDRE;
        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $rows = $this->db->resultSet();
        return $rows;
    }
        /** edition des informations personnelles */
       public function editPersInfo($id,$data){
        $sql = "UPDATE patient SET nomPatient='".$data['nom']."',prenomPatient='".$data['prenom']."',sexePatient='".$data['sexe']."',adressePatient='". $data['adresse']."',dateNaissancePatient='".$data['dateNaissance']."',lieuNaissancePatient='".$data['lieuNaissance']."' WHERE IP= $id";
        $this->db->query($sql);
        $answer = $this->db->execute();    
        return $answer ;
    }
    /** edition des informations sur le contact d'urgence */
    public function editEmerInfo($id,$data){
        
        $sql = "UPDATE contacturgence SET nomContact='".$data['nomContact']."',prenomContact='".$data['prenomContact']."',sexeContact='".$data['sexeContact']."',adresseContact='".$data['adresseContact']."',telurgence='".$data['telurgence']."' WHERE IP=$id";
        $this->db->query($sql);
        $answer = $this->db->execute();   
        return $answer;
    }
       public function registerRapport($id)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getAdminById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,rendezvous ";
        $sql .= "WHERE rendezvous.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        $sql .= RDVETATCONFIRME;
        $sql .= "AND medecin.codeMedecin =:codeMedecin ";
        
        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $rows = $this->db->resultSet();
        return $rows;
    }
}
