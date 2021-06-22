<?php

    session_start();

    require_once '../../service/DoctorService.php';
        
    $regex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/';
    $passwordRegex = '/^[a-zA-Z0-9_-]{6,20}$/';
    $wrongPassword = false;
    $emailInvalid = false;
    $emailExist = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['date_of_birth']) AND isset($_POST['phonenumber']) AND isset($_POST['email']) AND isset($_POST['password'])) 
    {
        $doctorService = new DoctorService();
        $theEmail = strtolower($_POST['email']); 
        $thePhonenumber = strtolower($_POST['phonenumber']);
        if(preg_match($regex, $theEmail) == false) {
            $emailInvalid = true;    
        }
        if($doctorService->checkEmail($theEmail) == false) {
            $emailExist = true;
        }
        if(preg_match($passwordRegex, $_POST['password']) == false) {
            $wrongPassword = true;
        }

        if($wrongPassword == false && $emailExist == false && $emailInvalid == false) {
            $doctor = $doctorService->signUp($_POST['firstname'], $_POST['lastname'], $_POST['date_of_birth'], $_POST['phonenumber'], $_POST['email'], $_POST['password']);
            if($doctor) {
                $_SESSION['doctor'] = $doctor->getId();
                $_SESSION['logged_in'] = true;
                echo json_encode($doctor->expose());
            }
        }
        else {
            http_response_code(400);
            $error = new stdClass();
            $error->wrongPassword = $wrongPassword;
            $error->emailExist = $emailExist;
            $error->emailInvalid = $emailInvalid;
            
            $jsonresponse = json_encode($error);

            echo $jsonresponse;                
        }
    } else {
        http_response_code(400);
        $error->missingInfos = true;
        $jsonresponse = json_encode($error);
        echo $jsonresponse; 
    }

?>