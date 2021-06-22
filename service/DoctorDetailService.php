<?php

    require_once __DIR__.'/../model/DoctorDetail.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class DoctorDetailService {
        private $doctorDetailManager;
        public function __construct() {
            $this->doctorDetailManager = ManagerFactory::getDoctorDetailManager();
        }

        public function getDoctorByCriteria($criteria) {
            $criterias  = array();
            $results = $this->doctorDetailManager->getDoctorByCriteria($criteria);
            foreach($results as $result){
                $criterias[] = new DoctorDetail($result->doctor_id, $result->firstname, $result->lastname, $result->specialization, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $criterias;

        }
    
        public function getDoctorByRegion($region) {
            $regions = array();
            $results  = $this->doctorDetailManager->getDoctorByRegion($region);
            foreach($results as $result){
                $regions[] = new DoctorDetail($result->doctor_id, $result->firstname, $result->lastname, $result->specialization, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $regions;
        }

        public function getDoctorByAddress($address) {
            $addresses = array();
            $results  = $this->doctorDetailManager->getDoctorByAddress($address);
            foreach($results as $result){
                $addresses[] = new DoctorDetail($result->doctor_id, $result->firstname, $result->lastname, $result->specialization, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $addresses;
        }

        public function getDoctorBySpecialization($specialization) {
            $specializations = array();
            $results  = $this->doctorDetailManager->getDoctorBySpecialization($specialization);
            foreach($results as $result){
                $specializations[] = new DoctorDetail($result->doctor_id, $result->firstname, $result->lastname, $result->specialization, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $specializations;
        }

        public function getDoctorByName($criteria) {
            $criterias = array();
            $results  = $this->doctorDetailManager->getDoctorByName($criteria);
            foreach($results as $result){
                $criterias[] = new DoctorDetail($result->doctor_id, $result->firstname, $result->lastname, $result->specialization, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $criterias;
        }

    }
?>