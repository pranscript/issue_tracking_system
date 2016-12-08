<?php 

$dbhost = 'localhost:3306';                   // 3306 is the default xampp port for mysql
$dbuser = 'root';
$dbpass = 'speak1234';
$db = 'forum';
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) {
  die('Could not connect: ' . mysql_error($con));
}
mysql_select_db($db,$con) or die('Could not select database');
?>