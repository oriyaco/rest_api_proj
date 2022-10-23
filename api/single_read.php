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
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSinglePatient();
    if($item->name != null){
        // create array
        $emp_arr = array(
            "name" => $item->name,
            "id" =>  $item->id,
			"address" => $item->address,
			"birth_date" => $item->birth_date,
			"phone" => $item->phone,
			"mobile" => $item->mobile,
			"vaccine_1" => $item->vaccine_1,
			"vaccine_2" => $item->vaccine_2,
			"vaccine_3" => $item->vaccine_3,
			"vaccine_4" => $item->vaccine_4,
			"vaccine_1_comp" => $item->vaccine_1_comp,
			"vaccine_2_comp" => $item->vaccine_2_comp,
			"vaccine_3_comp" => $item->vaccine_3_comp,
			"vaccine_4_comp" => $item->vaccine_4_comp,
			"positive_date" => $item->positive_date,
			"negative_date" => $item->negative_date
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Patient not found.");
    }
