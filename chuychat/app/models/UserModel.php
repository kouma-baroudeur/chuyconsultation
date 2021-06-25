<?php
    class UserModel extends DB{
        public function getUser($unique_id){
            $sql = "SELECT * FROM users WHERE unique_id = {$unique_id}";
            return $this->executeResult($sql);
        }

        public function checkSignup($email){
            $sql = "SELECT * FROM users WHERE email = '{$email}'";
            return $this->executeResult($sql);
        }

        public function insertUser($ran_id, $fname, $lname, $email, $encrypt_pass, $new_img_name, $status){
            $sql = "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
            VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')";
            return $this->execute($sql);                           
        }

        public function updateStatus($unique_id, $status ){
            $sql = "UPDATE users SET status = '{$status}' WHERE unique_id = {$unique_id}";
            return $this->execute($sql);
        }

        public function getAllUserChat($outgoing_id){
            $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";       
            return $this->executeResult($sql);
        }

        public function logOut($status, $logout_id){
            $sql = "UPDATE users SET status = '{$status}' WHERE unique_id={$logout_id}";
            return $this->execute($sql);
        }
    }
