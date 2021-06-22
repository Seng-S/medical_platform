<?php

    class Doctor {
        
        private $id;
        private $firstname;
        private $lastname;
        private $date_of_birth;
        private $phonenumber;
        private $email;

        public function __construct($id, $firstname, $lastname, $date_of_birth, $phonenumber, $email, $password) {
            $this->id = $id;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->date_of_birth = $date_of_birth;
            $this->phonenumber = $phonenumber;
            $this->email = $email;
            $this->password = $password;
        }

        public function expose() {
            return get_object_vars($this);
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;
        }

        public function getFirstname()
        {
                return $this->firstname;
        }

        public function setFirstname($firstname)
        {
                $this->firstname = $firstname;

        }

        public function getLastname()
        {
                return $this->lastname;
        }

        public function setLastname($lastname)
        {
                $this->lastname = $lastname;

        }

        public function getDateOfBirth()
        {
                return $this->date_of_birth;
        }

        public function setDateOfBirth($date_of_birth)
        {
                $this->date_of_birth = $date_of_birth;

        }

        public function getPhonenumber()
        {
                return $this->phonenumber;
        }

        public function setPhonenumber($phonenumber)
        {
                $this->phonenumber = $phonenumber;

        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                $this->email = $email;

        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                $this->password = $password;

        }

    }

?>