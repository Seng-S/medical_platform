<?php
    require_once __DIR__.'/../interfaces/DoctorSpecializationManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorSpecializationManager extends AbstractPdoManager implements DoctorSpecializationManager {

        public function addDoctorSpecialization($doctorId, $specializationId){
            $query = self::instance()->prepare("
                INSERT INTO doctor_specialization (doctor_id, specialization_id)
                VALUES (:doctor_id, :specialization_id)
            ");		
            $query->bindValue(':doctor_id', $doctorId);
            $query->bindValue(':specialization_id', $specializationId);
    
            if($query->execute()) {
                $doctorSpecializationId = self::instance()->lastInsertId();
                return $doctorSpecializationId;
            }
        }

        public function getDoctorSpecializationById($id){
            $query = self::instance()->prepare('SELECT * FROM doctor_specialization WHERE (id=:id)');
            $query->bindvalue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function getSpecializationByDoctorId($doctorId){
            $query = self::instance()->prepare('SELECT ds.id as id, ds.doctor_id as doctor_id, s.specialization as specialization FROM specialization as s JOIN doctor_specialization as ds on s.id = ds.specialization_id WHERE ds.doctor_id=:doctorId;');
            $query->bindvalue(':doctorId', $doctorId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function deleteDoctorSpecialization($id){
                $query = self::instance()->prepare("
                DELETE FROM doctor_specialization WHERE id=:id
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

    }

?>