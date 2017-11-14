<?php
session_start();
if(!isset($_SESSION['username']))
{header('Location:index.php');}
else{
}

$txt = "./files/".$_POST["filename"].".".$_POST["language1"]; 
$fh = fopen($txt, 'w+');
$code=$_POST['codetosave'];
	if(fwrite($fh,$code)){
		fclose($fh);
		//header("Location:code.php?savesuccess=1");
		echo "<script> document.location.href='code.php?savesuccess=1';</script>";
		}
		else{
		//header("Location:code.php?savesuccess=1");
		echo "<script> document.location.href='code.php?savefail=1';</script>";
	}
?>
