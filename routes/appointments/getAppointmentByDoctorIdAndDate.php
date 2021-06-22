<?php
    require_once __DIR__.'/../../service/AppointmentService.php';
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_GET['doctorId']) AND isset($_GET['date']))
    {
        $appointmentService = new AppointmentService();

        $appointmentsResponse = array();  
        $appointments = $appointmentService->getAppointmentByDoctorIdAndDate($_GET['doctorId'], $_GET['date']);
        foreach($appointments as $appointment) {
            $appointmentsResponse[] = $appointment->expose();
        }
        echo json_encode($appointmentsResponse);
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>