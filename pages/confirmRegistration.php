<?php
require_once('watInc.php');
require_once('sendEmail.php');

$email = getForm('email','');
$key = getForm('key','');

writeSession('wat_user','');

if( $email!='' && $key!='' ){

	$result = confirmUser($email,$key);	
//echo 'RESULT:'.$result.'<br/>';

	//Store data in database
	if($result===true){
		//Send confirmation email.
//exit(0);

		$query2 = "INSERT INTO `wat-db`.`Users` (email,password,name,lastname,company) SELECT email,password,name,lastname,company FROM `wat-db`.`TemporalUsers` WHERE email='$email';";
		$result2 = sendQuery($query2);
		header('location: loginForm.php?message=The account has been confirmed!!');
	}
	else{
		header('location: registerForm.php?errormessage=Incorrect confirmation code!!!');	
	}
	exit(0);
}
else{
	header('location: registerForm.php');
	exit(0);
}

?>
