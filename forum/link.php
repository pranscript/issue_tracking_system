<DOCTYPE html>
<head>
<title>Issue</title>
<script src="jquery-1.10.1.min.js"></script>
<link type=text/css rel="stylesheet" href="linkcss.css">
</head>

<?php

$id=intval($_GET['a']);
require_once 'connection.php';
$sql="";
?>
<script>
/*var str1="",str2="",str3="",str4="",str5="";*/
/*function showans() {
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("row2").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","answer.php",false);
  xmlhttp.send();
}*/
function showissue() {
 var q = "<?php echo "$id"; ?>";
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("showissue").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showissue.php?q="+q,false);
  xmlhttp.send();
}


function issuevoteup() {
    var q = "<?php echo "$id"; ?>";
	$(".hidevote").css("z-index","-1");
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("vt").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","issuevoteup.php?q="+q,false);
  xmlhttp.send();
  
}


function issuevotedown() {
    var q = "<?php echo "$id"; ?>";
	$(".hidevote").css("z-index","-1");
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("vt").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","issuevotedown.php?q="+q,false);
  xmlhttp.send();
  
}


function voteup(str1,str2,str3) {
    
	/*$votedownid="#votedown"+str1;
	$(str3).css("display", "none");
	$($votedownid).css("display", "none");*/
	$votefieldid="votefield"+str1;
	$(str3).css("z-index","-1");
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById($votefieldid).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","voteup.php?q="+str1+"&r="+str2,false);
  xmlhttp.send();
  
}

function votedown(str1,str2,str3) {
    /*$voteupid="#voteup"+str1;
	$(str3).css("display", "none");
	$($voteupid).css("display", "none");*/
	$id="votefield"+str1;
	$(str3).css("z-index","-1");
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById($id).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","votedown.php?q="+str1+"&r="+str2,false);
  xmlhttp.send();
  
}

function knowledgeup()
{
$("#blksmstar").css("z-index","-1");
var q = "<?php echo "$id"; ?>";
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("knw").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","knowledgeup.php?q="+q,false);
  xmlhttp.send();

}
function markstatus(){
  var q = "<?php echo "$id"; ?>";
  var input= prompt('Please enter the password');
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("changestatus").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","changestatus.php?q="+q+"&r="+input,false);
  xmlhttp.send();

}

function markstatus1(){
  var q = "<?php echo "$id"; ?>";
  var input= "";
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("changestatus").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","changestatus.php?q="+q+"&r="+input,false);
  xmlhttp.send();

}
</script>
<script>
   $(document).ready(function(){
   var i=0;
    $("#addcomment h5").click(function(){
	if(i==0)
	{
    $("#addcomment").animate({"height":"110px"},{duration:600,queue:true});
	i++;
	}
	else
	{
	$("#addcomment").animate({"height":"20px"},{duration:800,queue:true});
	i--;
	}
	});
	$("#voteup").click(function(){
	$("#voteup").animate({"height":"20px"});
	});
	});
</script>

<body>

<div id="bodywrapper">
<div id="header" align="center">
<div id="headerimg">  
  <img src="issuetrackimg.png">
</div>
<div id="linktohome">
<a href="home.php"><h4>Home</h4</a>
</div>
<div id="linktosubmitissue">
<a href="issue.php"><h4>Submit Issue</h4</a>
</div>
<div id="linktoissuepage">
<a href="index.php"><h4>Issues</h4</a>
</div>
<div id="linktoadminlogin">
<a href="adminlogin.php"><h4>Admin Login</h4></a>
</div>
<div id="linktoleaderboard">
        <a href="leaderboard.php"><h4>Leaderboard</h4></a>
     </div>
</div>
<div id="result">
   
    <div id="row1">
	
	<div id="column1">
     
	 <div id="issue_votes_wrapper" style="width:200px;height:80px;background:#e6f0e1;border-bottom-left-radius:30px;border-top-right-radius:30px;">
	 <img src="upnew.png" style="position:absolute;cursor:pointer;z-index:2" onclick="issuevoteup()" class="hidevote" />
	 <img src="up.png" style="position:absolute;z-index:1;" />
	 <div id="issue_votes" style="position:absolute;top:25px;width:200px;text-align:center;z-index:2;"><span style="font-family:arial;font-size:22px;">
	 <?php    
		   $sql="SELECT VOTES FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo "<span id='vt'>".htmlspecialchars($row['VOTES'])."</span>";
           }
		   ?></span>
		   </div>
		   <img src="downnew.png" style="display:block;margin-left:100px;position:absolute;top:40px;cursor:pointer;z-index:2;" onclick="issuevotedown()" class="hidevote" />
		   <img src="down.png" style="display:block;margin-left:100px;position:absolute;top:40px;z-index:1;"/>
		   </div>
		   <!--<div id="issue_answers">
		   <?php    
		   $sql="SELECT ANSWERS FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo htmlspecialchars($row['ANSWERS']);
           }
		   ?>
		   </div>-->
		   <br />
		   <div id="issue_knowledge_wrapper" style="background:;text-align:center;height:;">
		   <div id="starimg" style="">
		   <img src="blksmstar.png" id="blksmstar" title="Mark this useful" style="position:absolute;z-index:2;cursor:pointer;" onclick="knowledgeup()" />
		   <img src="smstar.png" style="z-index:1;" />
		   </div>
		   <div id="issue_knowledge" style="height:;margin-top:10px;background:;">
		   <?php    
		   $sql="SELECT KNOWLEDGE FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo "<span id='knw'>".htmlspecialchars($row['KNOWLEDGE'])."</span><br /> <span style='font-size:11px'>people found this <br />knowledgeable</span>";
           }
		   ?>
		   </div>
		   </div>
		   <div id="changestatus" style="background:;height:60px;width:200px;margin-top:20px;">
		   <?php    
		   $sql="SELECT STATUS FROM issues WHERE I_D = '".$id."'";
		   $sql1="SELECT PASSWORD FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }
           $result1 = mysql_query($sql1);
           if (!$result1) { // add this check.
           die('Invalid query: ' . mysql_error());
           }
		   while($row1 = mysql_fetch_assoc($result1)) {
		      if($row1['PASSWORD']!="")
			  {
           while($row = mysql_fetch_assoc($result)) {
             if($row['STATUS']=="solved")
			 {
           echo "<img src='greentick.png' title='solved' style='display:block;background:;margin-left:95px;'><br />";
		   echo "<div onclick='markstatus()' style='cursor:pointer;width:115px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it unsolved</div>";
           }
		   else if($row['STATUS']=="unsolved")
		   {
		  echo "<img src='redcross.png' title='unsolved' style='display:block;background:;margin-left:93px;'><br />";
		   echo "<div onclick='markstatus()' style='cursor:pointer;width:100px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it solved</div>";
		   }
		   }
		   }
		   else
		   {
		   while($row = mysql_fetch_assoc($result)) {
             if($row['STATUS']=="solved")
			 {
           echo "<img src='greentick.png' title='solved' style='display:block;background:;margin-left:95px;'><br />";
		   echo "<div onclick='markstatus1()' style='cursor:pointer;width:115px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it unsolved</div>";
           }
		   else if($row['STATUS']=="unsolved")
		   {
		  echo "<img src='redcross.png' title='unsolved' style='display:block;background:;margin-left:93px;'><br />";
		   echo "<div onclick='markstatus1()' style='cursor:pointer;width:100px;margin:auto;text-align:center;border:1px solid grey;box-shadow:0px 0px 3px 1px grey inset;'>Mark it solved</div>";
		   }
		   }
		   }
		   }
		   ?>
		   <div id="stat"></div>
		   </div>
   </div>
   <div id="column2">
       <div id="issue">
	       <span>Ques.</span><div id='showissue' style="width:1000px;background:;"><h3>
		   <?php    
		   $sql="SELECT ISSUE FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo nl2br(htmlspecialchars($row['ISSUE']));
           }
		   ?>
		   
		   </h3></div>
		   </div>
		   <div id='detailedissue'>
	       <p>
		   <?php    
		   $sql="SELECT DETAILED_ISSUE FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo "<span style='font-size:18px;'>".nl2br(htmlspecialchars($row['DETAILED_ISSUE']))."</span>";
           }
		   ?>
		   
		   </p>
		   </div>
		   <div id="attachment">
		   <?php    
		   $sql="SELECT FILES FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           $files = explode(",,", $row['FILES']);
           for($i = 0; $i < count($files)-1; $i++){
           echo "<span style='font-size:13px;'><a href='data/$files[$i]' target='_blank' style='color:#0000CD;'>File ".($i+1)." </a></span> <br />";
           }
           }
		   ?>
		   
		   
		   
		   </div>
		<div id="asked" >
		<span style="font-size:13px;">asked by</span>
		<span style="display:block;width:200px;text-align:center;background:;">
		<?php    
		   $sql="SELECT NAME FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo htmlspecialchars($row['NAME']);
           }
		   ?>
		   
		   </span>
		   <!--<span style="display:block;width:200px;text-align:center;margin-top:5px;">
		   <?php    
		   $sql="SELECT GROUP_NAME FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo htmlspecialchars($row['GROUP_NAME']);
           }
		   ?>
		   </span>-->
		    <span style="display:block;width:200px;text-align:center;margin-top:5px;">
		   <?php    
		   $sql="SELECT DATE FROM issues WHERE I_D = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           echo htmlspecialchars($row['DATE']);
           }
		   ?>
		   </span>
		</div>
		<div id="addcomment">
		    <h5>Add Comment</h5><br />
			<form action="addcomment.php?issueid=<?php echo "$id" ; ?>" method="post">
			<textarea rows="3" cols="50" name="addcomment"></textarea>
			<br />
			<input type="submit" value="submit" >
			</form>
		</div>
		<div id="previouscomment">
		<?php    
		   $sql="SELECT COMMENT FROM comments WHERE ISSUE_ID = '".$id."'";
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {
           echo "<div style='margin-bottom:3px;background:#f5fafa;padding:1px 10px;font-size:13px;'>";
           echo nl2br(htmlspecialchars($row['COMMENT']));
		   echo "</div>";
           }
		   ?>
		</div>
		
   </div>
  
	</div>
	<div id="row2">
	
	
	<?php    
		   $sql="SELECT * FROM answers WHERE ISSUE_ID = '".$id."' ORDER BY VOTES DESC" ;
		   $result = mysql_query($sql);
           if (!$result) { // add this check.
           die('Invalid query: ' . mysql_error());
           }

           while($row = mysql_fetch_assoc($result)) {

           $votefieldid="votefield".$row['ANS_I_D'];
  $voteupid="voteup".$row['ANS_I_D'];
  $votedownid="votedown".$row['ANS_I_D'];
  echo "<div class='table'>";
  echo "<div><img src='up.png' style='position:absolute;z-index:1;'/><span class='voteup' onclick='voteup(".$row['ANS_I_D'].",".$row['VOTES'].",$(this))'><img src='upnew.png' class='".$voteupid."' style='position:absolute;z-index:2;cursor:pointer'/></span><h3 class='votefield' id='".$votefieldid."'>" . $row['VOTES'] . "</h3><span class='votedown' onclick='votedown(".$row['ANS_I_D'].",".$row['VOTES'].",$(this))'><img src='down.png' style='position:absolute;z-index:1;'/><img src='downnew.png' class='".$votedownid."' style='position:absolute;z-index:2;cursor:pointer'/></span><img src='down.png' style='position:absolute;top:35px;left:100px;z-index:1;'/></div>";
   echo "<div></div>";
   echo "<div><span>Ans.</span><br /><span style='font-size:18px;'>" . nl2br(htmlspecialchars($row['ANSWER'])) . "</span></div>";
   
	echo "<div id='answered' ><span style='font-size:13px;font-family:seoge'>answered by</span><span style='display:block;width:200px;text-align:center;background:;font-family:seoge;'> ". htmlspecialchars($row['ANSWEREDBY']) . "<br />" . $row['DATE'] . "</span></div>";
  echo "<br /></div>";
           }
		   ?>
	</div>
	<div id="insertanswer">
	<div>
	<h3>Add Answer</h3><br />
	<form action="submitanswer.php?issueid=<?php echo "$id" ; ?>" method="post">
	Answered by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="30" name="answeredby"><br /><br />
	<textarea rows="12" cols="100" name="answer"></textarea>
			<br />
			<input type="submit" value="submit" name="submitanswer">
	
	</form>
	</div>
	</div>
	
</div>

</div>
</body>


</html>





















