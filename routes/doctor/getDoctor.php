<?php
    require_once __DIR__.'/../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../service/DoctorService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorService = new DoctorService();

        
    $doctor = $doctorService->getDoctorById($_SESSION['doctor']);
    
    echo json_encode($doctor->expose());
?>