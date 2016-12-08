<html>
<head>


</head>
<body>
<?php


$q = intval($_GET['q']);
$page=intval($_GET['r']);
$numissue;

require_once 'connection.php';


$sql1="";        



$offset= $page*50;

if($q ==1)
{
       $sql1="SELECT COUNT(NAME) as Number,NAME,GROUP_NAME FROM issues GROUP BY NAME ORDER BY Number DESC LIMIT ".$offset.", 50";

       $result1 = mysql_query($sql1);
       if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
     }
	 $numissue = mysql_num_rows($result1);
echo "<div style='position:absolute;top:163px;left:1090px;'>Total number of Results = $numissue</div>";



echo "<table class='table'>
<tr>
<th>Rank</th>
<th>Name</th>
<th>Number of Issues</th>


</tr>";

   $rank=1;
   while($row = mysql_fetch_array($result1)) {
  echo "<tr>";
  echo "<td>".$rank.".</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['Number'] . "</td>";
  $rank++;
 }   
       echo "</table>";

}
elseif($q ==2)
{
$sql1="SELECT COUNT(answers.ANSWEREDBY) as Number ,answers.ANSWEREDBY FROM answers INNER JOIN issues ON issues.I_D=answers.ISSUE_ID GROUP BY answers.ANSWEREDBY ORDER BY Number DESC LIMIT ".$offset.", 50";

$result1 = mysql_query($sql1);
       if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
     }
	 $numissue = mysql_num_rows($result1);
echo "<div style='position:absolute;top:163px;left:1090px;'>Total number of Results = $numissue</div>";



echo "<table class='table'>
<tr>
<th>Rank</th>
<th>Answered By</th>
<th>Number of Answers</th>


</tr>";

   $rank=1;
   while($row = mysql_fetch_array($result1)) {
  echo "<tr>";
  echo "<td>".$rank.".</td>";
  echo "<td>" . $row['ANSWEREDBY'] . "</td>";
  echo "<td>" . $row['Number'] . "</td>";
  $rank++;
 }   
       echo "</table>";



}

elseif($q ==3)
{
$sql1="SELECT COUNT(ISSUE) AS Number,NAME FROM `issues` WHERE KNOWLEDGE>0 GROUP BY NAME ORDER BY Number DESC LIMIT ".$offset.", 50";

$result1 = mysql_query($sql1);
       if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
     }
	 $numissue = mysql_num_rows($result1);
echo "<div style='position:absolute;top:163px;left:1090px;'>Total number of Results = $numissue</div>";



echo "<table class='table'>
<tr>
<th>Rank</th>
<th>Asked By</th>
<th>Number of Knowledgeable Issues</th>


</tr>";

   $rank=1;
   while($row = mysql_fetch_array($result1)) {
  echo "<tr>";
  echo "<td>".$rank.".</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['Number'] . "</td>";
  $rank++;
 }   
       echo "</table>";



}









                        // SETTING UP PAGING

$next=$page+1;
$previous=$page-1;
$first=0;
$last=($numissue/50);

echo "<div style='width:100%;height:40px;background:#292b30;margin-top:0px'>";
if($page!=0){

echo "<div style='position:absolute;width:30px;cursor:pointer;margin-top:10px;left:30%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='showresult(\"$q\",\"$r\",\"$first\")'>First</span></div>";
	  
}
	  
	 
if($numissue >=($offset)+50)
{
echo "<div style='position:absolute;width:32px;cursor:pointer;margin-top:10px;left:40%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='showresult(\"$q\",\"$r\",\"$next\")'>Next</span></div>";

}


if ($page!=0)
{
	  echo "<div style='position:absolute;width:55px;cursor:pointer;margin-top:10px;left:50%;background:;color:#cadae6;text-decoration:underline;'>
	  <span onclick='showresult(\"$q\",\"$r\",\"$previous\")'>Previous</span>
	  </div>";
	  
}


if($numissue >=($offset)+50)
{
echo "<div style='position:absolute;width:30px;cursor:pointer;margin-top:10px;left:61%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='showresult(\"$q\",\"$r\",\"$last\")'>Last</span></div>";
	  
	  }
echo "</div>";	  
mysql_close($con);

?>
</body>
</html>