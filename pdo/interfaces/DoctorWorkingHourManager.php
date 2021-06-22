<?php

    interface DoctorWorkingHourManager {
        public function addDoctorWorkingHour($doctorId, $dayId, $startingHour, $endingHour);
        public function getDoctorWorkingHourById($id);
        public function getWorkingHourByDay($doctorId, $dayId);
        public function updateDoctorWorkingHour($id, $dayId, $startingHour, $endingHour);
        public function deleteDoctorWorkingHour($id);
    }

?>