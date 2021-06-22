<?php

    class Specialization {

        private $id;
        private $specialization;
        
        public function __construct($id, $specialization) {
            $this->id = $id;
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