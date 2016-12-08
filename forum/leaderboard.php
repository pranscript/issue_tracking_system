<!DOCTYPE html>
<head>
      <title>ISSUES</title>
      <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
      <link type="text/css" rel="stylesheet" href="leaderboardcss.css">
	  
<script type="text/javascript">

   $(window).load(function(){
   
       result(1,0);                                                 // Default ** shows all issues order by I_D in descending order
       $("#1").animate({"height":"30px"},{duration:100,queue:true});
       
   });
   
   $(document).ready(function(){
   
   $("#1").click(function(){                                                 // functions managing the transitions of the menubar
	   
          $(".menu").animate({"height":"20px"},{duration:100,queue:true});
          $("#1").animate({"height":"30px"},{duration:100,queue:true});
	      //$(".animate").css({display:"none"},{duration:100,queue:true});
          //$("#showallhidden").css({display:"block"},{duration:100,queue:true});
	   });
	   
	   $("#2").click(function(){                                                 // functions managing the transitions of the menubar
	   
          $(".menu").animate({"height":"20px"},{duration:100,queue:true});
          $("#2").animate({"height":"30px"},{duration:100,queue:true});
	      //$(".animate").css({display:"none"},{duration:100,queue:true});
          //$("#showallhidden").css({display:"block"},{duration:100,queue:true});
	   });
	   
	   $("#3").click(function(){                                                 // functions managing the transitions of the menubar
	   
          $(".menu").animate({"height":"20px"},{duration:100,queue:true});
          $("#3").animate({"height":"30px"},{duration:100,queue:true});
	      //$(".animate").css({display:"none"},{duration:100,queue:true});
          //$("#showallhidden").css({display:"block"},{duration:100,queue:true});
	   });
   
   });
   
</script>

<script type="text/javascript">
 function result(str1,str2) {                                                 // Displays only unsolved issues
   var value=str1;
   var page=str2;
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
  xmlhttp.open("GET","leaderboardresult.php?q="+str1+"&r="+str2,true);
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
  
  
    <div id="menu">
	<div id="1" class="menu" onclick="result(1,0)">Most issues asked</div>
	<div id="2" class="menu" onclick="result(2,0)">Most Answers Given</div>
	<div id="3" class="menu" onclick="result(3,0)">Most Knowledgeable Issues </div>
	
	</div>
   <div id="result">
 

                     <!--  Results by ajax calls are shown inside this div    -->
   <div id="txtHint"><b>Person info will be listed here.</b></div>



</div>



</div>

</body>

</html>