<?php
    require_once __DIR__.'/../model/Doctor.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class DoctorService {
        private $doctorManager;
        public function __construct() {
            $this->doctorManager = ManagerFactory::getDoctorManager();
        }

        public function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {
            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
            $doctorId = $this->doctorManager->signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $encryptedPassword);
            
            if($doctorId) {
                return new doctor($doctorId, $firstname, $lastname, $date_of_birth, $phonenumber, $email, "");
            }
        }

        public function updateDoctor($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {
            $doctor = $this->getDoctorById($id);
            $error = new stdClass();
            $error->hasError = true;
            
            if($doctor->getId() == $id){
                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updated = $this->doctorManager->updateDoctor($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $encryptedPassword);
                
                if($updated) {
                    return new doctor($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, "");
                }
            }
            else {
                $error->invalidDoctorId = true;
                return $error;
            }
        }

        public function getDoctorById($id) {
            $result  = $this->doctorManager->getDoctorById($id);
            if($result){
                return new Doctor($result->id, $result->firstname, $result->lastname, $result->date_of_birth, $result->phonenumber, $result->email, $result->password);
            }
            return false;
        } 
        
        public function checkEmail($email) {
            $result = $this->doctorManager->getDoctorByEmail($email);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

        public function checkPhonenumber($phonenumber) {
            $result = $this->doctorManager->getDoctorByPhonenumber($phonenumber);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

        public function authenticate($email, $password) {
            $result = $this->doctorManager->authenticate($email);
            
            if($result) {
                if(password_verify($password, $result->password)) {
                    return new Doctor($result->id, $result->firstname, $result->lastname, $result->date_of_birth, $result->phonenumber, $result->email, "");
                }
            }
        }

        public function verifyEmailBelongToOtherDoctor($id, $email) {
            $result = $this->doctorManager->verifyEmailBelongToOtherDoctor($id, $email);
            if($result) {
                return false;
            }
            else {
                return true;
            }
        }

    }

?>