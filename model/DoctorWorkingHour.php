<?php

    class DoctorWorkingHour {

        private $id;
        private $doctor;
        private $day;
        private $starting_hour;
        private $ending_hour;
        
        public function __construct($id, $doctor, $day, $starting_hour, $ending_hour) {
            $this->id = $id;
            $this->doctor = $doctor;
            $this->day = $day;
            $this->starting_hour = $starting_hour;
            $this->ending_hour = $ending_hour;
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

        public function getDay()
        {
                return $this->day;
        }

        public function setDay($day)
        {
                $this->day = $day;

        }

        public function getStartingHour()
        {
                return $this->starting_hour;
        }

        public function setStartingHour($starting_hour)
        {
                $this->starting_hour = $starting_hour;

        }

        public function getEndingHour()
        {
                return $this->ending_hour;
        }

        public function setEndingHour($ending_hour)
        {
                $this->ending_hour = $ending_hour;

        }

    }

?>