<?php
    require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../service/DoctorAddressService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['id']))
    {
        $doctorAddressService = new DoctorAddressService();
        
        $isDeleted = $doctorAddressService->deleteDoctorAddress($_POST['id'], $_SESSION['doctor']);
        
        if(property_exists($isDeleted, "hasError")) {
            http_response_code(403);
            echo json_encode($isDeleted);
            $response = new stdClass();
            $response->id = $_POST['id'];
            $response->isDeleted = true;
            $jsonresponse = json_encode($response);
            echo $jsonresponse; 
        }else {
            echo json_encode($isDeleted);
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>