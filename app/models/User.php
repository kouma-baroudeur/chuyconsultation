<?php
/* this model (class) is to control patient */
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    // find user by email
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
    public function register($data)
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
    public function login($email, $pass)
    {
        $this->db->query(FINDUSERBYMAIL);
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->single();
        $hashedPass = $row->password;
        if (password_verify($pass, $hashedPass)) {
            return $row;
        } else {
            return false;
        }
    }
    /** update user */
    public function updateUser($data)
    {
        $sql = "UPDATE users SET email=".$data['email']."password = ".$data['password'];
        $this->db->query($sql);
        $answer = $this->db->execute();    
        return $answer ;
    }
}
