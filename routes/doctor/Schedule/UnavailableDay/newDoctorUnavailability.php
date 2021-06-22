<?php
    require_once __DIR__.'/../../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../../service/DoctorUnavailabilityService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['dayId']) )
    {
        $doctorUnavailabilityService = new DoctorUnavailabilityService();
        
        $unavailability = $doctorUnavailabilityService->addDoctorUnavailability($_POST['dayId'], $_SESSION['doctor']);
        if($unavailability) {
            echo json_encode($unavailability->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>