<?php 
session_start();
if(!isset($_SESSION['admin_login']))
{
header("Location: adminlogin.php");
}
?>

<!DOCTYPE html>
<head>
      <title>ISSUES-ADMIN</title>
      <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
      <link type="text/css" rel="stylesheet" href="admin_indexcss.css">
	  
<script type="text/javascript">

   $(window).load(function(){
        showusername();
		showgroupname();
       showresult("DESC","SHOWALL",0);                                               // Default ** shows all issues order by I_D in descending order
    
       $("#showall").animate({"height":"30px"},{duration:100,queue:true});
	   
       $("#showallhidden").css({display:"block"},{duration:100,queue:true});
	   
	   $("#querybutton").animate({"height":"30px"},{duration:100,queue:true});
   });
   
   $(document).ready(function(){
   
       $("#showall").click(function(){                                                 // functions managing the transitions of the menubar
	   
          $(".animate2").animate({"height":"20px"},{duration:100,queue:true});
          $("#showall").animate({"height":"30px"},{duration:100,queue:true});
	      $(".animate").css({display:"none"},{duration:100,queue:true});
          $("#showallhidden").css({display:"block"},{duration:100,queue:true});
	   });
	  
	   $("#solved").click(function(){
	   
	      $(".animate2").animate({"height":"20px"},{duration:100,queue:true});
	      $("#solved").animate({"height":"30px"},{duration:100,queue:true});
          $(".animate").css({display:"none"},{duration:100,queue:true});
          $("#solvedhidden").css({display:"block"},{duration:100,queue:true});
	   });
	   
	   $("#unsolved").click(function(){
	   
	      $(".animate2").animate({"height":"20px"},{duration:100,queue:true});
	      $("#unsolved").animate({"height":"30px"},{duration:100,queue:true});
	      $(".animate").css({display:"none"},{duration:100,queue:true});
          $("#unsolvedhidden").css({display:"block"},{duration:100,queue:true});
	  });
	  
	  $("#querybutton").click(function(){
	   
	      $("#graphbutton").animate({"height":"20px"},{duration:100,queue:true});
	      $("#querybutton").animate({"height":"30px"},{duration:100,queue:true});
	      $("#graph").css({display:"none"},{duration:100,queue:true});
          $("#query").css({display:"block"},{duration:100,queue:true});
	  });
	  
	  $("#graphbutton").click(function(){
	   
	      $("#querybutton").animate({"height":"20px"},{duration:100,queue:true});
	      $("#graphbutton").animate({"height":"30px"},{duration:100,queue:true});
	      $("#query").css({display:"none"},{duration:100,queue:true});
          $("#graph").css({display:"block"},{duration:100,queue:true});
	  });
	  
	
    });  
</script>

<script type="text/javascript">                                                      // all the ajax calls 

	  function showresult(str1,str2,str3) {                                          // displays all issues with parameters ORDER , SHOWALL, PAGE.NO = 0
   var page=str3;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","admin_showresult.php?q="+str1+"&r="+str2+"&s="+page,true);
  xmlhttp.send();
  }

  
  function showsolved(str1,str2,str3) {                                               // Displays only solved issues
  var page=str3;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","admin_showsolved.php?q="+str1+"&r="+str2+"&s="+page,true);
  xmlhttp.send();
}


  function showunsolved(str1,str2,str3) {                                                 // Displays only unsolved issues
   var page=str3;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","admin_showunsolved.php?q="+str1+"&r="+str2+"&s="+page,true);
  xmlhttp.send();
}


  function search(str1,str2){                                                                     // Displays Search results with parameter as the text to be searched
    var searchtext = str1;
	var page=str2;
	var value ;
	document.getElementById('searchfield').value="";
	if(document.getElementById('id_radio').checked) {
     value = document.getElementById('id_radio').value;
    }
	else if(document.getElementById('name_radio').checked) {
     value = document.getElementById('name_radio').value;
    }else if(document.getElementById('group_radio').checked) {
     value = document.getElementById('group_radio').value;
    }
	else if(document.getElementById('issue_radio').checked) {
     value = document.getElementById('issue_radio').value;
    }
	else{
	value="";
	}
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","admin_searchresult.php?q="+searchtext+"&r="+value+"&s="+page,true);
  xmlhttp.send();

  }
 
	
  </script>

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





   <div id="result">
                                       <!-- Menu Bar  -->
   <div id="menuwrapper">
   
         <div id="showall" title="Show All Issues" class="animate2" onclick='showresult("DESC","SHOWALL",0)'>Show all </div>

         <div id="solved" title="Show Only Solved Issues" class="animate2" onclick='showsolved("DESC","SOLVED",0)'>Solved</div>

         <div id="unsolved" title="Show Only Unsolved Issues" class="animate2" onclick='showunsolved("DESC","UNSOLVED",0)'>Unsolved</div>

         <div id="search_div" class="" >

            <h4>Search by</h4><br />
            <input type="radio" value="I_D" name="search" id="id_radio" checked>&nbsp;I.D&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="NAME" name="search" id="name_radio">&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="GROUP_NAME" name="search" id="group_radio">&nbsp;Group&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" value="ISSUE" name="search" id="issue_radio">&nbsp;Issue<br />
            <input type="text" size="40" name="searchfield" id="searchfield">
            <input type="button" value="search" onclick="search(document.getElementsByName('searchfield')[0].value,0)">


         </div>

         <div id="showallhidden" class="animate">
		 
             <span>
			   <div>I.D</div>
			   <div class="img">
			      <img class="uptrans" onclick='showresult("DESC","ID")' src="uptrans.png" width="18" height="11">
                  <img class="downtrans" onclick='showresult("ASC","ID")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
             <span>
			    <div>Votes</div>
				<div>
				   <img class="uptrans" onclick='showresult("DESC","VOTES")' src="uptrans.png" width="18" height="11">
                   <img class="downtrans" onclick='showresult("ASC","VOTES")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
              <span>
			  <div>Answer</div>
			  <div>
			        <img class="uptrans" onclick='showresult("DESC","ANSWER")' src="uptrans.png" width="18" height="11">
                    <img class="downtrans" onclick='showresult("ASC","ANSWER")'  src="downtrans.png" width="18" height="11">
			  </div>
			</span>
               <span>
			   <div>Knowledge</div>
			   <div>
			        <img class="uptrans" onclick='showresult("DESC","KNOWLEDGE")' src="uptrans.png" width="18" height="11">
                    <img class="downtrans" onclick='showresult("ASC","KNOWLEDGE")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                <span>
				<div>Date</div>
				<div>
				     <img class="uptrans" onclick='showresult("DESC","DATE")' src="uptrans.png" width="18" height="11">
                     <img class="downtrans" onclick='showresult("ASC","DATE")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                <div id="count"></div>
         </div>


         <div id="solvedhidden" class="animate">
                 <span>
				 <div>I.D</div>
				 <div>
				     <img class="uptrans" onclick='showsolved("DESC","ID")' src="uptrans.png" width="18" height="11">
                     <img class="downtrans" onclick='showsolved("ASC","ID")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                  <span>
				  <div>Votes</div>
				  <div>
				       <img class="uptrans" onclick='showsolved("DESC","VOTES")' src="uptrans.png" width="18" height="11">
                       <img class="downtrans" onclick='showsolved("ASC","VOTES")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                   <span>
				   <div>Answer</div>
				   <div>
				        <img class="uptrans" onclick='showsolved("DESC","ANSWER")' src="uptrans.png" width="18" height="11">
                        <img class="downtrans" onclick='showsolved("ASC","ANSWER")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                   <span>
				   <div>Knowledge</div>
				   <div>
				         <img class="uptrans" onclick='showsolved("DESC","KNOWLEDGE")' src="uptrans.png" width="18" height="11">
                         <img class="downtrans" onclick='showsolved("ASC","KNOWLEDGE")' src="downtrans.png" width="18" height="11">
				</div>
			</span>
                    <span>
					<div>Date</div>
					<div>
					     <img class="uptrans" onclick='showsolved("DESC","DATE")' src="uptrans.png" width="18" height="11">
                         <img class="downtrans" onclick='showsolved("ASC","DATE")' src="downtrans.png" width="18" height="11">
				</div>
			</span>

        </div>


<div id="unsolvedhidden" class="animate">
<span><div>I.D</div><div><img class="uptrans" onclick='showunsolved("DESC","ID")' src="uptrans.png" width="18" height="11">
<img class="downtrans" onclick='showunsolved("ASC","ID")' src="downtrans.png" width="18" height="11"></div></span>
<span><div>Votes</div><div><img class="uptrans" onclick='showunsolved("DESC","VOTES")' src="uptrans.png" width="18" height="11">
<img class="downtrans" onclick='showunsolved("ASC","VOTES")' src="downtrans.png" width="18" height="11"></div></span>
<span><div>Answer</div><div><img class="uptrans" onclick='showunsolved("DESC","ANSWER")' src="uptrans.png" width="18" height="11">
<img class="downtrans" onclick='showunsolved("ASC","ANSWER")' src="downtrans.png" width="18" height="11"></div></span>
<span><div>Knowledge</div><div><img class="uptrans" onclick='showunsolved("DESC","KNOWLEDGE")' src="uptrans.png" width="18" height="11">
<img class="downtrans" onclick='showunsolved("ASC","KNOWLEDGE")' src="downtrans.png" width="18" height="11"></div></span>
<span><div>Date</div><div><img class="uptrans" onclick='showunsolved("DESC","DATE")' src="uptrans.png" width="18" height="11">
<img class="downtrans" onclick='showunsolved("ASC","DATE")' src="downtrans.png" width="18" height="11"></div></span>

</div>
<div id="multiquery">
<div id="querybutton" class="multiple">Query</div>
<div id="graphbutton" class="multiple">Graph</div>
</div>
  <div id="query">
  <form method="POST" action="admin_query.php">
     <div id="select">
	 <h4>Select Field</h4>
	 
	 <ul>
	 <li><input type="checkbox" value="I_D"  name="I_D" checked>&nbsp;&nbsp;&nbsp;I_D</li>
	 <li><input type="checkbox" value="NAME" name="NAME" checked>&nbsp;&nbsp;&nbsp;Name</li>
	 <li><input type="checkbox" value="GROUP_NAME" name="GROUP_NAME" checked>&nbsp;&nbsp;&nbsp;Group Name</li>
	 <li><input type="checkbox" value="ISSUES" name="ISSUES" checked>&nbsp;&nbsp;&nbsp;Issue</li>
	 <li><input type="checkbox" value="VOTES" name="VOTES" checked>&nbsp;&nbsp;&nbsp;Votes</li>
	 <li><input type="checkbox" value="ANSWER" name="ANSWER" checked>&nbsp;&nbsp;&nbsp;Answers</li>
	 <li><input type="checkbox" value="KNOWLEDGE" name="KNOWLEDGE" checked>&nbsp;&nbsp;&nbsp;Knowledge</li>
	 <li><input type="checkbox" value="STATUS" name="STATUS" checked>&nbsp;&nbsp;&nbsp;Status</li>
	 <li><input type="checkbox" value="DATE" name="DATE" checked>&nbsp;&nbsp;&nbsp;Date</li>
	 </ul>
	 
	
	 </div>

	 
	 <div id="where">
	 <h4>Where</h4>
	 <ul>
	 <li>I_D&nbsp;&nbsp;&nbsp; <input type="number" name="id1" id="id1" min="1"  max="<?php echo $numissue; ?>">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp; 
	 <input type="number" name="id2" min="1"  max="<?php echo $numissue; ?>"></li>
	 <li>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="username" name="username" style="min-width:200px;">
         <option>Unknown</option>
    </select></li>
	 <li>Group Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="groupname" name="groupname" style="min-width:200px;">
    <option>Unknown</option>
    </select></li>
	 <li>Issue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="28" name="issue" id="issue"></li>
	 <li>Votes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="votes1" min="-10000" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="votes2" min="-10000" max="10000" value=""></li>
	 <li>Answers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="answers1" min="-10000" size="20" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="answers2" min="-10000" max="10000" value=""></li>
	 <li>Knowledge&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="knowledge1" min="-10000" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="knowledge2" min="-10000" max="10000" value=""></li>
	 <li>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="status" name="status" style="min-width:100px;">
         <option></option>
		 <option>solved</option>
		 <option>unsolved</option>
    </select></li>
	 <li>Date&nbsp;&nbsp;&nbsp;<input type="date"  placeholder="dd/mm/yyyy" name="date1">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;<input type="date"  placeholder="dd/mm/yyyy"  name="date2"></li>
	 </ul>
	 </div>
	 
	 <div id="orderby">
	 <h4>Order By</h4>
	 <ul>
	 <li><input type="radio" name="orderby" value="I_D" checked>&nbsp;&nbsp;&nbsp;I_D</li>
	 <li><input type="radio" name="orderby" value="NAME">&nbsp;&nbsp;&nbsp;Name</li>
	 <li><input type="radio" name="orderby" value="GROUP_NAME">&nbsp;&nbsp;&nbsp;Group Name</li>
	 <li><input type="radio" name="orderby" value="VOTES">&nbsp;&nbsp;&nbsp;Votes</li>
	 <li><input type="radio" name="orderby" value="ANSWERs">&nbsp;&nbsp;&nbsp;Answers</li>
	 <li><input type="radio" name="orderby" value="KNOWLEDGE">&nbsp;&nbsp;&nbsp;Knowledge</li>
	 <li><input type="radio" name="orderby" value="STATUS">&nbsp;&nbsp;&nbsp;Status</li>
	 <li><input type="radio" name="orderby" value="DATE">&nbsp;&nbsp;&nbsp;Date</li>
	 </ul>
	 </div>
	 
	 <div id="ascdesc">
	 <h4>Asc / Desc</h4>
	 <ul>
	 <li><input type="radio" name="ascdesc" value="ASC" checked>&nbsp;&nbsp;&nbsp;ASC</li>
	 <li><input type="radio" name="ascdesc" value="DESC">&nbsp;&nbsp;&nbsp;DESC</li>
	 </ul>
	 </div>
	 <input type="submit" value="submit" id="submit1">
	 </form>
</div>

<div id="graph">
<form method="POST" action="admin_graph.php">
<div id="field">
	 <h4>Field</h4><br />
	<select name="field">
	<option>NAME</option>
	<option>GROUP_NAME</option>
	<option>VOTES</option>
	<option>ANSWERS</option>
	<option>KNOWLEDGE</option>
	<option>STATUS</option>
	<option>DATE</option>
	
	</select>
	 </div>
	 <div id="graphwhere">
	 <h4>Where</h4>
	 <ul>
	 <li>I_D&nbsp;&nbsp;&nbsp; <input type="number" name="id1" id="id1" min="1"  max="<?php echo $numissue; ?>">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="id2" min="1"  max="<?php echo $numissue; ?>"></li>
	 <li>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="username1" name="username" style="min-width:200px;">
         <option>Unknown</option>
    </select></li>
	 <li>Group Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="groupname1" name="groupname" style="min-width:200px;">
    <option>Unknown</option>
    </select></li>
	 <li>Issue&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="28" name="issue" id="issue"></li>
	 <li>Votes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="votes1" min="-10000" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="votes2" min="-10000" max="10000" value=""></li>
	 <li>Answers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="answers1" min="-10000" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="answers2" min="-10000" max="10000" value=""></li>
	 <li>Knowledge&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="knowledge1" min="-10000" max="10000" value="">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;
	 <input type="number" name="knowledge2" min="-10000" max="10000" value=""></li>
	 <li>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="status" name="status" style="min-width:100px;">
         <option></option>
		 <option>solved</option>
		 <option>unsolved</option>
    </select></li>
	<li>Date&nbsp;&nbsp;&nbsp;<input type="date"  placeholder="dd/mm/yyyy"  name="date1">&nbsp;&nbsp;&nbsp; to&nbsp;&nbsp;&nbsp;<input type="date"  placeholder="dd/mm/yyyy"  name="date2"></li>
	 </ul>
	 </div>
	 
	 <input type="submit" value="submit" id="submit2">
</form>
</div>
  
</div>
<?php 

/*$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'speak1234';
$db = 'forum';
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con) {
  die('Could not connect: ' . mysql_error($con));
}

mysql_select_db($db,$con);
$sql1 = "SELECT ";
$sql2="";
$sql3=" FROM issues";
       if (isset($_POST["I_D"]) && !empty($_POST["I_D"])) {
	     $sql2.="I_D,";
	   }
	   if (isset($_POST["NAME"]) && !empty($_POST["NAME"])) {
	     $sql2.="NAME,";
	   }
	   if (isset($_POST["GROUP_NAME"]) && !empty($_POST["GROUP_NAME"])) {
	     $sql2.="GROUP_NAME,";
	   }
	   if (isset($_POST["ISSUES"]) && !empty($_POST["ISSUES"])) {
	     $sql2.="ISSUES,";
	   }
	   if (isset($_POST["VOTES"]) && !empty($_POST["VOTES"])) {
	     $sql2.="VOTES,";
	   }
	   if (isset($_POST["ANSWER"]) && !empty($_POST["ANSWER"])) {
	     $sql2.="ANSWERS,";
	   }
	   if (isset($_POST["KNOWLEDGE"]) && !empty($_POST["KNOWLEDGE"])) {
	     $sql2.="KNOWLEDGE,";
	   }
	   if (isset($_POST["STATUS"]) && !empty($_POST["STATUS"])) {
	     $sql2.="STATUS,";
	   }
	   if (isset($_POST["DATE"]) && !empty($_POST["DATE"])) {
	     $sql2.="DATE,";
	   }
	  $sql2= substr($sql2, 0, -1);
$sql= $sql1.$sql2.$sql3;

$sqlcount="SELECT COUNT(I_D) AS num FROM issues ";



$resultcount = mysql_query($sqlcount);
if (!$resultcount) { // add this check.
    die('Invalid query: ' . mysql_error());
}


$count = mysql_fetch_assoc($resultcount);
$numissue = $count['num'];

*/

?>
<script>
function showusername() {                                               // ajax call to determine the username from the database
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("username").innerHTML=xmlhttp.responseText;
	  document.getElementById("username1").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showusername.php",false);
  xmlhttp.send();
}

function showgroupname() {                                           // ajax call to determine the groupname from the database
 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("groupname").innerHTML=xmlhttp.responseText;
	  document.getElementById("groupname1").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showgroupname.php",false);
  xmlhttp.send();
}
</script>

<br />

                     <!--  Results by ajax calls are shown inside this div    -->
<div id="txtHint"><b>Person info will be listed here.</b></div>



</div>



</div>

</body>

</html>