<?php

    interface DoctorDetailManager {
        public function getDoctorByCriteria($criteria);
        public function getDoctorByRegion($region);
        public function getDoctorByAddress($address);
        public function getDoctorBySpecialization($specialization);
        public function getDoctorByName($criteria);
    }

?>