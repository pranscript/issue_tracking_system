<?php 
session_start();
if(!isset($_SESSION['admin_login']))
{
header("Location: adminlogin.php");
}
?>

<html>
<head>

<link type="text/css" rel="stylesheet" href="admin_querycss.css">

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
	 
$orderby=$_POST['orderby'];
$ascdesc=$_POST['ascdesc'];


require_once 'connection.php';

/*
OR second_name LIKE \"%$search%\" 
  OR company_name LIKE \"%$search%\" 
  OR email LIKE \"%$search%\"                            

*/

$sql4=" SELECT * FROM issues WHERE

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
		
		 ORDER BY ".$orderby." ".$ascdesc."
		 
		   ";


$result = mysql_query($sql4);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}

echo "<table class='table' >
<tr>";
       
       if (isset($_POST["I_D"]) && !empty($_POST["I_D"])) {
	     
		 echo "<th class='I_D'>I_D</th>";
	   }
	   if (isset($_POST["NAME"]) && !empty($_POST["NAME"])) {
	    
		 echo "<th class='NAME'>NAME</th>";
	   }
	   if (isset($_POST["GROUP_NAME"]) && !empty($_POST["GROUP_NAME"])) {
	     
		 echo "<th class='GROUP_NAME'>GROUP_NAME</th>";
	   }
	   if (isset($_POST["ISSUES"]) && !empty($_POST["ISSUES"])) {
	     
		 echo "<th class='ISSUES'>ISSUE</th>";
	   }
	   if (isset($_POST["VOTES"]) && !empty($_POST["VOTES"])) {
	    
		 echo "<th class='VOTES'>VOTES</th>";
	   }
	   if (isset($_POST["ANSWER"]) && !empty($_POST["ANSWER"])) {
	    
		 echo "<th class='ANSWER'>ANSWER</th>";
	   }
	   if (isset($_POST["KNOWLEDGE"]) && !empty($_POST["KNOWLEDGE"])) {
	    
		 echo "<th class='KNOWLEDGE'>KNOWLEDGE</th>";
	   }
	   if (isset($_POST["STATUS"]) && !empty($_POST["STATUS"])) {
	     
		 echo "<th class='STATUS'>STATUS</th>";
	   }
	   if (isset($_POST["DATE"]) && !empty($_POST["DATE"])) {
	     
		 echo "<th class='DATE'>DATE</th>";
	   }
	   echo "</tr>";



while($row = mysql_fetch_assoc($result)) {
    $count+=1;
    echo "<tr>";
	if (isset($_POST["I_D"]) && !empty($_POST["I_D"])) 
	{
  echo "<td class='I_D'>" . $row['I_D'] . "</td>";
  }
  if (isset($_POST["NAME"]) && !empty($_POST["NAME"])) {
  echo "<td class='NAME'>" . $row['NAME'] . "</td>";
  }
  if (isset($_POST["GROUP_NAME"]) && !empty($_POST["GROUP_NAME"])) {
  echo "<td class='GROUP_NAME'>" . $row['GROUP_NAME'] . "</td>";
  }
  if (isset($_POST["ISSUES"]) && !empty($_POST["ISSUES"])) {
  echo "<td class='ISSUES'><a href=admin_link.php?a=".$row['I_D']." target='_blank' title=''><span style='font-family: Segoe;font-size:15px; '>" .nl2br(htmlspecialchars($row['ISSUE'])) . "</span></a></td>";
   }
   if (isset($_POST["VOTES"]) && !empty($_POST["VOTES"])) {
   echo "<td class='VOTES'>" . $row['VOTES'] . "</td>";
   }
   if (isset($_POST["ANSWER"]) && !empty($_POST["ANSWER"])) {
    echo "<td class='ANSWER'>" . $row['ANSWERS'] . "</td>";
	}
	if (isset($_POST["KNOWLEDGE"]) && !empty($_POST["KNOWLEDGE"])) {
	echo "<td class='KNOWLEDGE'>" . $row['KNOWLEDGE'] . "</td>";
	}
	 if (isset($_POST["STATUS"]) && !empty($_POST["STATUS"])) {
	if($row['STATUS']=="solved")
  {
  echo "<td class='STATUS' title='Solved'><img src='greentick.png'></td>";
  }
  else{
  echo "<td class='STATUS' title='Unsolved'><img src='redcross.png'></td>";
  }
  }
  if (isset($_POST["DATE"]) && !empty($_POST["DATE"])) {
  echo "<td class='DATE'>" . $row['DATE'] . "</td>";
  }
  echo "</tr>";
}
echo "</table>";

echo "<div style='position:absolute;top:130px;left:1090px;'>Total number of RESULT = $count</div>";


                        // SETTING UP PAGING





mysql_close($con);
?>
</div>
</div>
</body>
</html>