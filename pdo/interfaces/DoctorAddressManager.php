<?php

    interface DoctorAddressManager {
        public function addDoctorAddress($doctorId, $address, $departement, $region, $postalCode);
        public function getDoctorAddressById($id);
        public function getAddressByDoctorId($doctorId);
        public function updateDoctorAddress($id, $address, $departement, $region, $postalCode);
        public function deleteDoctorAddress($id);
    }

?>