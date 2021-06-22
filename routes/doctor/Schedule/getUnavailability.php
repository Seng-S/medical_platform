<?php
    require_once __DIR__.'/../../../service/DoctorUnavailabilityService.php';
    require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';

    $error = new stdClass();

    header('Content-Type: application/json');

    $doctorUnavailabiltyService = new DoctorUnavailabilityService();
    $unavailabilitiesResponse = array();

    $unavailabilities = $doctorUnavailabiltyService->getUnavailabilityByDoctorId($_SESSION['doctor']);
    
    foreach($unavailabilities as $unavailability){
        $unavailabilitiesResponse[] = $unavailability->expose();
    }
    echo json_encode($unavailabilitiesResponse);
?>