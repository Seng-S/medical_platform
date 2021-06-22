<?php

    interface DoctorSpecializationManager {
        public function addDoctorSpecialization($doctorId, $specializationId);
        public function getDoctorSpecializationById($id);
        public function getSpecializationByDoctorId($doctorId);
        public function deleteDoctorSpecialization($id);
    }

?>