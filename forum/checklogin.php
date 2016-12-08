<?php
session_start();
$adminname=mysql_real_escape_string($_POST['adminname']);
$password=mysql_real_escape_string($_POST['password']);

require_once 'connection.php';

 $sql="";

 
 $sql="SELECT PASSWORD FROM admin WHERE ADMIN_NAME = '".$adminname."'";
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
$flag=false;
while($row = mysql_fetch_array($result)) {
       if($row['PASSWORD']==$password)
	   {
	   $flag=true;
	   break;
	   }
	 
}
if($flag==true)
{
       $_SESSION['admin_login'] = $adminname;
	   
	   header("location: admin_index.php");
	   exit();
}
else
{
header("location: adminlogin.php");
exit();
}



?>
</body>
</html>
