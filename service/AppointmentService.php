<?php
    require_once __DIR__.'/../model/Appointment.php';
    require_once __DIR__.'/../pdo/Managerfactory.php';

    class AppointmentService {
        private $appointmentManager;
        public function __construct() {
            $this->appointmentManager = ManagerFactory::getAppointmentManager();
        }

        public function addAppointment($dateOfAppointment, $clientId, $doctorId) {
            $appointmentId = $this->appointmentManager->addAppointment($dateOfAppointment, $clientId, $doctorId);
            
            if($appointmentId) {
                return new Appointment($appointmentId, $dateOfAppointment, $clientId, $doctorId);
            }
        }

        public function getAppointmentById($id) {
            $result  = $this->appointmentManager->getAppointmentById($id);
            if($result){
                return new Appointment($result->id, $result->date_of_appointment, $result->client_id, $result->doctor_id);
            }
            return false;
        }

        public function getAppointmentByDoctorIdAndDate($doctorId, $dateOfAppointment) {
            $appointments  = array();
            $results = $this->appointmentManager->getAppointmentByDoctorIdAndDate($doctorId, $dateOfAppointment);
            foreach($results as $result){
                $appointments[] = new Appointment($result->id, $result->date_of_appointment, $result->client_id, $result->doctor_id);
            }
            return $appointments;
        }

        public function deleteAppointmentByClientId($id, $clientId){
            $appointment = $this->getAppointmentById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$appointment){
                $error->invalidId = true;
                return $error;
            }

            if($appointment->getClient() != $clientId) {
                $error->invalidClientId = true;
                return $error;
            }
            
            if(time() > strtotime($appointment->getDateOfAppointment())){
                $error->expiredAppointment = true;
                return $error;
            }
            $isDeleted = $this->appointmentManager->deleteAppointmentByClientId($id);
            $result = new stdClass();
            $result->isDeleted = true;
            $result->id = $id;
            return $result;
            
        }

        public function deleteAppointmentByDoctorId($id, $doctorId){
            $appointment = $this->getAppointmentById($id);
            $error = new stdClass();
            $error->hasError = true;

            if(!$appointment){
                $error->invalidId = true;
                return $error;
            }

            if($appointment->getDoctor() != $doctorId) {
                $error->invalidDoctorId = true;
                return $error;
            }

            if(time() > strtotime($appointment->getDateOfAppointment())) {
                $error->expiredAppointment = true;
                return $error;
            }
            $isDeleted = $this->appointmentManager->deleteAppointmentByDoctorId($id);
            $result = new stdClass();
            $result->isDeleted = true;
            $result->id = $id;
            return $result;
        }

    }

?>