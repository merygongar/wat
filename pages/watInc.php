<?php
setlocale(LC_ALL, 'es_ES.utf8');

session_start();

/***********************************************************
  Obtiene una variable de las cabeceras HTTP
 ***********************************************************/
function getForm($var, $default = '') {
  if(isset($_POST[$var]))
    return $_POST[$var];
  elseif(isset($_GET[$var]))
    return $_GET[$var];
  else
    return $default;
} // getForm

/***********************************************************
  Lee una cookie
 ***********************************************************/
function getCookie($var, $default) {

/*foreach($_COOKIE as $word){
	echo 'COOKIE: '.$word.'<br/>';
}*/

  if(isset($_COOKIE[$var])) 
    return $_COOKIE[$var];
  else
    return $default;
} // getCookie


/***********************************************************
  Escribe una cookie
 ***********************************************************/
function writeCookie($var, $value, $onlySession) {
	if(isset($value)) {
		if($onlySession){
			$estaSetteada = setcookie($var, $value, 0); 
		}
		else{	 
			setcookie($var, $value, time()+2592000);  // 30*24*60*60
		}
	} else
		setcookie($var, '', time()-60);
} // setCookie

function cleanCookies(){
	foreach ($_COOKIE as $name => $value) {
		if(strpos($name,'098')!==false && strpos($name,'098')==0){
			setcookie($name, '', time()-60);
		}
	}
}

/***************************************
  Lee una session
 *******************************/
function getSession($var, $default) {
	if(isset($_SESSION[$var])) 
		return $_SESSION[$var];
	else
		return $default;
}

/****************************************
  Escribe una session
 ****************************************/
function writeSession($var, $value) {
	if(isset($value)) {
		$_SESSION[$var] = $value;
	} else
		$_SESSION[$var] = '';
}

function sendQuery($query){
	$link=mysqli_connect("v35731.1blu.de", "wat-db", "watDB2016User", "wat-db");
	if (!$link) {
		return false;
	}
	mysqli_query($link, "SET NAMES 'utf8'");
//echo $query.'<br/>';
  	$result = mysqli_query($link,$query);
//echo $query.'<br/>';
//	echo mysqli_num_rows($result).'<br/>';
	mysqli_close($link);
//	echo mysqli_num_rows($result).'<br/>';
	return $result;
}
function verifyUser($user, $pass) {
	$link=mysqli_connect("v35731.1blu.de", "wat-db", "watDB2016User", "wat-db");
	if (!$link) {
		return false;
	}
	mysqli_query($link, "SET NAMES 'utf8'");

        $user = mysqli_real_escape_string($link,$user);
        $pass = mysqli_real_escape_string($link,$pass);
        $query = "SELECT * FROM `wat-db`.`Users` ";
        $query .= "WHERE email='".$user."' AND password=PASSWORD('".$pass."')";
	$result = mysqli_query($link,$query);
//echo 'query: '.$query.'<br/>';
//	echo mysqli_num_rows($result).'<br/>';
	mysqli_close($link);
//echo $query.'<br/>';
//echo 'number: '.mysqli_num_rows($result);
	if(mysqli_num_rows($result)>0) {
		mysql_close($link);
		return true;
	} else {
		mysql_close($link);
		return false;
	}
}

function confirmUser($user, $key) {
	$link=mysqli_connect("v35731.1blu.de", "wat-db", "watDB2016User", "wat-db");
	if (!$link) {
		return false;
	}
	mysqli_query($link, "SET NAMES 'utf8'");

        $user = mysqli_real_escape_string($link,$user);
        $key = mysqli_real_escape_string($link,$key);
        $query = "SELECT * FROM `wat-db`.`TemporalUsers` ";
        $query .= "WHERE email='".$user."' AND confirmationKey='".$key."';";
  	
	$result = mysqli_query($link,$query);
//echo 'query: '.$query.'<br/>';
//	echo mysqli_num_rows($result).'<br/>';
	mysqli_close($link);

//echo $query.'<br/>';
//echo 'number: '.mysqli_num_rows($result);

	if(mysqli_num_rows($result)>0) {
		mysql_close($link);
		return true;
	} else {
		mysql_close($link);
		return false;
	}
}

?>
