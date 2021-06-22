<?php
    require_once __DIR__.'/../../service/DoctorDetailService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorDetailService = new DoctorDetailService();
    $addressesResponse = array();
    $addresses = $doctorDetailService->getDoctorByAddress($_GET['address']);

    foreach($addresses as $address){
        $addressesResponse[] = $address->expose();
    } 
    echo json_encode($addressesResponse);
    
?>