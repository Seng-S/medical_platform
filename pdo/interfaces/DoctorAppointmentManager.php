<?php

    interface DoctorAppointmentManager {
        public function getDoctorAppointmentByClientId($clientId);
        public function countAppointmentByClientId($clientId);
    }

?>