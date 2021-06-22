<?php
    require_once __DIR__.'/../interfaces/DoctorManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorManager extends AbstractPdoManager implements DoctorManager {
        
        public function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {		
            $query = self::instance()->prepare("
                INSERT INTO doctor (firstname, lastname, date_of_birth, phonenumber, email, password)
                VALUES (:firstname, :lastname, :date_of_birth, :phonenumber, :email, :password)
            ");		
            $query->bindValue(':firstname', $firstname);
            $query->bindValue(':lastname', $lastname);
            $query->bindValue(':date_of_birth', $date_of_birth);
            $query->bindValue(':phonenumber', $phonenumber);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
    
            if($query->execute()) {
                $doctorId = self::instance()->lastInsertId();
                return $doctorId;
            }
            
        }

        public function updateDoctor($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password){
            $query = self::instance()->prepare("
                UPDATE doctor SET firstname=:firstname, lastname=:lastname, date_of_birth=:date_of_birth, phonenumber=:phonenumber, email=:email, password=:password WHERE id=:id;
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

        public function getDoctorById($id){
            $query = self::instance()->prepare('SELECT * FROM doctor WHERE id=:id');
            $query->bindValue(':id',$id);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function getDoctorByEmail($email){
            $query = self::instance()->prepare('SELECT email FROM doctor WHERE email=:email');
            $query->bindValue(':email',$email);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function getDoctorByPhonenumber($phonenumber){
            $query = self::instance()->prepare('SELECT phonenumber FROM doctor WHERE phonenumber=:phonenumber');
            $query->bindValue(':phonenumber',$phonenumber);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function authenticate($email) {
            $query = self::instance()->prepare('SELECT id, firstname, lastname, date_of_birth, phonenumber, email, password  FROM doctor WHERE (email=:email)');
            $query->bindvalue(':email', $email);
            $query->execute();
    
            $result = $query->fetch(PDO::FETCH_OBJ);
    
            return $result;
        }

        public function verifyEmailBelongToOtherDoctor($id, $email) {
            $query = self::instance()->prepare('SELECT email FROM doctor WHERE email=:email AND id!=:id;');
            
            $query->bindValue(':id', $id);
            $query->bindValue(':email',$email);
            $query->execute();
            
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

    }

?>