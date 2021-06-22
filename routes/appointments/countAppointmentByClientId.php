<?php
    require_once __DIR__.'/../../filter/clientAuthenticateFilter.php';
    require_once __DIR__.'/../../service/DoctorAppointmentService.php';

    header('Content-Type: application/json');
    $doctorAppointmentService = new DoctorAppointmentService();

    $appointmentCounts = $doctorAppointmentService->countAppointmentByClientId($_SESSION['client']);
    echo json_encode($appointmentCounts);
?>