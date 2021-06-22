<?php
    require_once __DIR__.'/../../../service/DoctorAddressService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $doctorAddressService = new DoctorAddressService();
    $addressesResponse = array();
    
    if(isset($_GET['doctorId']))
    {
        $addresses = $doctorAddressService->getAddressByDoctorId($_GET['doctorId']);
    
        echo json_encode($adresses->expose());
    }
    else {
        require_once __DIR__.'/../../../filter/doctorAuthenticateFilter.php';
        $addresses = $doctorAddressService->getAddressByDoctorId($_SESSION['doctor']);
        
        foreach($addresses as $address){
            $addressesResponse[] = $address->expose();
        }
        echo json_encode($addressesResponse);
    }
?>