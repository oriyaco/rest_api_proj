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
    
    // employee values
    $item->name = $_POST['name'];
	$item->id = $_POST['id'];
	$item->address = $_POST['address'];
	$item->birth_date = $_POST['birth_date'];
	$item->phone = $_POST['phone'];
	$item->mobile = $_POST['mobile'];
	$item->vaccine_1 = $_POST['vaccine_1'];
	$item->vaccine_2 = $_POST['vaccine_2'];
	$item->vaccine_3 = $_POST['vaccine_3'];
	$item->vaccine_4 = $_POST['vaccine_4'];
	$item->vaccine_1_comp = $_POST['vaccine_1_comp'];
	$item->vaccine_2_comp = $_POST['vaccine_2_comp'];
	$item->vaccine_3_comp = $_POST['vaccine_3_comp'];
	$item->vaccine_4_comp = $_POST['vaccine_4_comp'];
	$item->positive_date = $_POST['positive_date'];
	$item->negative_date = $_POST['negative_date'];
    
    if($item->updatePatient()){
        echo json_encode("Patient data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
