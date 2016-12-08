<?php 
session_start();
if(!isset($_SESSION['admin_login']))
{
header("Location: adminlogin.php");
}
?>

<html>
<head>
<title>Graph</title>
<link type="text/css" rel="stylesheet" href="admin_graphcss.css">
</head>
<body>
 <div id="bodywrapper">
  
                                                  <!--Top Header -->
      <div id="header" align="center">
         <div id="headerimg">  
           <img src="issuetrackimg.png">
         </div>
      <!--<div id="linktosubmitissue">
           <a href="issue.php"><h4>Submit Issue</h4</a>
      </div>-->
      <!--<div id="linktoadminlogin">
           <a href="adminlogin.php"><h4>Admin Login</h4></a>
      </div>-->
	  <div id="linktohome">
        <a href="home.php"><h4>Home</h4</a>
     </div>
	   <div id="linktoadminlogout">
           <a href="admin_logout.php"><h4>Admin Logout</h4></a>
      </div>
	   <div id="linktoprint">
	  <img src="print.png" onclick="window.print()">
	  </div>
     </div>
	 <div id="result" style="margin-top:50px;">

<?php

$field=$_POST['field'];
$id1;
$id2;
$username;
$groupname;
$issue;
$votes1;
$votes2;
$answers1;
$answers2;
$knowledge1;
$knowledge2;
$status;
$date1;
$date2;
$orderby;
$ascdesc;
$count=0;
if($_POST['id1']=="")
     {
	 $id1=1;
	 }
	 else
	 {
	 $id1=intval($_POST['id1']);
	 }

if($_POST['id2']=="")
     {
	 $id2=10000;
	 }
	 else
	 {
	 $id2=intval($_POST['id2']);
	 }

$username=$_POST['username'];
$groupname=$_POST['groupname'];
$issue=mysql_real_escape_string($_POST['issue']);

if($_POST['votes1']=="")
     {
	 $votes1=-10000;
	 }
	 else
	 {
	 $votes1=intval($_POST['votes1']);
	 }
if($_POST['votes2']=="")
     {
	 $votes2=10000;
	 }
	 else
	 {
	 $votes2=intval($_POST['votes2']);
	 }
if($_POST['answers1']=="")
     {
	 $answers1=-10000;
	 }
	 else
	 {
	 $answers1=intval($_POST['answers1']);
	 }
if($_POST['answers2']=="")
     {
	 $answers2=10000;
	 }
	 else
	 {
	 $answers2=intval($_POST['answers2']);
	 }
if($_POST['knowledge1']=="")
     {
	 $knowledge1=0;
	 }
	 else
	 {
	 $knowledge1=intval($_POST['knowledge1']);
	 }
if($_POST['knowledge2']=="")
     {
	 $knowledge2=10000;
	 }
	 else
	 {
	 $knowledge2=intval($_POST['knowledge2']);
	 }
$status=$_POST['status'];
if($_POST['date1']=="")
     {
	 $date1="2014/01/01";
	 }
	 else
	 {
	 $date1=$_POST['date1'];
	 }
if($_POST['date2']=="")
     {
	 $date2="2099/01/01";
	 }
	 else
	 {
	 $date2=$_POST['date2'];
	 }


require_once 'connection.php';
$sql="SELECT COUNT(".$field.") AS GROUPCOUNT, ".$field." FROM issues WHERE 
       ( NAME LIKE \"%".$username."%\" AND 
		 GROUP_NAME LIKE \"%".$groupname."%\" AND
		 ISSUE LIKE \"%".$issue."%\" AND
         STATUS LIKE \"".$status."%\" ) 
		 
		 AND
         (I_D BETWEEN ".$id1." AND ".$id2." )
		 AND
         (VOTES BETWEEN ".$votes1." AND ".$votes2." )
		 AND
         (ANSWERS BETWEEN ".$answers1." AND ".$answers2." )
		 AND
         (KNOWLEDGE BETWEEN ".$knowledge1." AND ".$knowledge2." )
		 AND
         (DATE BETWEEN '".$date1."' AND '".$date2."' )

      GROUP BY ".$field."";
$sqlcount="SELECT COUNT(".$field.") AS total FROM issues

			";
			/* WHERE
            ( NAME LIKE \"%".$username."%\" AND 
		 GROUP_NAME LIKE \"%".$groupname."%\" AND
		 ISSUE LIKE \"%".$issue."%\" AND
         STATUS LIKE \"".$status."%\" ) 
		 
		 AND
         (I_D BETWEEN ".$id1." AND ".$id2." )
		 AND
         (VOTES BETWEEN ".$votes1." AND ".$votes2." )
		 AND
         (ANSWERS BETWEEN ".$answers1." AND ".$answers2." )
		 AND
         (KNOWLEDGE BETWEEN ".$knowledge1." AND ".$knowledge2." )
		 AND
         (DATE BETWEEN '".$date1."' AND '".$date2."' )*/


$total=0;
$result = mysql_query($sql);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
$result1 = mysql_query($sqlcount);
if (!$result1) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while($ct = mysql_fetch_assoc($result1)) {
$total=$ct['total'];
}
echo "<table class='table'>";
echo "<tr>";
echo "<th>Group</th>";
echo "<th>Count</th>";
echo "<th>Graph</th>";
echo "</tr>";
while($row = mysql_fetch_assoc($result)) {
echo "<tr>";
echo "<td>".$row[$field]."</td>";
echo "<td>".$row['GROUPCOUNT']."</td>";
$percent=(($row['GROUPCOUNT']/$total)*100);
$length= ((1180*$percent)/100);
echo "<td style='text-align:right'><div style='background:red;height:10px;border-top-right-radius:3px;border-bottom-right-radius:3px;width:".$length."px'></td>";

echo "</tr>";
}


echo "</table>";
echo "<div style='position:absolute;top:130px;left:1100px;'>Total number of Results = $total</div>";
mysql_close($con);
?>
</div>
</div>
</body>
</html>