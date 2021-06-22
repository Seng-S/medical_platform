<?php

    require_once __DIR__.'/../model/ClientAppointment.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class ClientAppointmentService {
        private $clientAppointmentManager;
        public function __construct() {
            $this->clientAppointmentManager = ManagerFactory::getClientAppointmentManager();
        }

        public function getClientAppointmentByDoctorId($doctorId) {
            $appointments  = array();
            $results = $this->clientAppointmentManager->getClientAppointmentByDoctorId($doctorId);
            foreach($results as $result){
                $appointments[] = new ClientAppointment($result->id, $result->date_of_appointment, $result->client_id, $result->firstname, $result->lastname, $result->phonenumber, $result->email);
            }
            return $appointments;
        }

        public function countAppointmentByDoctorId($doctorId) {
            return $this->clientAppointmentManager->countAppointmentByDoctorId($doctorId);
        }
    }

?>