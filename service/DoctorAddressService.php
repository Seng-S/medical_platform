<?php
    require_once __DIR__.'/../model/DoctorAddress.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    $invaliduserid = false;
    $error = new stdClass();

    class DoctorAddressService {
        private $doctorAddressManager;
        public function __construct() {
            $this->doctorAddressManager = ManagerFactory::getDoctorAddressManager();
        }

        public function addDoctorAddress($doctorId, $address, $departement, $region, $postalCode) {
            $doctorAddressId = $this->doctorAddressManager->addDoctorAddress($doctorId, $address, $departement, $region, $postalCode);
            
            if($doctorAddressId) {
                return new DoctorAddress($doctorAddressId, $doctorId, $address, $departement, $region, $postalCode);
            }
        }

        public function getDoctorAddressById($id) {
            $result  = $this->doctorAddressManager->getDoctorAddressById($id);
            if($result){
                return new DoctorAddress($result->id, $result->doctor_id, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return false;
        }

        public function getAddressByDoctorId($doctorId) {
            $addresses = array();
            $results  = $this->doctorAddressManager->getAddressByDoctorId($doctorId);
            foreach($results as $result){
                $addresses[] = new DoctorAddress($result->id, $result->doctor_id, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $addresses;
        }

        public function updateDoctorAddress($id, $doctorId, $address, $departement, $region, $postalCode) {
            $doctorAddress = $this->getDoctorAddressById($id);
            $error = new stdClass();
            $error->hasError = true;
            
            if($doctorAddress->getDoctor() == $doctorId){
                $updated = $this->doctorAddressManager->updateDoctorAddress($id, $address, $departement, $region, $postalCode);
                
                if($updated){
                    return new DoctorAddress($id, $doctorId, $address, $departement, $region, $postalCode);
                }
            }
            else {
                $error->invalidDoctorId = true;
                return $error;
            }
        }

        public function deleteDoctorAddress($id, $doctorId){
            $doctorAddress = $this->getDoctorAddressById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$doctorAddress){
                $error->invalidId = true;
                return $error;
            }
            
            if($doctorAddress->getDoctor() == $doctorId){
                $isDeleted = $this->doctorAddressManager->deleteDoctorAddress($id);
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