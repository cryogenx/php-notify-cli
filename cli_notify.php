<?php

// Load cli-Notify modules
include('config.php');

// command syntax:
// type, prowlkey, nmakey, appname, eventtitle, eventdesc, priority, url

//Check for proper args from command line:
	if(isset($argv[1])) {
		// Notification type from command line
		// 1 = Prowl notification (ios)
		// 2 = NMA Notification (droid)
		// 3 = Both (requires both api keys on command line or in config.php)
		$notify_type = $argv[1];
	}

//
// Check API Key Values
//
	if(isset($argv[2]) && ($argv[2] != "")) {
		// Prowl api_key from command line, overrides hardcoded API key with on from command line
		$prowl_api_key = $argv[2]; 
	} else if (isset($cfg_prowl_api)){
		$prowl_api_key = $cfg_prowl_api;
	} else {
		$prowl_api_key='111';
	}
	if(isset($argv[3]) && ($argv[3] != "")) {
		// NMA api_key from command line, overrides hardcoded API key with on from command line
		$nma_api_key = $argv[3]; 
	} else if (isset($cfg_nma_api)){
		$nma_api_key = $cfg_nma_api;
	} else {
		$nma_api_key='111';
	}
//
// Application Name (optional)
//
	if(isset($argv[4])) {
		$app_name = $argv[4];
	} else {
		$app_name = "php-notify-cli";
	}
	
//
// Event Name (required)
//
	if(isset($argv[5])) {
		$event_name = $argv[5];
	} else {
		$result = 	array("success" => "n",
							"error" => "No Event Title Set",
							"error_code" => "");
	}
	
//
// Event Description (optional)
//
	if(isset($argv[6])) {
		$event_desc = $argv[6];
	} else {
		$event_desc = "No Event Details";
	}
//
// Priority (optional) defaults to 'normal' priority (0) check to see if it is valid (-2 thru 2) only
//
	if(isset($argv[7]) && (-2 <= $argv[7]) && ($argv[7] <= 2)) {
		$priority = $argv[7];
	} else {
		$priority = "0";
	}
	
//
// Url redirect (optional)
//
	if(isset($argv[8])) {
		$url = $argv[8];
	}
	
//
// Create Notifications
//

include('class.nma.php');
include('class.prowl.php');

if ($notify_type == 1){
	$prowl = prowl("$prowl_api_key","$app_name","$event_name","$event_desc","$priority","$url");
} else if($notify_type == 2){
	$nma = nma("$nma_api_key","$app_name","$event_name","$event_desc","$priority","$url");
} else if($notify_type == 3) {
	$prowl = prowl("$prowl_api_key","$app_name","$event_name","$event_desc","$priority","$url");
	$nma = nma("$nma_api_key","$app_name","$event_name","$event_desc","$priority","$url");

}

	print "<pre>";
	if (isset($prowl)){
		print_r($prowl);
	}
	if (isset($nma)){
		print_r($nma);
	}
	if (isset($result)){
		print_r($result);
	}
	print "</pre>";