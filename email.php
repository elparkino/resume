<?php  
	if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
		$formData = array(
			'name'		=> $_POST['name'],
			'email' 	=> $_POST['email'],
			'message'	=> $_POST['message']
			);

		$responseData = array(
			'rEmail' 	=> array(
				'responseMessage' 	=> null, 
				'isValid'			=> null 					
				),
			'rName' 	=> array(
				'responseMessage' 	=> null, 
				'isValid'			=> null 					
				),
			'rMessage' 	=> array(
				'responseMessage' 	=> null, 
				'isValid'			=> null 					
				)
			);


		print_r($responseData);


		foreach ($formData as $key => $value) {
			switch ($key) {
				case 'name':
					if (!empty($formData['name'])) {
						$responseData['rName']['isValid'] = true;
						$responseData['rName']['responseMessage'] = "OK. Got it.";
					}else{
						$responseData['rName']['isValid'] = false;
						$responseData['rName']['responseMessage'] = "Yo! You need to give me your name!";
					}
					break;

				case 'email':
					if(!filter_var($formData['email'], FILTER_VALIDATE_EMAIL) == true){

						$responseData['rEmail']['isValid'] = false;
						$responseData['rEmail']['responseMessage'] = "Yo! You need to give me a valid email!";
					}else{
						$responseData['rEmail']['isValid'] = true;
						$responseData['rEmail']['responseMessage'] = "OK. Got it.";

					}
					break;
				case 'message':
					if (!empty($formData['message'])) {
						$responseData['rMessage']['isValid'] = true;
						$responseData['rMessage']['responseMessage'] = "OK. Got it.";
					}else{
						$responseData['rMessage']['isValid'] = true;
						$responseData['rMessage']['responseMessage'] = "Yo! You need to give me a valid email!";
					}
					break;
			}
		}

		echo json_encode($responseData);



		$emailBody = "Name: " . $formData['name'] . "\n"
		. "Email: " . $formData['email'] . "\n"
		. "Message Body: " . $formData['message'];

  			mail('public@parker-jones.org', 'parker-jones.org contact form from ' . $formData['name'], $emailBody);

}else{
		header('location: index.php');
	}
?>