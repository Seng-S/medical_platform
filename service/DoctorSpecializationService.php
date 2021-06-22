<?php
    require_once __DIR__.'/../model/DoctorSpecialization.php';
    require_once __DIR__.'/../model/Specialization.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    $invaliduserid = false;
    $error = new stdClass();

    class DoctorSpecializationService {
        private $doctorSpecializationManager;
        public function __construct() {
            $this->doctorSpecializationManager = ManagerFactory::getDoctorSpecializationManager();
        }

        public function addDoctorSpecialization($doctorId, $specializationId) {
            $doctorSpecializationId = $this->doctorSpecializationManager->addDoctorSpecialization($doctorId, $specializationId);
            
            if($doctorSpecializationId) {
                return new DoctorSpecialization($doctorSpecializationId, $doctorId, $specializationId);
            }
        }

        public function getDoctorSpecializationById($id) {
            $result  = $this->doctorSpecializationManager->getDoctorSpecializationById($id);
            if($result){
                return new DoctorSpecialization($result->id, $result->doctor_id, $result->specialization_id);
            }
            return false;
        }

        public function getSpecializationByDoctorId($doctorId) {
            $specializations = array();
            $results  = $this->doctorSpecializationManager->getSpecializationByDoctorId($doctorId);
            foreach($results as $result){
                $specializations[] = new DoctorSpecialization($result->id, $result->doctor_id, $result->specialization);
            }
            return $specializations;
        }

        public function deleteDoctorSpecialization($id, $doctorId){
            $doctorSpecialization = $this->getDoctorSpecializationById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$doctorSpecialization){
                $error->invalidId = true;
                return $error;
            }
            
            if($doctorSpecialization->getDoctor() == $doctorId){
                $isDeleted = $this->doctorSpecializationManager->deleteDoctorSpecialization($id);
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