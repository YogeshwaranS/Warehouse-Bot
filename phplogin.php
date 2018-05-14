<?php
session_start();
$servername = "localhost";
$username = "1249237";
$password = "yogesh090909";
$dbname = "1249237";
 $usern=$_POST['UserIDtxt'];
 $pass=$_POST['Passwordtxt'];
 $txt = "yogesh";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo"this is going side ways";
}



$q="SELECT Password FROM Users_rfid WHERE UserName='{$usern}'";
$und=$con->query($q);
$val = $und->fetch_assoc();
if ( $val['Password']== $pass )
{
	$_SESSION['ID']=$val['ID'];
	
	if ( $usern == $txt)
	{
	header("Location:adminpage.php");
exit; 
	}
	else{
		
		header("Location:http://projectrfid.coolpage.biz/page1.html");
	}
}
else{
echo"Enter correct details";
}
?>