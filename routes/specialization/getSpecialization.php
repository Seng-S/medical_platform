<?php
    require_once __DIR__.'/../../service/SpecializationService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $specializationService = new SpecializationService();

    $specializationsResponse = array();    
    $specializations = $specializationService->getSpecializations();
    foreach($specializations as $specialization){
        $specializationsResponse[] = $specialization->expose();
    }
    echo json_encode($specializationsResponse);
?>