<?php

    class DoctorSpecialization {

        private $id;
        private $doctor;
        private $specialization;
        
        public function __construct($id, $doctor, $specialization) {
            $this->id = $id;
            $this->doctor = $doctor;
            $this->specialization = $specialization;
        
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

        public function getSpecialization()
        {
                return $this->specialization;
        }

        public function setSpecialization($specialization)
        {
                $this->specialization = $specialization;

        }


    }

?>