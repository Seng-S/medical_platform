<?php

    interface DoctorManager {
        public Function authenticate($email);
        public Function signUp($firstname, $lastname, $date_of_birth, $phonenumber, $email, $password);
        public function updateDoctor($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password);
        public function getDoctorById($id);
        public function getDoctorByEmail($email);
        public function getDoctorByPhonenumber($phonenumber);
        public function verifyEmailBelongToOtherDoctor($id, $email);
    }

?>