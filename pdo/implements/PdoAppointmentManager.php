<?php
    require_once __DIR__.'/../interfaces/AppointmentManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoAppointmentManager extends AbstractPdoManager implements AppointmentManager {

        public function addAppointment($dateOfAppointment, $clientId, $doctorId){
            $query = self::instance()->prepare("
                INSERT INTO appointments (date_of_appointment ,client_id , doctor_id)
                VALUES (:date_of_appointment, :client_id, :doctor_id)
            ");	
            $query->bindValue(':date_of_appointment', $dateOfAppointment);	
            $query->bindValue(':client_id', $clientId);
            $query->bindValue(':doctor_id', $doctorId);
    
            if($query->execute()) {
                $appointmentId = self::instance()->lastInsertId();
                return $appointmentId;
            }
        }

        public function getAppointmentById($id){
            $query = self::instance()->prepare('SELECT * FROM appointments WHERE (id=:id)');
            $query->bindvalue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function deleteAppointmentByClientId($id){
                $query = self::instance()->prepare("
                DELETE FROM appointments WHERE id=:id;
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function getAppointmentByDoctorIdAndDate($doctorId, $dateOfAppointment) {
            $query = self::instance()->prepare('SELECT * FROM appointments WHERE doctor_id=:doctorId AND DATE(date_of_appointment)=:dateOfAppointment');
            $query->bindvalue(':doctorId', $doctorId);
            $query->bindValue(':dateOfAppointment', $dateOfAppointment);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);

            return $results;
        }

        public function deleteAppointmentByDoctorId($id){
            $query = self::instance()->prepare("
                DELETE FROM appointments WHERE id=:id;
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

    }

?>