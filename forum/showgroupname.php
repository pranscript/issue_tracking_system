<!DOCTYPE html>
<head>
<link rel="stylesheet" href="showresultcss.css">

</head>
<body>
<?php


require_once 'connection.php';

$sql1="";


$sql1="SELECT DISTINCT(GROUP_NAME) AS groupname FROM issues ORDER BY DATE DESC";

$sql2="SELECT COUNT(DISTINCT GROUP_NAME) AS count FROM issues ";


$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}


$result2 = mysql_query($sql2);
if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
}


$countgrpname = mysql_fetch_assoc($result2);
$countgroupname = $countgrpname['count'];


echo "<option></option>";
echo "<option> CSE </option>";                            // DEFAULT OPTIONS
echo "<option> EEE </option>";
echo "<option> ECE </option>";


for ($i=0;$i<$countgroupname;$i++)
{
while($row = mysql_fetch_array($result1)) {
  
  echo "<option>" . $row['groupname'] . "</option>";
  
}
}


mysql_close($con);
?>
</body>
</html>