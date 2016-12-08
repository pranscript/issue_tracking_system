<!DOCTYPE html>
<head>

</head>
<body>
<?php

$searchtext = mysql_real_escape_string(strtolower($_GET['q']));
$value = $_GET['r'];
$page=intval($_GET['s']);

if($value!="")
{

require_once 'connection.php';

$sql1="";       $sql2="";
$offset= $page*50;

$sql1="SELECT * FROM issues WHERE ".$value." LIKE '%".$searchtext."%' ORDER BY I_D DESC LIMIT ".$offset.", 50";

$sql2="SELECT COUNT(*) AS num FROM issues WHERE ".$value." LIKE '%".$searchtext."%'";


$result1 = mysql_query($sql1);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}


$result2 = mysql_query($sql2);
if (!$result2) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$count = mysql_fetch_assoc($result2);
$numsolvedissue = $count['num'];


echo "<div style='position:absolute;top:242px;left:1100px;'>Total number of Results = $numsolvedissue</div>";
echo "<table class='table'>
<tr>
<th>I_D</th>
<th>NAME</th>
<th>GROUP</th>
<th>ISSUE</th>
<th title='This issue is genuine , clear and important'>VOTES</th>
<th title='Number Of Answers'>ANSWERS</th>
<th title='This Issue Contains Knowledge'>KNOWLEDGE</th>
<th>STATUS</th>
<th>DATE</th>
</tr>";


while($row = mysql_fetch_array($result1)) {
  echo "<tr>";
  echo "<td>" . $row['I_D'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['GROUP_NAME'] . "</td>";
   echo "<td><a href=link.php?a=".$row['I_D']." target='_blank' title='".nl2br(htmlspecialchars($row['DETAILED_ISSUE']))."'><span style='font-family: Segoe;font-size:15px; '>" .nl2br(htmlspecialchars($row['ISSUE'])) . "</span></a></td>";
   echo "<td>" . $row['VOTES'] . "</td>";
    echo "<td>" . $row['ANSWERS'] . "</td>";
	echo "<td>" . $row['KNOWLEDGE'] . "</td>";
 if($row['STATUS']=="solved")
  {
  echo "<td title='Solved'><img src='greentick.png'></td>";
  }
  else{
  echo "<td title='Unsolved'><img src='redcross.png'></td>";
  }
  echo "<td>" . $row['DATE'] . "</td>";
  echo "</tr>";
}
echo "</table>";


                        // SETTING UP PAGING

$next=$page+1;
$previous=$page-1;
$first=0;
$last=($numsolvedissue/50);

echo "<div style='width:100%;height:40px;background:#292b30;margin-top:0px'>";
if($page!=0){

echo "<div style='position:absolute;width:30px;cursor:pointer;margin-top:10px;left:30%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='search(\"$searchtext\",\"$first\")'>First</span></div>";
	  
}
	  
	 
if($numsolvedissue >=($offset)+50)
{
echo "<div style='position:absolute;width:32px;cursor:pointer;margin-top:10px;left:40%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='search(\"$searchtext\",\"$next\")'>Next</span></div>";

}


if ($page!=0)
{
	  echo "<div style='position:absolute;width:55px;cursor:pointer;margin-top:10px;left:50%;background:;color:#cadae6;text-decoration:underline;'>
	  <span onclick='search(\"$searchtext\",\"$previous\")'>Previous</span>
	  </div>";
	  
}


if($numsolvedissue >=($offset)+50)
{
echo "<div style='position:absolute;width:30px;cursor:pointer;margin-top:10px;left:61%;background:;color:#cadae6;text-decoration:underline;'>
      <span onclick='search(\"$searchtext\",\"$last\")'>Last</span></div>";
	  
	  }
echo "</div>";	  


mysql_close($con);
}
?>
</body>
</html>