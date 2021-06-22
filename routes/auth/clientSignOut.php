<?php 
    session_start();
    session_destroy();
    $response = new stdClass();

    header('Location: http://localhost/medical_platform/index.php');
    exit();
?>