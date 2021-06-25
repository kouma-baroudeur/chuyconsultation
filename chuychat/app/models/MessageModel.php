<?php 
    class MessageModel extends DB{
        public function findUserAndMessage($unique_id, $outgoing_id){
            $sql = "SELECT * FROM messages WHERE (incoming_msg_id = {$unique_id}
            OR outgoing_msg_id = {$unique_id}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

            return $this->executeResult($sql);
        }

        public function insertChat($incoming_id, $outgoing_id, $message){
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                    VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
            return $this->execute($sql);
        }

        public function getMessageChat($outgoing_id, $incoming_id){
            $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
            return $this->executeResult($sql);
        }
    }
