<html>
<head>


</head>
<body>
<?php

$id=intval($_GET['q']);
$password=mysql_real_escape_string($_GET['r']);
require_once 'connection.php';

$sql="";
$status="";


if($password!="")
{

$sql="SELECT PASSWORD FROM issues WHERE I_D = '".$id."'";
$sql1="SELECT STATUS FROM issues WHERE I_D = '".$id."'";



$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while($st = mysql_fetch_assoc($result1)) {
$status = $st['STATUS'];
}


while($row = mysql_fetch_assoc($result)) {
  $sql2="";
  if ( $row['PASSWORD'] == $password && $status=="solved")
   {
   $sql2= "UPDATE issues SET STATUS = 'unsolved' WHERE I_D = '".$id."'";
   $result2 = mysql_query($sql2);
   if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
    }
	echo "<img src='redcross.png' title='unsolved' style='display:block;background:;margin-left:93px;'><br />";
    echo "<div onclick='markstatus()' style='cursor:pointer;width:100px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it solved</div>";
   }
   elseif ( $row['PASSWORD'] == $password && $status=="unsolved")
   {
   $sql2= "UPDATE issues SET STATUS = 'solved' WHERE I_D = '".$id."'";
   $result2 = mysql_query($sql2);
   if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
	 }
  echo "<img src='greentick.png' title='solved' style='display:block;background:;margin-left:95px;'><br />";
		   echo "<div onclick='markstatus()' style='cursor:pointer;cursor:pointer;width:115px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it unsolved</div>";

}
   else
   {
    if($status=="unsolved")
	{
	echo "<img src='redcross.png' title='unsolved' style='display:block;background:;margin-left:93px;'><br />";
    echo "<div onclick='markstatus()' style='cursor:pointer;width:100px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it solved</div>";
	}
	elseif($status=="solved")
	{
	echo "<img src='greentick.png' title='solved' style='display:block;background:;margin-left:95px;'><br />";
		   echo "<div onclick='markstatus()' style='cursor:pointer;width:115px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it unsolved</div>";
	}
   }
}
}
else
{

$sql1="SELECT STATUS FROM issues WHERE I_D = '".$id."'";


$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while($st = mysql_fetch_assoc($result1)) {
$status = $st['STATUS'];
}


  $sql2="";
  if ($status=="solved")
   {
   $sql2= "UPDATE issues SET STATUS = 'unsolved' WHERE I_D = '".$id."'";
   $result2 = mysql_query($sql2);
   if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
    }
	echo "<img src='redcross.png' title='unsolved' style='display:block;background:;margin-left:93px;'><br />";
    echo "<div onclick='markstatus1()' style='cursor:pointer;width:100px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it solved</div>";
   }
   elseif ($status=="unsolved")
   {
   $sql2= "UPDATE issues SET STATUS = 'solved' WHERE I_D = '".$id."'";
   $result2 = mysql_query($sql2);
   if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
	 }
  echo "<img src='greentick.png' title='solved' style='display:block;background:;margin-left:95px;'><br />";
		   echo "<div onclick='markstatus1()' style='cursor:pointer;width:115px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it unsolved</div>";

}
 
}

mysql_close($con);
?>
</body>
</html>