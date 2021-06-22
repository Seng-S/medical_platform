<?php
    require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
    require_once __DIR__.'/../../../service/DoctorAddressService.php';

    $invaliduserid = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['address']) AND isset($_POST['departement']) AND isset($_POST['region']) AND isset($_POST['postalCode']))
    {
        $doctorAddressService = new DoctorAddressService();
        
        $address = $doctorAddressService->addDoctorAddress( $_SESSION['doctor'], $_POST['address'], $_POST['departement'], $_POST['region'], $_POST['postalCode']);
        if($address) {
            echo json_encode($address->expose());
        }
    }
    else {
        $error->missinginfo = true;
        http_response_code(400);
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }
?>