<?php
    /* this model (class) is to control all users */
    class User
    {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }
        //find user by email
        public function findUserByEmail($email)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();

            // check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

    }
    //firts etap registration as user
    public function register($data)
    {
        $this->db->query('INSERT INTO users (email,password,type,state) VALUES (:email,:password,:type,:state)');
        // bind value
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':type',$data['type']);
        $this->db->bind(':state','incomplet');
        // excecute and return the stat
        return $this->db->execute();
    }
    //login for any user in our system
    public function login($email,$pass)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email',$email);
        $this->db->execute();
        $row = $this->db->single();
        $hashedPass = $row->password;
        if(password_verify($pass,$hashedPass)){
            return $row;
        }else{
            return false;
        }
        }
    }
    
?>