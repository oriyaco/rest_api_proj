<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/patient.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Patient($db);
    
    $item->id = isset($_POST['id']) ? $_POST['id'] : die();
    
    if($item->deletePatient()){
        echo json_encode("Patient deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
