<?php
session_start();
include 'db.php';

$query = "SELECT * FROM Users_rfid";
$result = $con->query($query);
if (($result)||(mysqli_errno == 0))
{
  echo "<table width='100%'><tr>";
  if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 0;
          while ($i < mysqli_num_fields($result))
          {
       echo "<th align='center'>". mysqli_fetch_fields($result, $i) . "</th>";
$i++;
    }
    echo "</tr>";

    //display the data
    while ($rows = mysqli_fetch_array($result,MYSQL_ASSOC))
    {
      echo "<tr>";
      foreach ($rows as $data)
      {
        echo "<td align='center'>". $data . "</td>";
      }
    }
  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
  }
  echo "</table>";
}else{
  echo "Error in running query :". mysqli_error();
}
session_start();
if (isset($_POST['button1']))
{
	header("Location:submitinc.php");
	}
	else {}
?>
<html>
<head>
<title>RFID ADMIN</title>
 <link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<b>
<b>
<?php
echo $_SESSION['ID'].'<b>';
?>
<form action="adminpage.php" method="POST">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
 <button name="button1" class="button"><span>Register new user</span></button><b>
</form>
<form action= "logout.php" >
 <input type="submit"  value="Logout" />
</form>
<p>
</p>
</body>
</html>