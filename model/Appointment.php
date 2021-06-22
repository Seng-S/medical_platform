<?php

    class Appointment {

        private $id;
        private $date_of_appointment;
        private $client;
        private $doctor;
        
        public function __construct($id, $date_of_appointment, $client, $doctor) {
            $this->id = $id;
            $this->date_of_appointment = $date_of_appointment;
            $this->client = $client;
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

        public function getDateOfAppointment()
        {
                return $this->date_of_appointment;
        }

        public function setDateOfAppointment($date_of_appointment)
        {
                $this->date_of_appointment = $date_of_appointment;

        }

        public function getClient()
        {
                return $this->client;
        }

        public function setClient($client)
        {
                $this->client = $client;

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