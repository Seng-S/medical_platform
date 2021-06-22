<?php

    require_once __DIR__.'/../model/DoctorAppointment.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class DoctorAppointmentService {
        private $doctorAppointmentManager;
        public function __construct() {
            $this->doctorAppointmentManager = ManagerFactory::getDoctorAppointmentManager();
        }

        public function getDoctorAppointmentByClientId($clientId) {
            $appointments  = array();
            $results = $this->doctorAppointmentManager->getDoctorAppointmentByClientId($clientId);
            foreach($results as $result){
                $appointments[] = new DoctorAppointment($result->id, $result->date_of_appointment, $result->doctor_id, $result->firstname, $result->lastname, $result->phonenumber, $result->email, $result->address, $result->departement, $result->region, $result->postal_code);
            }
            return $appointments;
        }

        public function countAppointmentByClientId($clientId) {
            return $this->doctorAppointmentManager->countAppointmentByClientId($clientId);
        }
    }

?>