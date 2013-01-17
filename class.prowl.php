<?php

		function prowl($apikey, $application, $event, $description, $priority, $event_url) {
		
			$api_url = "https://api.prowlapp.com/publicapi/add";
			$data = "apikey=". urlencode($apikey) . "&priority=" . urlencode($priority) . "&application=" . urlencode($application) . "&event=" . urlencode($event) . "&description=" . urlencode($description) . "&url=" . urlencode($event_url) ;
			$ch = curl_init($api_url);
					
			//curl_setopt($ch, CURLOPT_USERPWD, $this->username .":". $this->password);
			//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		
			$return = curl_exec($ch);
			
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close($ch);
			
			# Invalid username/password
			if($httpcode == "401"):
				
			return array("success" => "y",
						"error" => $httpcode . "",
						"error_code" => "",
						"url" => $api_url,
						"data" => $data);
				
			# No application/event defined
			elseif($httpcode == "400"):
			
			return array("success" => "y",
						"error" => $httpcode . "",
						"error_code" => "",
						"url" => $api_url,
						"data" => $data);
			
			# All ok!
			endif;			

			return array("success" => "y",
						"error" => $httpcode . "",
						"error_code" => "",
						"url" => $api_url,
						"data" => $data);
		}
	
?>