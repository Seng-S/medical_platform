<?php

    class DoctorAddress {

        private $id;
        private $doctor;
        private $address;
        private $departement;
        private $region;
        private $postal_code;
        
        public function __construct($id, $doctor, $address, $departement, $region, $postal_code) {
            $this->id = $id;
            $this->doctor = $doctor;
            $this->address = $address;
            $this->departement = $departement;
            $this->region = $region;
            $this->postal_code = $postal_code;
        
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

        public function getDoctor()
        {
                return $this->doctor;
        }

        public function setDoctor($doctor)
        {
                $this->doctor = $doctor;

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

        public function getPostalCode()
        {
                return $this->postal_code;
        }

        public function setPostalCode($postal_code)
        {
                $this->postal_code = $postal_code;

        }

    }

?>