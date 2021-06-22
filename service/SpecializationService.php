<?php
    require_once __DIR__.'/../model/Specialization.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class SpecializationService {
        private $specializationManager;
        public function __construct() {
            $this->specializationManager = ManagerFactory::getSpecializationManager();
        }

        public function getSpecializations() {
            $specializations = array();
            $results  = $this->specializationManager->getSpecializations();
            foreach($results as $result){
                $specializations[] = new Specialization($result->id, $result->specialization);
            }
            return $specializations;
        } 

    }

?>