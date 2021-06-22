<?php

    interface DoctorUnavailabilityManager {
        public function addDoctorUnavailability($dayId, $doctorId);
        public function getDoctorUnavailabilityById($id);
        public function getUnavailabilityByDoctorId($doctorId);
        public function deleteDoctorUnavailability($id);
        public function getUnavailabilityByDay($doctorId, $dayId);
    }

?>