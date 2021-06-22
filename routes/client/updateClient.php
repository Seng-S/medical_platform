<?php
    require_once __DIR__.'/../../filter/clientAuthenticateFilter.php';
    require_once __DIR__.'/../../service/ClientService.php';

    $invaliduserid = false;
    $error = new stdClass();
        
    $regex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/';
    $passwordRegex = '/^[a-zA-Z0-9_-]{6,20}$/';
    $wrongPassword = false;
    $emailInvalid = false;
    $emailExist = false;
    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['date_of_birth']) AND isset($_POST['phonenumber']) AND isset($_POST['email']) AND isset($_POST['password'])) 
    {
        $clientService = new ClientService();

        $theEmail = strtolower($_POST['email']); 
        $thePhonenumber = strtolower($_POST['phonenumber']);
        if(preg_match($regex, $theEmail) == false) {
            $emailInvalid = true;    
        }
        if($clientService->verifyEmailBelongToOtherClient($_SESSION['client'], $theEmail) == false) {
            $emailExist = true;
        }
        if(preg_match($passwordRegex, $_POST['password']) == false) {
            $wrongPassword = true;
        }

        if($wrongPassword == false && $emailExist == false && $emailInvalid == false) {
            
            $updateClient = $clientService->updateClient($_SESSION['client'], $_POST['firstname'], $_POST['lastname'], $_POST['date_of_birth'], $_POST['phonenumber'], $_POST['email'], $_POST['password']);
            
            if(property_exists($updateClient, "hasError")) {
                http_response_code(403);
                echo json_encode($updateClient);
            }
            else {
                echo json_encode($updateClient->expose());
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