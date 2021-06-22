<?php

    interface ClientAppointmentManager {
        public function getClientAppointmentByDoctorId($doctorId);
        public function countAppointmentByDoctorId($doctorId);
    }
    
?>