<html>
<head>


</head>
<body>
<?php

$q=intval($_GET['q']);
$r=intval($_GET['r']);
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'speak1234';
$db = 'forum';
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) {
  die('Could not connect: ' . mysql_error($con));
}
$sql="";
mysql_select_db($db,$con);

$sql= "UPDATE answers SET VOTES = VOTES + 1 WHERE I_D = '".$q."'";


/*elseif ($q=='showallvotes')
{
$sql="SELECT * FROM issues ORDER BY I_D DESC , VOTES limit 0 ,5";
}*/
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

echo "$r"+1;

mysql_close($con);

?>
</body>
</html>