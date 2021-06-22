<?php
    require_once __DIR__.'/../model/DoctorWorkingHour.php';
    require_once __DIR__.'/../model/DoctorUnavailability.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class StandardUserService {
        private $scheduleManager;
        public function _costruct() {
            $this->scheduleManager = ManagerFactory::getScheduleManager();
        }

    }

?>