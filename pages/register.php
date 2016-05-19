<?php
require_once('watInc.php');
require_once('sendEmail.php');

$email = getForm('email','');
$password = getForm('password','');
$password2 = getForm('password2','');
$name = getForm('name','');
$lastname = getForm('lastname','');
$company = getForm('company','');

writeSession('wat_user','');

if(isset($email) && isset($password) && isset($password2) && isset($name) && isset($lastname) && $password==$password2){
	
	$confirmationKey = md5(uniqid(rand(), true));

	if($company==''){
		$company='NULL';
	}
	else{
		$company = "'$company'";
	}
//echo $company.'<br/>';
	//Store data in database
	$query = "INSERT INTO  `wat-db`.`TemporalUsers` VALUES ('$email', PASSWORD(  '$password' ) , '$name', '$lastname', $company , CURRENT_TIMESTAMP, '$confirmationKey');";

//echo 'query: '.$query.'<br/>';
	$result = sendQuery($query);
//echo 'stored<br/>';
	if($result!==false){
		//Send confirmation email.
		$link = 'http://URL/wat/pages/confirmRegistration.php?email='.$email.'&key='.$confirmationKey;
		$to = $email;
		$email_result = sendEmail($to,$name,$lastname,$company,$link);
		header('location: loginForm.php?message=The account has been generate. A confirmation email has been sent!!');
	}
	else{
		header('location: registerForm.php?errormessage=The email is still in use!!!');	
	}
	exit(0);
}
else{
	header('location: registerForm.php?errormessage=There are some errors in the input data. Fill them again!!!');
	exit(0);
}

?>
