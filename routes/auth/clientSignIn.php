<?php

    session_start();

    require_once '../../service/ClientService.php';

    $error = new stdClass();

    header('Content-Type: application/json');

    if(isset($_POST['email']) AND isset($_POST['password'])) 
    {
        
        $clientService = new ClientService();
        $client = $clientService->authenticate($_POST['email'], $_POST['password']);
        
        if($client) {
            $_SESSION['client'] = $client->getId();
            $_SESSION['logged_in'] = true;

            echo json_encode($client->expose());
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