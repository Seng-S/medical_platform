<?php
    require_once __DIR__.'/../model/Client.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class ClientService {
        private $clientManager;
        public function __construct() {
            $this->clientManager = ManagerFactory::getClientManager();
        }

        public function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
            $clientId = $this->clientManager->signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $encryptedPassword);
            
            if($clientId) {
                return new client($clientId, $firstname, $lastname, $date_of_birth, $phonenumber, $email, "");
            }
        }

        public function updateClient($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {
            $client = $this->getClientById($id);
            $error = new stdClass();
            $error->hasError = true;
            
            if($client->getId() == $id){
                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updated = $this->clientManager->updateClient($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $encryptedPassword);
                
                if($updated) {
                    return new client($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, "");
                }
            }
            else {
                $error->invalidClientId = true;
                return $error;
            }
        }

        public function getClientById($id) {
            $result  = $this->clientManager->getClientById($id);
            if($result){
                return new Client($result->id, $result->firstname, $result->lastname, $result->date_of_birth, $result->phonenumber, $result->email, $result->password);
            }
            return false;
        } 
        
        public function checkid($id) {
            $result = $this->clientManager->getClientById($id);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

        public function checkEmail($email) {
            $result = $this->clientManager->getClientByEmail($email);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

        public function verifyEmailBelongToOtherClient($id, $email) {
            $result = $this->clientManager->verifyEmailBelongToOtherClient($id, $email);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

        public function checkPhonenumber($phonenumber) {
            $result = $this->clientManager->getClientByPhonenumber($phonenumber);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

         public function authenticate($email, $password) {
            $result = $this->clientManager->authenticate($email);
            
            if($result) {
                if(password_verify($password, $result->password)) {
                    return new Client($result->id, $result->firstname, $result->lastname, $result->date_of_birth, $result->phonenumber, $result->email, "");
                }
            }
        }

    }

?>