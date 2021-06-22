<?php
    require_once __DIR__.'/../../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../../service/DoctorWorkingHourService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['id']) AND isset($_POST['dayId']) AND isset($_POST['startingHour']) AND isset($_POST['endingHour']))
    {
        $doctorWorkingHourService = new DoctorWorkingHourService();
        
        $updateWorkingHour = $doctorWorkingHourService->updateDoctorWorkingHour($_POST['id'], $_SESSION['doctor'], $_POST['dayId'], $_POST['startingHour'], $_POST['endingHour']);
        
        if(property_exists($updateWorkingHour, "hasError")) {
            http_response_code(403);
            echo json_encode($updateWorkingHour);
        }else {
            echo json_encode($updateWorkingHour->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>