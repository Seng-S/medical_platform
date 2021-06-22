<?php

    session_start();

    require_once '../../service/DoctorService.php';

    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['email']) AND isset($_POST['password'])) 
    {
        
        $doctorService = new DoctorService();
        $doctor = $doctorService->authenticate($_POST['email'], $_POST['password']);
        
        if($doctor) {
            $_SESSION['doctor'] = $doctor->getId();
            $_SESSION['logged_in'] = true;

            echo json_encode($doctor->expose());
        }
        else {
            http_response_code(401);
            $error = new stdClass();
            $error->credentialInvalid = true;
            $jsonresponse = json_encode($error);

            echo $jsonresponse;            
        }
    }
    else {
        http_response_code(401);
        $error->missingInfos = true;
        $jsonresponse = json_encode($error);
        echo $jsonresponse;
    }
?>