<html>
<head>
<style>
#table td{border:1px solid steelblue;}

</style>
</head>
<body>
<?php
$q = intval($_GET['q']);

$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'speak1234';
$db = 'forum';
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) {
  die('Could not connect: ' . mysql_error($con));
}

mysql_select_db($db,$con);

$sql="SELECT * FROM issues ORDER BY VOTES DESC,DATE DESC limit 5 ,10";
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
echo "<table border='1' style='border-top:2px solid purple;' id='table'>
<tr>
<th>I_D</th>
<th>NAME</th>
<th>GROUP_NAME</th>
<th>VOTES</th>
<th>ANSWERS</th>
<th>ISSUE</th>
<th>STATUS</th>
<th>DATE</th>
</tr>";
$path="1.txt";
while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['I_D'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['GROUP_NAME'] . "</td>";
   echo "<td>" . $row['VOTES'] . "</td>";
    echo "<td>" . $row['ANSWERS'] . "</td>";
  echo "<td><a href='".$path."'>" . $row['ISSUE'] . "</a></td>";
  echo "<td>" . $row['STATUS'] . "</td>";
  echo "<td>" . $row['DATE'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysql_close($con);
?>
</body>
</html>