<?php
require_once('watInc.php');

$email = getForm('email','');
$password = getForm('password','');

writeSession('wat_user','');

if( isset($email) && isset($password) ){
	$result = verifyUser($email,$password);
	if($result===false){
		header('location: loginForm.php?errormessage=Incorrect Email or Password!!!');
	}
	else{
		writeSession('wat_user',$email);
		header('location: annotations.php');
	}
}
else{
	header('location: loginForm.php?errormessage=Email or password are empty!!!');
}
exit(0);
?>
