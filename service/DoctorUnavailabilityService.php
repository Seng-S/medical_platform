<?php
    require_once __DIR__.'/../model/DoctorUnavailability.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    $invaliduserid = false;
    $error = new stdClass();

    class DoctorUnavailabilityService {
        private $doctorUnavailabilityManager;
        public function __construct() {
            $this->doctorUnavailabilityManager = ManagerFactory::getDoctorUnavailabilityManager();
        }

        public function addDoctorUnavailability($dayId, $doctorId) {
            $doctorUnavailabilityId = $this->doctorUnavailabilityManager->addDoctorUnavailability($dayId, $doctorId);
            
            if($doctorUnavailabilityId) {
                return new DoctorUnavailability($doctorUnavailabilityId, $dayId, $doctorId);
            }
        }

        public function getDoctorUnavailabilityById($id) {
            $result  = $this->doctorUnavailabilityManager->getDoctorUnavailabilityById($id);
            if($result){
                return new DoctorUnavailability($result->id, $result->day_id, $result->doctor_id);
            }
            return false;
        }

        public function getUnavailabilityByDay($doctorId, $dayId) {
            $unavailabilities = array();
            $results  = $this->doctorUnavailabilityManager->getUnavailabilityByDay($doctorId, $dayId);
            foreach($results as $result){
                $unavailabilities[] = new DoctorUnavailability($result->id, $result->day, $result->doctor_id);
            }
            return $unavailabilities;
        }

        public function getUnavailabilityByDoctorId($doctorId) {
            $unavailabilities = array();
            $results = $this->doctorUnavailabilityManager->getUnavailabilityByDoctorId($doctorId);
            foreach($results as $result){
                $unavailabilities[] = new DoctorUnavailability($result->id, $result->day, $result->doctor_id);
            }
            return $unavailabilities;
        }

        public function deleteDoctorUnavailability($id, $doctorId){
            $doctorUnavailability = $this->getDoctorUnavailabilityById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$doctorUnavailability){
                $error->invalidId = true;
                return $error;
            }
            
            if($doctorUnavailability->getDoctor() == $doctorId){
                $isDeleted = $this->doctorUnavailabilityManager->deleteDoctorUnavailability($id);
                $result = new stdClass();
                $result->isDeleted = true;
                $result->id = $id;
                return $result;
            }
            else {
                $error->invalidDoctorId = true;
                return $error;
            }
            
        }

    }

?>