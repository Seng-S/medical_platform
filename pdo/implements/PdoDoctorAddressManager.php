<?php
    require_once __DIR__.'/../interfaces/DoctorAddressManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorAddressManager extends AbstractPdoManager implements DoctorAddressManager {

        public function addDoctorAddress($doctorId, $address, $departement, $region, $postalCode){
            $query = self::instance()->prepare("
                INSERT INTO doctor_address (doctor_id, address, departement, region, postal_code)
                VALUES (:doctor_id, :address, :departement, :region, :postal_code)
            ");		
            $query->bindValue(':doctor_id', $doctorId);
            $query->bindValue(':address', $address);
            $query->bindValue(':departement', $departement);
            $query->bindValue(':region', $region);
            $query->bindValue(':postal_code', $postalCode);
    
            if($query->execute()) {
                $doctorAddressId = self::instance()->lastInsertId();
                return $doctorAddressId;
            }
        }

        public function getDoctorAddressById($id){
            $query = self::instance()->prepare('SELECT * FROM doctor_address WHERE (id=:id)');
            $query->bindvalue(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function getAddressByDoctorId($doctorId){
            $query = self::instance()->prepare('SELECT * FROM doctor_address WHERE (doctor_id=:doctor_id)');
            $query->bindvalue(':doctor_id', $doctorId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function updateDoctorAddress($id, $address, $departement, $region, $postalCode){
            $query = self::instance()->prepare("
                UPDATE doctor_address SET address=:address, departement=:departement, region=:region, postal_code=:postal_code WHERE id=:id;
            ");
            $query->bindValue(':id', $id);
            $query->bindValue(':address', $address);
            $query->bindValue(':departement', $departement);
            $query->bindValue(':region', $region);
            $query->bindValue(':postal_code', $postalCode);

            if($query->execute()) {
                return true;
            }
            return false;
        }

        public function deleteDoctorAddress($id){
                $query = self::instance()->prepare("
                DELETE FROM doctor_address WHERE id=:id;
            ");
            $query->bindValue(':id', $id);

            if($query->execute()) {
                return true;
            }
            return false;
        }

    }

?>