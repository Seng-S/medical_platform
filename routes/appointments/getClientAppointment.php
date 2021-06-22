<?php
    require_once __DIR__.'/../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../service/ClientAppointmentService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $clientAppointmentService = new ClientAppointmentService();

    $appointmentsResponse = array();    
    $appointments = $clientAppointmentService->getClientAppointmentByDoctorId($_SESSION['doctor']);
    foreach($appointments as $appointment){
        $appointmentsResponse[] = $appointment->expose();
    }
    echo json_encode($appointmentsResponse);
?>