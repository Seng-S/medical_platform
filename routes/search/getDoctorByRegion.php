<?php
    require_once __DIR__.'/../../service/DoctorDetailService.php';

    $error = new stdClass();

    header('Content-Type: application/json');

    $doctorDetailService = new DoctorDetailService();

    $regionsResponse = array();
    $regions = $doctorDetailService->getDoctorByRegion($_GET['region']);
    foreach($regions as $region){
        $regionsResponse[] = $region->expose();
    } 
    echo json_encode($regionsResponse);
    
?>