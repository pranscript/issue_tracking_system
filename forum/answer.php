<html>
<head>


</head>
<body>
<?php


require_once 'connection.php';
$sql="";

$sql="SELECT * FROM answers ORDER BY ANSWER DESC ";



/*elseif ($q=='showallvotes')
{
$sql="SELECT * FROM issues ORDER BY I_D DESC , VOTES limit 0 ,5";
}*/
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}


while($row = mysql_fetch_array($result)) {
  $votefieldid="votefield".$row['ANS_I_D'];
  $voteupid="voteup".$row['ANS_I_D'];
  $votedownid="votedown".$row['ANS_I_D'];
  echo "<div class='table'>";
  echo "<div><span class='voteup' id='".$voteupid."' onclick='voteup(".$row['ANS_I_D'].",".$row['VOTES'].",$(this))' style='cursor:pointer'></span><span class='votefield' id='".$votefieldid."'>" . $row['VOTES'] . "</span><span class='votedown' id='".$votedownid."' onclick='votedown(".$row['ANS_I_D'].",".$row['VOTES'].",$(this))' style='cursor:pointer'></span></div>";
   echo "<div><span>Ans</span><h2>" . nl2br(htmlspecialchars($row['ANSWER'])) . "</h2></div>";
   echo "<div>" . $row['KNOWLEDGE'] . "</div>";
	echo "<div>" . htmlspecialchars($row['ASKEDBY']) . "</div>";
  echo "<div>" . $row['DATE'] . "</div>";
  echo "</div>";
}


mysql_close($con);
?>
</body>
</html>