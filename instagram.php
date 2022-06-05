<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$action = strtolower($_GET['action']);
define('ACCESS_KEY', "API-ACCESS-TOKEN"); # Get from: T.me/APIManager_Bot?start=api-instagram
function Instagram($action, $data = []){
	$data['action'] = $action;
	$data['accessKey'] = ACCESS_KEY;
	$cURL = curl_init();
	curl_setopt($cURL, CURLOPT_URL, "https://api.ineo-team.ir/instagram.php?".http_build_query($data));
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_CONNECTTIMEOUT, 7);
	$Result = curl_exec($cURL);
	curl_close($cURL);
	return $Result;
}

if($action == "getid"){
	# Get Page User ID:
	echo Instagram($action, ['username' => $_GET['username']]);
}elseif($action == "profile"){
	# Get Page Profile Information:
	echo Instagram($action, ['username' => $_GET['username']]);
}elseif($action == "storie"){
	# Download Page Stories:
	echo Instagram($action, ['username' => $_GET['username']]);
}elseif($action == "highlight"){
	# Download Page Highlights:
	echo Instagram($action, ['link' => $_GET['link']]);
}elseif($action == "post"){
	# Download Page Posts:
	echo Instagram($action, ['link' => $_GET['link']]);
}elseif($action == "lastpost"){
	# Download Page Last Posts:
	echo Instagram($action, ['username' => $_GET['username']]);
}else{
	echo json_encode(['ok' => false, 'status' => "action not found."]);
}
unlink("error_log");
?>
