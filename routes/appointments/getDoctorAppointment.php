<?php
    require_once __DIR__.'/../../filter/clientAuthenticateFilter.php';
    require_once __DIR__.'/../../service/DoctorAppointmentService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorAppointmentService = new DoctorAppointmentService();

    $appointmentsResponse = array();    
    $appointments = $doctorAppointmentService->getDoctorAppointmentByClientId($_SESSION['client']);
    foreach($appointments as $appointment){
        $appointmentsResponse[] = $appointment->expose();
    }
    echo json_encode($appointmentsResponse);
?>