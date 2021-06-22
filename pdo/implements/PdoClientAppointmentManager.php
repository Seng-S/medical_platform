<?php
    require_once __DIR__.'/../interfaces/ClientAppointmentManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoClientAppointmentManager extends AbstractPdoManager implements ClientAppointmentManager {

        public function getClientAppointmentByDoctorId($doctorId){
            $query = self::instance()->prepare("SELECT a.id as id, a.date_of_appointment as date_of_appointment, c.id as client_id, c.firstname as firstname, c.lastname as lastname, c.phonenumber as phonenumber, c.email as email
            FROM client as c JOIN appointments as a on c.id = a.client_id 
            WHERE a.doctor_id=:doctor_id
            ORDER BY a.date_of_appointment DESC;");
            $query->bindvalue(':doctor_id', $doctorId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function countAppointmentByDoctorId($doctorId){
            $query = self::instance()->prepare("SELECT count(*) as number_of_appointment FROM appointments WHERE doctor_id=:doctor_id and date_of_appointment > CURDATE();");
            $query->bindvalue(':doctor_id', $doctorId);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

    }

?>
