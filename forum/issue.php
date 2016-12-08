<?php
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
   echo "<script type='text/javascript' rel='javascript'>alert('".$message."');</script>";
   }
?>

<!DOCTYPE html>
<head>
<title>Submit Issue</title>
<script type="text/javascript" src="jquery-1.10.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="issuecss.css">
<script>
$(window).load(function(){

   showusername();                                                   // calls two functions onload ... determines the values of the drop-down
   showgroupname();
   
});

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
    }
  }
  xmlhttp.open("GET","showgroupname.php",false);
  xmlhttp.send();
}
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
    }
  }
  xmlhttp.open("GET","showusername.php",false);
  xmlhttp.send();
}

function addusernametooption(str) {                                          // adds username to the dropbox only on client side
 if (str !="")
 {
document.getElementsByName('addusername')[0].value="";
   var e = document.getElementById('username');
      e.options[0] = new Option(str);
   
   window.alert("Your Good Name '"+str+"' has been added to the list . You can choose your name now. ");
   }
}

function addgroupnametooption(str) {                                         // adds groupname to the dropbox only on client side
 if (str !="")
 {
document.getElementsByName('addgroupname')[0].value="";
   var e = document.getElementById('groupname');
      e.options[0] = new Option(str);
   
   window.alert("Your Group Name '"+str+"' has been added to the list . You can choose your group name now. ");
   }
}

</script>


</head>

<body>


<div id="bodywrapper">
                                <!--    HEADER     -->

    <div id="header" align="center">
    <div id="headerimg">  
       <img src="issuetrackimg.png">
     </div>
	 <div id="linktohome">
        <a href="home.php"><h4>Home</h4</a>
     </div>
     <div id="linktoissuepage">
        <a href="index.php"><h4>Issues</h4</a>
     </div>
	 <div id="linktosubmitissue">
           <a href="issue.php"><h4>Submit Issue</h4</a>
      </div>
     <div id="linktoadminlogin">
        <a href="adminlogin.php"><h4>Admin Login</h4></a>
     </div>
	 <div id="linktoleaderboard">
        <a href="leaderboard.php"><h4>Leaderboard</h4></a>
     </div>
   </div>
   
   
       <!--         FORM FIELD DIVS                -->
   
<div id="issuediv" align="center">
<h2>Add Issue</h2><br />
<p>In order to create an issue , you must fill in all the fields marked as asterik (<span color="#ff470f">*</span>)</p>

<div id="formdiv">
<form action="submit.php" method="post" enctype="multipart/form-data">

      <!--      COLUMN 1        -->
<ul id="formname">

<li>(<span>*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</li>
<li>(<span>*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Group </li>
<li>(<span style="color:black">*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</li>
<li>(<span>*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issue</li>
<li><br /><br />(<span style="color:black">*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detailed Description</li>
<li><br /><br /><br /><br /><br /><br /><br />(<span style="color:black">*</span>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please choose files: </li>

</ul>

        <!--        COLUMN 2      -->

<ul id="formfield">

<li>
    <select id="username" name="name" style="min-width:200px;">
         <option>Unknown</option>
    </select>
	<span> &nbsp;&nbsp;&nbsp;&nbsp;Name not found ..!!</span>
	<span> Add from here.&nbsp;</span>
	<input type="text" maxlength="20" name="addusername" size="16" >&nbsp;&nbsp;
	<input type="button" onclick="addusernametooption(document.getElementsByName('addusername')[0].value)" value="Add">
</li>

<li>
    <select id="groupname" name="groupname" style="min-width:200px;">
    <option>Unknown</option>
    </select>
	<span> &nbsp;&nbsp;&nbsp;&nbsp;Group not found ..!!</span>
	<span> Add from here.&nbsp;</span>
	<input type="text" maxlength="10" name="addgroupname" size="16">&nbsp;&nbsp;
	<input type="button" onclick="addgroupnametooption(document.getElementsByName('addgroupname')[0].value)" value="Add">
</li>

<li> 
<input type="password" size="40" maxlength="15" name="password">
<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Needed to mark an issue as 'solved' </span>
</li>

<li>
 <textarea rows="4" cols="50" name="issue" maxlength="300"></textarea>
 </li>
 
<li>
<textarea rows="10" cols="50" name="detailedissue"></textarea>
</li>

 <li>
<input name="files[]" type="file" multiple="multiple" />
 </li>
 
<li>
<input type="submit" value="Submit">
</li>


</ul>
</form>
</div>
</div>



</div>

</body>

</html>