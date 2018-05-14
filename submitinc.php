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
$urlcheck="http://".$_SERVER['HOST_HTTP'].$_SERVER['REQUEST_URI'];
if (strpos($urlcheck,'error=empty')!==false)
{
echo"Fill out all feilds";
}
elseif (strpos($urlcheck,'error=username')!==false)
{
echo"Username already taken select different username";
}
    echo"<form action='Submit.php' method='POST'> 
	<input type='text' name='id' placeholder='ID NUMBER' > 
	 <input type='text' name='userid' placeholder='USERNAME' > 
	  <input type='password' name='passw' placeholder='PASSWORD' > 
	  <input type='submit' name='Submit' id='Sub' value='Submit' />
	</form>";
?>
 </body>
  </html>