<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/patient.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Patient($db);
    $stmt = $items->getPatients();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $patientArr = array();
        $patientArr["body"] = array();
        $patientArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "name" => $name,
                "id" => $id,
				"address" => $address,
				"birth_date" => $birth_date,
                "phone" => $phone,
                "mobile" => $mobile,
                "vaccine_1" => $vaccine_1,
                "vaccine_2" => $vaccine_2,
				"vaccine_3" => $vaccine_3,
                "vaccine_4" => $vaccine_4,
				"vaccine_1_comp" => $vaccine_1_comp,
				"vaccine_2_comp" => $vaccine_2_comp,
                "vaccine_3_comp" => $vaccine_3_comp,
                "vaccine_4_comp" => $vaccine_4_comp,
                "positive_date" => $positive_date,
                "negative_date" => $negative_date
            );
            array_push($patientArr["body"], $e);
        }
        echo json_encode($patientArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
