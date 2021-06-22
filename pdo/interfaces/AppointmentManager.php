<?php

    interface AppointmentManager {
        public function addAppointment($dateOfAppointment, $clientId, $doctorId);
        public function getAppointmentById($id);
        public function deleteAppointmentByClientId($id);
        public function deleteAppointmentByDoctorId($id);
        public function getAppointmentByDoctorIdAndDate($doctorId, $dateOfAppointment);
    }

?>