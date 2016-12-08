<!DOCTYPE html>
<head>


</head>
<body>
<?php

require_once 'connection.php';

$sql1="";


$sql1="SELECT DISTINCT(NAME) AS username FROM issues ORDER BY DATE DESC";

$sql2="SELECT COUNT(DISTINCT NAME) AS count FROM issues ";


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
for ($i=0;$i<$countgroupname;$i++)
{
while($row = mysql_fetch_array($result1)) {
  
  echo "<option>" . $row['username'] . "</option>";
  
}
}

mysql_close($con1);

?>
</body>
</html>