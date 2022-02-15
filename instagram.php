<?php
error_reporting(0);
header("content-type: application/json; charset= UTF-8");
$action = strtolower($_GET['action']);
function Instagram($action, $data = []){
	$data['action'] = $action;
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
	echo Instagram($action, ['username' => $_GET['username']]); exit();
}elseif($action == "profile"){
	# Get Page Profile Information:
	echo Instagram($action, ['username' => $_GET['username']]); exit();
}elseif($action == "storie"){
	# Download Page Stories:
	echo Instagram($action, ['username' => $_GET['username']]); exit();
}elseif($action == "highlight"){
	# Download Page Highlights:
	echo Instagram($action, ['link' => $_GET['link']]); exit();
}elseif($action == "post"){
	# Download Page Posts:
	echo Instagram($action, ['link' => $_GET['link']]); exit();
}elseif($action == "lastpost"){
	# Download Page Last Posts:
	echo Instagram($action, ['username' => $_GET['username']]); exit();
}else{
	echo json_encode(['ok' => false, 'status' => "action not found."]);
}
unlink("error_log");
?>
