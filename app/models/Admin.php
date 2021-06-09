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
    public function profileuser()
    {
        $sql = "SELECT * ";
        $sql .= "FROM medecin,service,users ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "AND medecin.userId = users.id ";
        $this->db->query($sql);
        $answer = $this->db->execute();
        return $answer;
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
}
