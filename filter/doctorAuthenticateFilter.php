<?php
    session_start();

    if(!isset($_SESSION['doctor'])) {
        $response = new stdClass();
        $response->unauthenticated = true;
        header('Content-Type: application/json');
        http_response_code(401);
        $jsonresponse = json_encode($response);
        echo $jsonresponse;

        exit();
    }

?>