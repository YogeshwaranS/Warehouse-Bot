 <?php
  session_start();
  include 'db.php';
  include 'dt.php';
?>
 <html>
  <head>
	  <title>Enter new user</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
	  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
 <?php
  $id=$_POST['id'];
  $userid=$_POST['userid'];
  $passw=$_POST['passw'];
  	if (empty($id))
	{
		header("Location:submitinc.php?error=empty");
		exit();
		}
		if (empty($userid))
	{
		header("Location:submitinc.php?error=empty");
		exit();
		}
		if (empty($passw))
	{
		header("Location:submitinc.php?error=empty");
		exit();
		}
 else{

 $sqlc="SELECT Username FROM Users_rfid WHERE Username='$userid'";
$result=$con->query($sqlc);
$ucheck=mysqli_num_rows($result);
if ($ucheck>0)
	{
		header("Location:submitinc.php?error=username");
		exit();
}


else{
$sqlinsert="INSERT INTO Users_rfid (ID,UserName,Password,SignupTime) VALUES('$id','$userid','$passw','$time')";
  if (isset($_POST['Submit']))
  {
	  if (!mysqli_query($con,$sqlinsert))
  {
  		header("Location:dberror.php");
  } 
  else{
	  header("Location:regsecc.php");
  }
  }
  else{
	 echo"failed";
	  }
}
	}  
?>
  </body>
  </html>