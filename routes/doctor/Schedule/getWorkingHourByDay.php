<?php
    require_once __DIR__.'/../../../service/DoctorWorkingHourService.php';
    
    $error = new stdClass();

    header('Content-Type: application/json');

    $workingHoursResponse = array();
    $doctorWorkingHourService = new DoctorWorkingHourService();
    $doctorId=0;
    if(isset($_GET['doctorId'])) {
        $doctorId = $_GET['doctorId'];
    }
    else {
        require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
        $doctorId = $_SESSION['doctor'];
    }

    $workingHours = $doctorWorkingHourService->getWorkingHourByDay($doctorId, $_GET['dayId']);
    
    foreach($workingHours as $workingHour){
        $workingHoursResponse[] = $workingHour->expose();
    }
        
    echo json_encode($workingHoursResponse);
    
?>