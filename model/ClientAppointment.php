<?php

    class ClientAppointment {
        private $appointmentsId;
        private $dateOfAppointment;
        private $clientId;
        private $firstname;
        private $lastname;
        private $phonenumber;
        private $email;

        public function __construct($appointmentsId, $dateOfAppointment, $clientId, $firstname, $lastname, $phonenumber, $email) {
            $this->appointmentsId = $appointmentsId;
            $this->dateOfAppointment = $dateOfAppointment;
            $this->clientId = $clientId;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->phonenumber = $phonenumber;
            $this->email = $email;
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

        public function getClientId()
        {
                return $this->clientId;
        }

        public function setClientId($clientId)
        {
                $this->clientId = $clientId;
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

    }

?>