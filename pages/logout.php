<?php
require_once('watInc.php');

writeSession('wat_user','');

//TODO Prepare all the databases information that has to be needed for the colaborative working in order to keep in mind that the user has logged out.

header('location: index.php');
exit(0);
?>
