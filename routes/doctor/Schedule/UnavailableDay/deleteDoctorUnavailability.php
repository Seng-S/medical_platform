<?php
    require_once __DIR__.'/../../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../../service/DoctorUnavailabilityService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['id']))
    {
        $doctorUnavailabilityService = new DoctorUnavailabilityService();
        
        $isDeleted = $doctorUnavailabilityService->deleteDoctorUnavailability($_POST['id'], $_SESSION['doctor']);
        
        if(property_exists($isDeleted, "hasError")) {
            http_response_code(403);
            echo json_encode($isDeleted);
        }else {
            echo json_encode($isDeleted);
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>