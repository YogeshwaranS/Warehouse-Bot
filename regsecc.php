<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seccess</title>
 <link rel="stylesheet" type="text/css" href="style1.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<p type="text" style="font-size:28px" align="center">REGISTERED SUCCESSFULLY</p>
<form action="regsecc.php" method="POST">
<button name="button" class="button"> <span> back </span></button>

</form>
<?php
if (isset($_POST['button']))
{
	header("Location:adminpage.php");
	}
	else {}
?>
</body>
</html>