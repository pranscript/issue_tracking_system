<html>
<head>
<style>


</style>
</head>
<body>
<?php

$id=mysql_real_escape_string(intval($_GET['issueid']));
require_once 'connection.php';
    
    
	$comment=mysql_real_escape_string($_POST['addcomment']);
	
	
	
	
	/*$sql = "INSERT INTO issues(I.D,NAME,GROUP NAME,ISSUE,PASSWORD,STATUS) VALUES ('$id','$name','$groupname','$issue','$password','$status')";*/

$sql = "INSERT INTO comments (ISSUE_ID,COMMENT,DATE) VALUES('".$id."','".$comment."',CURDATE())";
      

	$retval = mysql_query( $sql, $con );
	
    if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
header("location: link.php?a=$id");
mysql_close($con);




?>
</body>
</html>