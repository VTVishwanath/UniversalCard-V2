<?php
session_start(); // start an existing session
if(isset($_SESSION["id"])){
	session_unset(); // remove all session variables
	session_destroy(); // destroy the session 
}
echo "<script language='Javascript'>
	location.href = '../../loginpage.php'
	</script>";
?>