<?php

    class DoctorDetail {
        private $doctorId;
        private $firstname;
        private $lastname;
        private $specialization;
        private $phonenumber;
        private $email;
        private $address;
        private $departement;
        private $region;
        private $postalCode;

        public function __construct($doctorId, $firstname, $lastname, $specialization, $phonenumber, $email, $address, $departement, $region, $postalCode) {
            $this->doctorId = $doctorId;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->specialization = $specialization;
            $this->phonenumber = $phonenumber;
            $this->email = $email;
            $this->address = $address;
            $this->departement = $departement;
            $this->region = $region;
            $this->postalCode = $postalCode;
        }

        public function expose() {
            return get_object_vars($this);
        }

        public function getDoctorId()
        {
                return $this->doctorId;
        }

        public function setDoctorId($doctorId)
        {
                $this->doctorId = $doctorId;
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

        public function getSpecialization()
        {
                return $this->specialization;
        }

        public function setSpecialization($specialization)
        {
                $this->specialization = $specialization;

        }

        public function getPhonenumber()
        {
                return $this->phonenumber;
        }

        public function setPhonenumber($lastname)
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

        public function getAddress()
        {
                return $this->address;
        }

        public function setAddress($address)
        {
                $this->address = $address;

        }

        public function getDepartement()
        {
                return $this->departement;
        }

        public function setDepartement($departement)
        {
                $this->departement = $departement;
        }

        public function getRegion()
        {
                return $this->region;
        }

        public function setRegion($region)
        {
                $this->region = $region;
        }

        public function gePostalCode()
        {
                return $this->postalCode;
        }

        public function setPostalCode($postalCode)
        {
                $this->postalCode = $postalCode;
        }

    }

?>