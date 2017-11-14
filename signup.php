<?php
session_start();

require_once("config.inc.php");

$con=mysql_connect($host, $user, $pass) or DIE('Connection to host is failed, perhaps the service is down!');
mysql_select_db($db_name,$con) or DIE('Database name is not available!');

$fname=$_POST["first_name"];
$sname=$_POST["last_name"];
$email=$_POST["email"];
$pass=$_POST["password"];
$cpass=$_POST["cpassword"];



function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
} 

$result = mysql_query("select email from $tbl_name");
$row = mysql_fetch_array($result);

$src1="./user/";
$dest_1="./".$email;
#$src2="./user/code.php";
#$dest_2="./".$email;	
#$src3="./user/compile.php";
#$dest_3="./".$email;

if($pass==$cpass){
        $que="insert  into $tbl_name values ('$fname','$sname','$email','$pass');";

        if(!mysql_query($que))
        {
            header('Location: index.php?signup_attempt=1');
        }
        else
        {
            mkdir("./".$email);
            recurse_copy($src1,$dest_1);
            #recurse_copy($src2,$dest_2);
            #recurse_copy($src3,$dest_3);
            echo "<script type='text/javascript'>
                    alert('Your Account Successfuly..!! created.');
                    </script>
            ";
        }


}else{
    header('Location: index.php?password_match=1');
    echo "pass doest not match.";
}

mysql_close($con);
?>
