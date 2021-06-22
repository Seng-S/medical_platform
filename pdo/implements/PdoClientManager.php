<?php
    require_once __DIR__.'/../interfaces/ClientManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoClientManager extends AbstractPdoManager implements ClientManager {
        
        public function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {		
            $query = self::instance()->prepare("
                INSERT INTO client (firstname, lastname, date_of_birth, phonenumber, email, password)
                VALUES (:firstname, :lastname, :date_of_birth, :phonenumber, :email, :password)
            ");		
            $query->bindValue(':firstname', $firstname);
            $query->bindValue(':lastname', $lastname);
            $query->bindValue(':date_of_birth', $date_of_birth);
            $query->bindValue(':phonenumber', $phonenumber);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
    
            if($query->execute()) {
                $clientId = self::instance()->lastInsertId();
                return $clientId;
            }
            
        }

        public function updateClient($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password){
            $query = self::instance()->prepare("
                UPDATE client SET firstname=:firstname, lastname=:lastname, date_of_birth=:date_of_birth, phonenumber=:phonenumber, email=:email, password=:password WHERE id=:id;
            ");
            $query->bindValue(':id', $id);
            $query->bindValue(':firstname', $firstname);
            $query->bindValue(':lastname', $lastname);
            $query->bindValue(':date_of_birth', $date_of_birth);
            $query->bindValue(':phonenumber', $phonenumber);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
    
            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function getClientById($id){
            $query = self::instance()->prepare('SELECT * FROM client WHERE id=:id');
            $query->bindValue(':id',$id);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function getClientByEmail($email){
            $query = self::instance()->prepare('SELECT email FROM client WHERE email=:email');
            $query->bindValue(':email',$email);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function getClientByPhonenumber($phonenumber){
            $query = self::instance()->prepare('SELECT phonenumber FROM client WHERE phonenumber=:phonenumber');
            $query->bindValue(':phonenumber',$phonenumber);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function authenticate($email) {
            $query = self::instance()->prepare('SELECT id, firstname, lastname, date_of_birth, phonenumber, email, password  FROM client WHERE (email=:email)');
            $query->bindvalue(':email', $email);
            $query->execute();
    
            $result = $query->fetch(PDO::FETCH_OBJ);
    
            return $result;
        }

        public function verifyEmailBelongToOtherClient($id, $email) {
            $query = self::instance()->prepare('SELECT email FROM client WHERE email=:email AND id!=:id;');
            
            $query->bindValue(':id', $id);
            $query->bindValue(':email',$email);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

    }

?>