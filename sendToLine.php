<?php
send_notify_curl($message, $token);

function send_notify_curl($message, $token) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://notify-api.line.me/api/notify",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => http_build_query(array("message" => $message),'','&'),
	  CURLOPT_HTTPHEADER => array(
		  "Authorization: Bearer $token",
		  "Content-Type: application/x-www-form-urlencoded"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return $response;
	}
}