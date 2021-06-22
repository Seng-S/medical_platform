<?php
    require_once __DIR__.'/../../filter/clientAuthenticateFilter.php';
    require_once __DIR__.'/../../service/AppointmentService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['appointmentDate']) AND isset($_POST['appointmentTime']) AND isset($_POST['doctorId']))
    {
        $appointmentService = new AppointmentService();
        $dateOfAppointment = $_POST['appointmentDate']." ".$_POST['appointmentTime'];
        $appointment = $appointmentService->addAppointment($dateOfAppointment, $_SESSION['client'], $_POST['doctorId']);
        if($appointment) {
            echo json_encode($appointment->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>