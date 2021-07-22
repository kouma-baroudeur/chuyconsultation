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

    /** lister tous les medecins d'un service */
    public function listeMedecinsService($codeService)
    {
        $sql = "SELECT * ";
        $sql .= "FROM medecin ";
        $sql .= "WHERE codeService = ".$codeService;
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
        $sql = "SELECT * FROM service,plannings,medecin WHERE plannings.codeMedecin = medecin.codeMedecin AND medecin.codeService=service.codeService AND medecin.codeMedecin=" . $codeMedecin;
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

    /** Supprimmer l ancien planning du medecin*/
    public function viderPlanning($medecin)
    {
        $sql = DELETEPLANNING;

        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $medecin);
        $answer = $this->db->execute();
        return $answer;
    }

    /** Retourne le planning d un medecin*/
    public function getPlanning($medecin)
    {
        $sql = GETPLANNING;

        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $medecin);
        $answer = $this->db->execute();
        return $answer;
    }

    /** Retourne le planning des medecins*/
    public function getAllMedPlannings()
    {
        $sql = GETALLMEDPLANNINGS;

        $this->db->query($sql);
        $answer = $this->db->execute();
        return $answer;
    }

    /** Emmerger le planning d'un medecin*/
    public function emergerPlanning($medecin, $jour, $heureDebut, $heureFin)
    {
        $sql = ADDPLANNING;

        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $medecin);
        $this->db->bind(':jour', $jour);
        $this->db->bind(':heureDebut', $heureDebut);
        $this->db->bind(':heureFin', $heureFin);
        $answer = $this->db->execute();
        return $answer;
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
        $sql = "UPDATE medecin SET nomMedecin ='" . $data['nom'] . "',prenomMedecin ='" . $data['prenom'] . "',sexeMedecin = '" . $data['sexe'] . "',adresseMedecin = '" . $data['adresse'] . "',dateNaissanceMedecin = '" . $data['dateNaissance'] . "',lieuNaissanceMedecin = '" . $data['lieuNaissance'] . "',telMedecin ='" . $data['tel'] . "'  WHERE userId= " . $_SESSION['userId'];
        $this->db->query($sql);
        return $this->db->execute();
    }
    //fonction recuperer identifiant
    public function recuperId()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $data = [
            $email = $this->getMedecinById($user)->email,
            $password = $this->getMedecinById($user)->password,
        ];
        return $data;
    }

    public function users()
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $_SESSION['userId']);
        $this->db->execute();
        $row = $this->db->single();
        $hashedPass = $row->password;
        return $hashedPass; // return $answer;

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
    public function editpreInfo($data)
    {
        $sql = "UPDATE premiereobservation SET SET poids='" . $data['poids'] . "',taille='" . $data['taille'] . "',PA='" . $data['pa'] . "',pouls='" . $data['pouls'] . "',antecedantMedicaux='" . $data['antmed'] . "',antecedantFamiliaux='" . $data['antfam'] . "',allergies='" . $data['allergies'] . "',goupeSanguin='" . $data['groupeSanguin'] . "',rhesus='" . $data['rhesus'] . "',examenPhysique='" . $data['examens'] . "' WHERE IP=".$data['id'];
        $this->db->query($sql);
        return $this->db->execute();
    }
    /**liste tous les patients */
    public function listePatient()
    {
        $sql = "SELECT * FROM patient";
        $this->db->query($sql);
        $response = $this->db->resultSet();
        return $response;
    }
    public function profilePatient($id)
    {
        $sql = "SELECT * FROM patient WHERE IP=" . $id;
        $this->db->query($sql);
        $response = $this->db->single();
        return $response;
    }
    public function premiereInfo($id)
    {
        $sql = "SELECT * FROM premiereobservation WHERE IP=" . $id;
        $this->db->query($sql);
        $response = $this->db->single();
        return $response;
    }
    public function recupurgence($id)
    {
        $sql = "SELECT * FROM contacturgence WHERE IP=" . $id;
        $this->db->query($sql);
        $answer = $this->db->single();
        return $answer;
    }
    public function consultMedecin()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,consultations ";
        $sql .= "WHERE consultations.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND consultations.IP = patient.IP ";
        $sql .= "AND medecin.codeMedecin =:codeMedecin ";
        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function consultPatient($ip)
    {
        $sql = "SELECT * ";
        $sql .= "FROM medecin,consultations ";
        $sql .= "WHERE consultations.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND consultations.IP = :IP ";
        $this->db->query($sql);
        $this->db->bind(':IP', $ip);
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function getConsultation($id)
    {

        $sql = "SELECT * ";
        $sql .= "FROM patient,consultations ";
        $sql .= "WHERE consultations.IP = patient.IP ";
        $sql .= "AND numeroConsultation=:id ";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function add_consultation($data)
    {

        $sql = ADDCONSULT;
        $this->db->query($sql);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':symptomes', $data['symptomes']);
        $this->db->bind(':dateConsultation', $data['date_consultation']);
        $this->db->bind(':dateEdition', $data['dateEdition']);
        $this->db->bind(':codeMedecin', $data['medecin']);
        $this->db->bind(':IP', $data['patient']);
        return $this->db->execute();
    }

    public function edit_consultation($data)
    {
        $sql = "UPDATE consultations SET contenu = :contenu, symptomes = :symptomes, dateEdition = :dateEdition  WHERE numeroConsultation =:numeroConsultation";
        $this->db->query($sql);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':symptomes', $data['symptomes']);
        $this->db->bind(':dateEdition', $data['dateEdition']);
        $this->db->bind(':numeroConsultation', $data['numeroConsultation']);

        return $this->db->execute();
    }

    //renvoie rendez-vous en attente du medecin
    public function rvdAttente()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .= "FROM patient,medecin,rendezvous ";
        $sql .= "WHERE rendezvous.codeMedecin = medecin.codeMedecin ";
        $sql .= "AND rendezvous.IP = patient.IP ";
        $sql .= RDVETATATTENTE;
        $sql .= "AND medecin.codeMedecin =:codeMedecin ";
        $sql .= RDVORDRE;
        $this->db->query($sql);
        $this->db->bind(':codeMedecin', $codeMedecin);
        $rows = $this->db->resultSet();
        return $rows;
    }
    //renvoie rendez-vous en valide du medecin
    public function rvdValide()
    {
        $user = [
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
        ];
        $codeMedecin = $this->getMedecinById($user)->codeMedecin;
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

    public function annulerRdv($id)
    {
        $conf = 'Annulé';
        $sql = "UPDATE rendezvous SET etatRdv=:statut WHERE numeroRdv =:id";
        $this->db->query($sql);
        $this->db->bind(':statut', $conf);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function confirmerRdv($id)
    {
        $conf = 'Confirmé';
        $sql = "UPDATE rendezvous SET etatRdv=:statut WHERE numeroRdv=:id";
        $this->db->query($sql);
        $this->db->bind(':statut', $conf);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function supprimerRdv($id)
    {
        $conf = 'refuser';
        $sql = "UPDATE rendezvous SET etatRdv=:statut WHERE numeroRdv=:id";
        $this->db->query($sql);
        $this->db->bind(':statut', $conf);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
