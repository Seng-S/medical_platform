<?php
    require_once __DIR__.'/../../service/DoctorDetailService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorDetailService = new DoctorDetailService();
    $specializationsResponse = array();
    $specializations = $doctorDetailService->getDoctorBySpecialization($_GET['specialization']);

    foreach($specializations as $specialization){
        $specializationsResponse[] = $specialization->expose();
    } 
    echo json_encode($specializationsResponse);
    
?>