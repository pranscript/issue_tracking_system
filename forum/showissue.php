<html>
<head>


</head>
<body>
<?php

$id=intval($_GET['q']);
require_once 'connection.php';

$sql="";

$sql="SELECT ISSUE FROM issues WHERE I_D = '".$id."'";



/*elseif ($q=='showallvotes')
{
$sql="SELECT * FROM issues ORDER BY I_D DESC , VOTES limit 0 ,5";
}*/
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}


while($row = mysql_fetch_assoc($result)) {

  echo $row['ISSUE'];
 


}


mysql_close($con);
?>
</body>
</html>