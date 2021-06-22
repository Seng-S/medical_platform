<?php
    require_once __DIR__.'/../interfaces/DoctorDetailManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorDetailManager extends AbstractPdoManager implements DoctorDetailManager {

        public function getDoctorByCriteria($criteria){
            $query = self::instance()->prepare("SELECT ds.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, s.specialization as specialization, d.phonenumber as phonenumber, d.email as email, da.address as address, da.departement as departement, da.region as region, da.postal_code as postal_code
            FROM doctor as d JOIN doctor_specialization as ds on d.id = ds.doctor_id JOIN specialization as s on ds.specialization_id = s.id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE d.firstname LIKE :criteria OR d.lastname LIKE :criteria OR s.specialization LIKE :criteria OR da.address LIKE :criteria OR da.region LIKE :criteria;");
            $query->bindvalue(':criteria', '%'.$criteria.'%');
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }
        
        public function getDoctorByRegion($region){
            $query = self::instance()->prepare("SELECT da.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, da.region as region, s.specialization as specialization, d.phonenumber as phonenumber, d.email as email, da.address as address, da.departement as departement, da.postal_code as postal_code
            FROM doctor as d JOIN doctor_specialization as ds on d.id = ds.doctor_id JOIN specialization as s on ds.specialization_id = s.id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE da.region LIKE :region;");
            $query->bindvalue(':region', '%'.$region.'%');
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function getDoctorByAddress($address){
            $query = self::instance()->prepare("SELECT da.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, da.address as address, s.specialization as specialization, d.phonenumber as phonenumber, d.email as email, da.departement as departement, da.region as region, da.postal_code as postal_code
            FROM doctor as d JOIN doctor_specialization as ds on d.id = ds.doctor_id JOIN specialization as s on ds.specialization_id = s.id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE da.address LIKE :address;");
            $query->bindvalue(':address', '%'.$address.'%');
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function getDoctorBySpecialization($specialization){
            $query = self::instance()->prepare("SELECT ds.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, s.specialization as specialization, d.phonenumber as phonenumber, d.email as email, da.address as address, da.departement as departement, da.region as region, da.postal_code as postal_code
            FROM doctor as d JOIN doctor_specialization as ds on d.id = ds.doctor_id JOIN specialization as s on ds.specialization_id = s.id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE s.specialization LIKE :specialization;");
            $query->bindvalue(':specialization', '%'.$specialization.'%');
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function getDoctorByName($criteria){
            $query = self::instance()->prepare("SELECT ds.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, s.specialization as specialization, d.phonenumber as phonenumber, d.email as email, da.address as address, da.departement as departement, da.region as region, da.postal_code as postal_code
            FROM doctor as d JOIN doctor_specialization as ds on d.id = ds.doctor_id JOIN specialization as s on ds.specialization_id = s.id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE d.firstname LIKE :criteria OR d.lastname LIKE :criteria;");
            $query->bindvalue(':criteria', '%'.$criteria.'%');
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

    }

?>