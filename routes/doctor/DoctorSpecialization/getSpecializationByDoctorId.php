<?php
    require_once __DIR__.'/../../../service/DoctorSpecializationService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    
    $doctorSpecializationService = new DoctorSpecializationService();
    $specializationsResponse = array();
    if(isset($_GET['doctorId']))
    {
        $specializations = $doctorSpecializationService->getSpecializationByDoctorId($_GET['doctorId']);
        
        echo json_encode($specializations->expose());
    }
    else {

        require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
        $specializations = $doctorSpecializationService->getSpecializationByDoctorId($_SESSION['doctor']);
        
        foreach($specializations as $specialization){
            $specializationsResponse[] = $specialization->expose();
        }
        echo json_encode($specializationsResponse);
    }
    
?>