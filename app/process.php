<?php
/*
  * Why in the fuck does this file exist? I created a damn good API so that we wouldn't be dicking around with
  * files like this.
  *  -GP
  */


if(isset($_GET['pro']) && $_GET['pro']!=''){
	
	ini_set('display_errors',0);

	if($_GET['pro']==md5('createuser')){ // create user request
        //Create the actual user
		$url = "http://data.cube.blue/v1/api.php?create=&user=".$_GET['emailid']."&pass=".$_GET['pwd'];
        $content = array();
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
		$response = curl_exec($curl);
		echo $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		//and we created the account
		
		
		
		/*** Instant Login ***/
		$processLogin = file_get_contents("http://data.cube.blue/v1/api.php?login=&user=".$_GET['emailid']."&pass=".$_GET['pwd']);
        $responseCode = http_response_code();

		if($responseCode==200){// Success
			$token = json_decode($processLogin);
			session_start();
			$_SESSION['usertoken']=$token->token;
			$_SESSION['useremailid']=$_GET['emailid'];

            /**** storing other details ***/
            $array = array(
                'apikey' => $token->token,
                'more' => '{"more_first_name":"'.$_GET['firstname'].'","more_last_name":"'.$_GET['lastname'].'"}'
            );


            $url = "http://data.cube.blue/v1/api.php?more=&utility&";
            $content = $array;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            $json_response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		

            $array = array(
                'apikey' => $token->token,
                'myhome' => '{"address_street_number":"'.$_GET['streetnumber'].'","address_street_name":"'.$_GET['streetname'].'","address_zip":"'.$_GET['zip'].'"}');

					
            $url = "http://data.cube.blue/v1/api.php?myhome=";
            $content = $array;

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            $json_response = curl_exec($curl);

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            echo 200;
            return;
		}
	}

	
	
	if($_GET['pro']==md5('login')){ // Login request
		$processLogin = file_get_contents("http://data.cube.blue/v1/api.php?login=&user=".$_GET['emailid']."&pass=".$_GET['pwd']);
		$responseCode = http_response_code();
		
		if($responseCode==500){ // General Error
			echo 3333;
		}else if($responseCode==403){ // Login Unsuccessful
			echo 111;
		}else if($responseCode==200){// Success		 
			$token = json_decode($processLogin);
			session_start();
			$_SESSION['usertoken']=$token->token;
			$_SESSION['useremailid']=$_GET['emailid'];
		}else{ // Nothing response so 'General Error'
			echo 0;
		}
	}

	
	
	
	
	if($_GET['pro']==md5('reset')){ // Reset Password request
		$processLogin = file_get_contents("http://data.cube.blue/v1/api.php?reset=&user=".$_GET['emailid']);
		
		$responseCode = http_response_code();
		
		if($responseCode==500){ // General Error
			echo 500;
		}else if($responseCode==403){ // Account not found
			echo 403;
		}else if($responseCode==200){// Success		 
			echo 200;
		}else{ // Nothing response so 'General Error'
			echo 500;
		}
	}
	
	
		
	if($_GET['pro']==md5('waterutility')){ // Reset Password request
		/**Setting Transmitter*/
		
		$array = array(
			'apikey' => $_GET['tok'],
			'more' => '{"more_utility_id":"'.$_GET['val'].'"}'
		 ); 
		 
		$url = "http://data.cube.blue/v1/api.php?more=&utility&";    
		$content = $array;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

		$response = curl_exec($curl);
		echo $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		/******/
	}
}