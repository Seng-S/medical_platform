<?php

    class DoctorUnavailability {

        private $id;
        private $day;
        private $doctor;
        
        public function __construct($id, $day, $doctor) {
            $this->id = $id;
            $this->day = $day;
            $this->doctor = $doctor;
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

        public function getDay()
        {
                return $this->day;
        }

        public function setDay($day)
        {
                $this->day = $day;

        }

        public function getDoctor()
        {
                return $this->doctor;
        }

        public function setDoctor($doctor)
        {
                $this->doctor = $doctor;

        }

    }

?>