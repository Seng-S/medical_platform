<?php
    require_once __DIR__.'/../interfaces/DoctorAppointmentManager.php';
    require_once 'AbstractPdoManager.php';

    class PdoDoctorAppointmentManager extends AbstractPdoManager implements DoctorAppointmentManager {

        public function getDoctorAppointmentByClientId($clientId){
            $query = self::instance()->prepare("SELECT a.id as id, a.date_of_appointment as date_of_appointment, a.doctor_id as doctor_id, d.firstname as firstname, d.lastname as lastname, d.phonenumber as phonenumber, d.email as email, da.address as address, da.departement as departement, da.region as region, da.postal_code as postal_code
            FROM doctor as d JOIN appointments as a on d.id = a.doctor_id JOIN doctor_address as da on d.id = da.doctor_id
            WHERE a.client_id=:client_id
            ORDER BY a.date_of_appointment DESC;");
            $query->bindvalue(':client_id', $clientId);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function countAppointmentByClientId($clientId){
            $query = self::instance()->prepare("SELECT count(*) as number_of_appointment FROM appointments WHERE client_id=:client_id and date_of_appointment > CURDATE();");
            $query->bindvalue(':client_id', $clientId);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result;
        }

    }

?>