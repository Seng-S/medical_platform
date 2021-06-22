<?php
    require_once __DIR__.'/../model/DoctorWorkingHour.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';
    require_once 'DoctorUnavailabilityService.php';

    $invaliduserid = false;
    $error = new stdClass();

    class DoctorWorkingHourService {
        private $doctorWorkingHourManager;
        public function __construct() {
            $this->doctorWorkingHourManager = ManagerFactory::getDoctorWorkingHourManager();
        }

        public function addDoctorWorkingHour($doctorId, $dayId, $startingHour, $endingHour) {
            $doctorWorkingHourId = $this->doctorWorkingHourManager->addDoctorWorkingHour($doctorId, $dayId, $startingHour, $endingHour);
            
            if($doctorWorkingHourId) {
                return new DoctorWorkingHour($doctorWorkingHourId, $doctorId, $dayId, $startingHour, $endingHour);
            }
        }

        public function getDoctorWorkingHourById($id) {
            $result  = $this->doctorWorkingHourManager->getDoctorWorkingHourById($id);
            if($result){
                return new DoctorWorkingHour($result->id, $result->doctor_id, $result->day_id, $result->starting_hour, $result->ending_hour);
            }
            return false;
        }

        public function getWorkingHourByDay($doctorId, $dayId) {
            $doctorUnavailabiltyService = new DoctorUnavailabilityService();
            $doctorUnavailabilities = $doctorUnavailabiltyService->getUnavailabilityByDay($doctorId, $dayId);
            $workingHours = array();
            if(count($doctorUnavailabilities) == 0){
                $results = $this->doctorWorkingHourManager->getWorkingHourByDay($doctorId, $dayId);
                foreach($results as $result){
                    $workingHours[] = new DoctorWorkingHour($result->id, $result->doctor_id, $result->day_id, $result->starting_hour, $result->ending_hour);
                }
            }
            return $workingHours;
        }

        public function updateDoctorWorkingHour($id, $doctorId, $dayId, $startingHour, $endingHour) {
            $doctorWorkingHour = $this->getDoctorWorkingHourById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$doctorWorkingHour){
                $error->invalidId = true;
                return $error;
            }
            
            if($doctorWorkingHour->getDoctor() == $doctorId){
                $updated = $this->doctorWorkingHourManager->updateDoctorWorkingHour($id, $dayId, $startingHour, $endingHour);
                
                if($updated){
                    return new DoctorWorkingHour($id, $doctorId, $dayId, $startingHour, $endingHour);
                }
            }
            else {
                $error->invalidDoctorId = true;
                return $error;
            }
        }

        public function deleteDoctorWorkingHour($id, $doctorId){
            $doctorWorkingHour = $this->getDoctorWorkingHourById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$doctorWorkingHour){
                $error->invalidId = true;
                return $error;
            }
            
            if($doctorWorkingHour->getDoctor() == $doctorId){
                $isDeleted = $this->doctorWorkingHourManager->deleteDoctorWorkingHour($id);
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