<?php
    require_once __DIR__.'/../../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../../service/DoctorWorkingHourService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['dayId']) AND isset($_POST['startingHour']) AND isset($_POST['endingHour']))
    {
        $doctorWorkingHourService = new DoctorWorkingHourService();
        
        $workingHour = $doctorWorkingHourService->addDoctorWorkingHour($_SESSION['doctor'], $_POST['dayId'], $_POST['startingHour'], $_POST['endingHour']);
        if($workingHour) {
            echo json_encode($workingHour->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>