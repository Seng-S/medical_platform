<?php
    require_once __DIR__.'/../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../service/ClientAppointmentService.php';

    header('Content-Type: application/json');
    $clientAppointmentService = new ClientAppointmentService();

    $appointmentCounts = $clientAppointmentService->countAppointmentByDoctorId($_SESSION['doctor']);
    echo json_encode($appointmentCounts);
?>