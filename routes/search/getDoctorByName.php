<?php
    require_once __DIR__.'/../../service/DoctorDetailService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorDetailService = new DoctorDetailService();
    $criteriasResponse = array();
    $criterias = $doctorDetailService->getDoctorByName($_GET['criteria']);

    foreach($criterias as $criteria){
        $criteriasResponse[] = $criteria->expose();
    } 
    echo json_encode($criteriasResponse);
    
?>