<?php
        //REST Functions
		//function used to do a basic OAuth with the REST WS
		//@return : PHP array representing the JSON response
		function OAuth_rest($endpoint, $postData, $clientID, $clientSecret){
			$curl = curl_init($endpoint);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_USERPWD, $clientID . ":" . $clientSecret);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
			# curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
			$response = curl_exec( $curl );
			if (empty($response)) {
				die(curl_error($curl));
				curl_close($curl);
			} else {
				$info = curl_getinfo($curl);
				//echo "Time took: " . $info['total_time']*1000 . "ms\n";
				curl_close($curl); // close cURL handler
				if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
					echo "Received error: " . $info['http_code']. "\n";
					echo "Raw response:".$response."\n";
					die();
				}
			}
            
            //echo $response;
            
			// Convert the result from JSON format to a PHP array
			$jsonResponse = json_decode($response, true);
			return $jsonResponse;
		}
        
  
        /**
        * REST_make_post_call
        * @return : PHP array representing the JSON response
        **/
		function REST_make_post_call($url, $postdata, $token, $headers = Array()) {
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
/*			curl_setopt($curl, CURLOPT_HTTPHEADER, 
				array(
					'Authorization: Bearer '.$token,
					'Accept: application/json',
					'Content-Type: application/json'
				)
			);*/
            $headers = array_merge(Array(
					'Authorization' => 'Bearer '.$token,
					'Accept' => 'application/json',
					'Content-Type' => 'application/json'
            ), $headers);
            $finalHeaders = Array();
            foreach ($headers as $key => $value) {
                $finalHeaders []= $key . ': ' . $value;
            }
			curl_setopt($curl, CURLOPT_HTTPHEADER, $finalHeaders);


			curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
			#curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
			$response = curl_exec( $curl );
            
			if (empty($response)) {
				die(curl_error($curl));
				curl_close($curl);
			} else {
				$info = curl_getinfo($curl);
				//echo "Time took: " . $info['total_time']*1000 . "ms\n";
				curl_close($curl); // close cURL handler
				if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
					echo "Received error: " . $info['http_code']. "\n";
					echo "Raw response:".$response."\n";
					die();
				}
			} 
            
			// Convert the result from JSON format to a PHP array
			$jsonResponse = json_decode($response, TRUE);
            return $jsonResponse;
		 }


        /**
        * Execute_Payment
        * @return : PHP array representing the JSON response
        **/
		function ExecutePayment($url, $token, $postdata) {
            
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HEADER, false); //if you turn it into "true" the json_decode conversion wont work!
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, 
				array(
					'Content-Type: application/json',
                    'Authorization: Bearer '.$token						
				)
			);

			curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
			#curl_setopt($curl, CURLOPT_VERBOSE, TRUE);
			$response = curl_exec( $curl );
            
			if (empty($response)) {
				die(curl_error($curl));
				curl_close($curl);
			} else {
                $info = curl_getinfo($curl);
				//echo "Time took: " . $info['total_time']*1000 . "ms\n";
				curl_close($curl);
				if($info['http_code'] != 200 && $info['http_code'] != 201 ) {
					//echo "Received error: " . $info['http_code']. "<br>";
                    echo $response;
					die();
				}
			} 
            
            //echo "Raw response:<br>".$response."<hr>";
            
			// Convert the result from JSON format to a PHP array
			$jsonResponse = json_decode($response, true);
            return $jsonResponse;
		 }
?>