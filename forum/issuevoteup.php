<html>
<head>


</head>
<body>
<?php

$q=intval($_GET['q']);
require_once 'connection.php';
$sql="";

$sql= "UPDATE issues SET VOTES = VOTES + 1 WHERE I_D = '".$q."'";
$sql1= "SELECT VOTES FROM issues WHERE I_D = '".$q."'";

/*elseif ($q=='showallvotes')
{
$sql="SELECT * FROM issues ORDER BY I_D DESC , VOTES limit 0 ,5";
}*/
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while($row = mysql_fetch_array($result1)) {
echo ($row['VOTES']);
}


mysql_close($con);

?>
</body>
</html>