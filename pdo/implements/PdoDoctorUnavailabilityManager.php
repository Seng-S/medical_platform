<?php
    require_once __DIR__.'/../interfaces/DoctorUnavailabilityManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorUnavailabilityManager extends AbstractPdoManager implements DoctorUnavailabilityManager {

        public function addDoctorUnavailability($dayId, $doctorId){
            $query = self::instance()->prepare("
                INSERT INTO doctor_unavailability (day_id, doctor_id)
                VALUES (:day_id, :doctor_id)
            ");		
            $query->bindValue(':day_id', $dayId);
            $query->bindValue(':doctor_id', $doctorId);
    
            if($query->execute()) {
                $doctorUnvailabilityId = self::instance()->lastInsertId();
                return $doctorUnvailabilityId;
            }
        }

        public function getDoctorUnavailabilityById($id){
            $query = self::instance()->prepare('SELECT * FROM doctor_unavailability WHERE (id=:id)');
            $query->bindvalue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function getUnavailabilityByDoctorId($doctorId){
            $query = self::instance()->prepare('SELECT du.id AS id, d.day AS day, du.doctor_id AS doctor_id FROM doctor_unavailability AS du JOIN days AS d ON d.id = du.day_id WHERE doctor_id=:doctor_id;');
            $query->bindvalue(':doctor_id', $doctorId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);

            return $results;
        }

        public function getUnavailabilityByDay($doctorId, $dayId){
            $query = self::instance()->prepare('SELECT du.id AS id, d.day AS day, du.doctor_id AS doctor_id FROM doctor_unavailability AS du JOIN days AS d ON d.id = du.day_id WHERE doctor_id=:doctor_id AND du.day_id=:dayId;');
            $query->bindvalue(':doctor_id', $doctorId);
            $query->bindvalue(':dayId', $dayId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);

            return $results;
        }

        public function deleteDoctorUnavailability($id){
                $query = self::instance()->prepare("
                DELETE FROM doctor_unavailability WHERE id=:id;
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

    }

?>