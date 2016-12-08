<html>
<head>
<style>


</style>
</head>
<body>
<?php

$id=mysql_real_escape_string(intval($_GET['issueid']));
require_once 'connection.php';
    $votes=0;
    $answeredby=mysql_real_escape_string(strtolower($_POST['answeredby']));
	$answer=mysql_real_escape_string($_POST['answer']);
	$num;
	$defaultansweredby="anonymous";
	
	
	$count_ans=mysql_query( "SELECT ANSWERS AS anscount FROM issues WHERE I_D = '".$id."'");
	if(! $count_ans )
    {
  die('Could not enter data: ' . mysql_error());
   }
   while($row = mysql_fetch_array($count_ans)) {
   $num = $row['anscount'];
   
   }
	
	$num= $num +1;
	$retval0 = mysql_query("UPDATE issues SET ANSWERS='".$num."' WHERE I_D = '".$id."'") ;
	/*$retval0 = mysql_query("INSERT INTO issues (ANSWERS) VALUES('".$count_ans."') WHERE I_D = '".$id."'");*/
	if(! $retval0 )
{
  die('Could not enter data: ' . mysql_error());
}
	/*$sql = "INSERT INTO issues(I.D,NAME,GROUP NAME,ISSUE,PASSWORD,STATUS) VALUES ('$id','$name','$groupname','$issue','$password','$status')";*/
if($answeredby=="")
{
$sql = "INSERT INTO answers (ISSUE_ID,VOTES,ANSWEREDBY,ANSWER,DATE) VALUES('".$id."','".$votes."','".$defaultansweredby."','".$answer."',CURDATE())";
}
else
{
$sql = "INSERT INTO answers (ISSUE_ID,VOTES,ANSWEREDBY,ANSWER,DATE) VALUES('".$id."','".$votes."','".$answeredby."','".$answer."',CURDATE())";
}

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