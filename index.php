<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method=="POST"){
	$requestBody=file_get_contents('php://input');
	$json=json_decode($requestBody);
	$text=$json->queryResult->queryText;
	$flavor=$json->queryResult->parameters->flavor;
	$response=new \stdClass();



	$rec=json_decode(file_get_contents('https://drive.google.com/open?id=1YquiPk5Nmab_dkxyluvTXi03Mag0PLCC'));

	switch ($flavor) {
		case "fruits":
			$response->speech="I would like you to try ".$rec->fruits;
			break;
		case "chocolate":
			$response->speech="I would like you to try ".$rec->chocolate;
			break;
		default:
			$speech="Try oreo";
			break;
	}


	
	$response->source="webhook";
	echo json_encode($response);
}else{
	echo "method not allowed";
}

?>
