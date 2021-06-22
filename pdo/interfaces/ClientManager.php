<?php

    interface ClientManager {
        public Function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password);
        public function updateClient($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password);
        public Function authenticate($email);
        public function getClientById($id);
        public function getClientByEmail($email);
        public function getClientByPhonenumber($phonenumber);
        public function verifyEmailBelongToOtherClient($id, $email);
    }

?>