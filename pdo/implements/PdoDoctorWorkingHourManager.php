<?php
    require_once __DIR__.'/../interfaces/DoctorWorkingHourManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorWorkingHourManager extends AbstractPdoManager implements DoctorWorkingHourManager {

        public function addDoctorWorkingHour($doctorId, $dayId, $startingHour, $endingHour){
            $query = self::instance()->prepare("
                INSERT INTO doctor_working_hour (doctor_id, day_id, starting_hour, ending_hour)
                VALUES (:doctor_id, :day_id, :starting_hour, :ending_hour)
            ");	
            $query->bindValue(':doctor_id', $doctorId);	
            $query->bindValue(':day_id', $dayId);
            $query->bindValue(':starting_hour', $startingHour);
            $query->bindValue(':ending_hour', $endingHour);
    
            if($query->execute()) {
                $doctorWorkingHourId = self::instance()->lastInsertId();
                return $doctorWorkingHourId;
            }
        }

        public function getDoctorWorkingHourById($id){
            $query = self::instance()->prepare('SELECT * FROM doctor_working_hour WHERE (id=:id)');
            $query->bindvalue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function getWorkingHourByDay($doctorId, $dayId){
            $query = self::instance()->prepare('SELECT * FROM doctor_working_hour WHERE doctor_id=:doctor_id AND day_id=:day_id;');
            $query->bindvalue(':doctor_id', $doctorId);
            $query->bindvalue(':day_id', $dayId);
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function updateDoctorWorkingHour($id, $dayId, $startingHour, $endingHour){
            $query = self::instance()->prepare("
                UPDATE doctor_working_hour SET day_id=:day_id, starting_hour=:starting_hour, ending_hour=:ending_hour WHERE id=:id;
            ");
            $query->bindValue(':id', $id);
            $query->bindValue(':day_id', $dayId);
            $query->bindValue(':starting_hour', $startingHour);
            $query->bindValue(':ending_hour', $endingHour);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function deleteDoctorWorkingHour($id){
                $query = self::instance()->prepare("
                DELETE FROM doctor_working_hour WHERE id=:id;
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

    }

?>