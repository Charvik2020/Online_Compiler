<?php
session_start();
if(!isset($_SESSION['username']))
{header('Location:index.php');}
else{
	
	//echo $_SESSION['username'];
}


$uploaddir = './files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    
    header("Location:code.php?success=1");
    
} else {
    
     header("Location:code.php?fail=1");
     
}


?>