<?php
    require_once __DIR__.'/../../filter/clientAuthenticateFilter.php';
    require_once __DIR__.'/../../service/ClientService.php';

    $error = new stdClass();

    header('Content-Type: application/json');
    $clientService = new ClientService();

        
    $client = $clientService->getClientById($_SESSION['client']);
    
    echo json_encode($client->expose());
?>