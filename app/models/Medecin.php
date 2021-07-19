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
    /** lister tous les services de l'hosto */
    public function listeService()
    {
        $sql = "SELECT * ";
        $sql .= "FROM service ";
        $sql .= "GROUP BY service.codeService ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    /** lister tous les jours de la semaine */
    public function listeJour()
    {
        $sql = "SELECT * ";
        $sql .= "FROM jours ";
        $sql .= "GROUP BY jours.codeJour DESC";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    public function medRdvAll($forMedecin, $filter)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,consultations,rendezvous,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        $sql .= "AND rendezvous.codeMedecin = medecin.codeMedecin ";
        if ($filter == "Attente") {
            $sql .= "AND rendezvous.etatRdv = 'Attente' ";
        } elseif ($filter == "Confirme") {
            $sql .= "AND rendezvous.etatRdv = 'Confirme' ";
        }
        if ($forMedecin == "only") {
            $sql .= "AND medecin.codeMedecin = :codeMedecin ";
        }
        $sql .= "ORDER BY rendezvous.numeroRdv DESC  ";
        $this->db->query($sql);
        if ($forMedecin == "only") {
            $this->db->bind(':codeMedecin', $codeMedecin);
        }
        $rows = $this->db->resultSet();
        return $rows;
    }
    public function patients()
    {
        $sql = "SELECT * FROM patient,users WHERE patient.userId = users.id ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
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
    /** planning hebdomadaire d'un medecin*/
    public function planning()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
        $sql = "SELECT * FROM service,plannings,medecin WHERE plannings.codeMedecin = medecin.codeMedecin AND medecin.codeService=service.codeService AND medecin.codeMedecin=".$codeMedecin;
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;
    }
    /** planning hebdomadaire d'un medecin*/
    public function planningAction($data)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
        $sql = ADDPLANNING;

        $this->db->query($sql);
        $this->db->bind(':jours', $data['jour']);
        $this->db->bind(':disponibilites', $data['disponibilites']);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $answer = $this->db->execute();
        return $answer;
    }
    public function profilePatient($id)
    {
        $sql = "SELECT * FROM patient,users WHERE userId=$id AND patient.userId=users.id";
        $this->db->query($sql);
        $data = $this->db->resultSet();
        return $data;
    }
    //fonction editer un profile medecin
    public function editProfile($data)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $sql = "UPDATE medecin SET nomMedecin ='" . $data['nom'] . "',prenomMedecin ='" . $data['prenom'] . "',codeService = '" . $data['service'] . "',sexeMedecin = '" . $data['sexe'] . "',adresseMedecin = '" . $data['adresse'] . "',dateNaissanceMedecin = '" . $data['dateNaissance'] . "',lieuNaissanceMedecin = '" . $data['lieuNaissance'] . "',telMedecin ='" . $data['tel'] . "'  WHERE userId= ". $_SESSION['userId'];
        $this->db->query($sql);
        return $this->db->execute();
    }
    //fonction recuperer identifiant
    public function recuperId(){
    $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
    $data=[
        $email=$this->getMedecinById($user)->email,
        $password=$this->getMedecinById($user)->password,
    ];
        return $data;
    }
    public function recuperIdentifiant()
    {
        $sql1 = GETUSER;

        $this->db->query($sql1);
        $answer = $this->db->resultSet();
        return $answer;
   }
   public function users(){
        // $user = [
        //     'id'    =>  $_SESSION['userId'],
        //     'type'  =>  $_SESSION['userType'],
        //     'email' => $_SESSION['userMail'],
        //     'state' => $_SESSION['userState']
        // ];
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $_SESSION['userId']);
        $this->db->execute();
        $row = $this->db->single();
        $hashedPass = $row->password;
        return $hashedPass;
        // // $sql1 = "SELECT * FROM users WHERE id=". $_SESSION['userId'];

        // $this->db->query($sql1);
        // $answer = $this->db->single();
        // return $answer;
       
   }
  public function editInfo($data)
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $sql = "UPDATE users SET email ='" . $data['email'] . "',password ='" . $data['newPwd'] . "' WHERE id= " . $_SESSION['userId'];
        $this->db->query($sql);
        return $this->db->execute();
   }


}