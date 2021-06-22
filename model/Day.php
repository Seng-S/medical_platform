<?php

    class Day {

        private $id;
        private $day;
        
        public function __construct($id, $day) {
            $this->id = $id;
            $this->day = $day;
        
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

        public function setDays($day)
        {
                $this->day = $day;
        }


    }

?>