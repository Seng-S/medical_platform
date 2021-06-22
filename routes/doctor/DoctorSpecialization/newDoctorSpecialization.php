<?php
    require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../service/DoctorSpecializationService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['specializationId']))
    {
        $doctorSpecializationService = new DoctorSpecializationService();
        
        $specialization = $doctorSpecializationService->addDoctorSpecialization($_SESSION['doctor'], $_POST['specializationId']);
        if($specialization) {
            echo json_encode($specialization->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>