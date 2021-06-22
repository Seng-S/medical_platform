<?php

    class DoctorAppointment {
        private $appointmentsId;
        private $dateOfAppointment;
        private $doctorId;
        private $firstname;
        private $lastname;
        private $phonenumber;
        private $email;
        private $address;
        private $departement;
        private $region;
        private $postalCode;
        
        public function __construct($appointmentsId, $dateOfAppointment, $doctorId, $firstname, $lastname, $phonenumber, $email, $address, $departement, $region, $postalCode) {
            $this->appointmentsId = $appointmentsId;
            $this->dateOfAppointment = $dateOfAppointment;
            $this->doctorId = $doctorId;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
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

        public function getAppointmentsId()
        {
                return $this->appointmentsId;
        }

        public function setAppointmentsId($appointmentsId)
        {
                $this->appointmentsId = $appointmentsId;

        }
        
        public function getDateOfAppointment()
        {
                return $this->dateOfAppointment;
        }

        public function setDateOfAppointment($dateOfAppointment)
        {
                $this->dateOfAppointment = $dateOfAppointment;

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