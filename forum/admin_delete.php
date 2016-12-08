<?php 
session_start();
if(!isset($_SESSION['admin_login']))
{
header("Location: adminlogin.php");
}
?>

<html>
<head>


</head>
<body>
<?php

require_once 'connection.php';
$largestid;
$flag=0;


$query="SELECT I_D FROM issues ORDER BY I_D DESC LIMIT 0, 1";
$resultquery = mysql_query($query);
if (!$resultquery) { // add this check.
    die('Invalid query: ' . mysql_error());
} 
while($row = mysql_fetch_array($resultquery)) {
$largestid=$row['I_D'];
}


for($i=1;$i<=$largestid;$i++)
{ 
 if(isset($_POST["delete".$i.""]))
 {
 $flag=1;
$sql1="DELETE FROM issues WHERE I_D = ".$_POST[("delete".$i."")]."";
$sql2="DELETE FROM answers WHERE ISSUE_ID = ".$_POST[("delete".$i."")].""; 
$sql3="DELETE FROM comments WHERE ISSUE_ID = ".$_POST[("delete".$i."")]."";  
$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
} 
$result2 = mysql_query($sql2);
if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
}
$result3 = mysql_query($sql3);
if (!$result3) { // add this check.
    die('Invalid query: ' . mysql_error());
}  
  if($result1 && $result2 && $result3)
   {
        header('Refresh: 0.5; URL=admin_index.php');
		echo "<script type='text/javascript'>alert('Successfully Deleted the Issues');</script>";
    }   
	else
	{
	header('Refresh: 0.5; URL=admin_index.php');
		echo "<script type='text/javascript'>alert('Could Not Delete the Issues');</script>";
	}
}
}
if($flag==0)
{
	header('Refresh: 0.5; URL=admin_index.php');
		echo "<script type='text/javascript'>alert('No Issue Selected');</script>";
}

	  
mysql_close($con);

?>
</body>
</html>