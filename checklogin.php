<?php
session_start();

require_once("config.inc.php");

$con=mysqli_connect($host, $user, $pass) or DIE('Connection to host is failed, perhaps the service is down!');
mysqli_select_db($con,$db_name) or DIE('Database name is not available!');

$username=$_POST["username"];
$password=$_POST["password"];

$result=mysqli_query($con,"SELECT * FROM $tbl_name WHERE email='$username' and password='$password'");
//echo ;

if(mysqli_num_rows($result)>0)
{
	$_SESSION['username']=$username;
	header("Location: ./$username/");
}
else
{
	header('Location: index.php?login_attempt=1');
}

mysqli_close($con);

?>
