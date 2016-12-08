<!DOCTYPE html>
<head>
      <title>ISSUES</title>
      <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
      <link type="text/css" rel="stylesheet" href="indexcss.css">
	  
<script type="text/javascript">

   $(window).load(function(){
   
       showresult("DESC","SHOWALL",0);                                                 // Default ** shows all issues order by I_D in descending order
   
       $("#showall").animate({"height":"30px"},{duration:100,queue:true});
	   
       $("#showallhidden").css({display:"block"},{duration:100,queue:true});
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
  xmlhttp.open("GET","showresult.php?q="+str1+"&r="+str2+"&s="+page,true);
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
  xmlhttp.open("GET","showsolved.php?q="+str1+"&r="+str2+"&s="+page,true);
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
  xmlhttp.open("GET","showunsolved.php?q="+str1+"&r="+str2+"&s="+page,true);
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
  xmlhttp.open("GET","searchresult.php?q="+searchtext+"&r="+value+"&s="+page,true);
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
  
  

   <div id="result">
                                       <!-- Menu Bar  -->
   <div id="menuwrapper">
   
         <div id="showall"  title="Show All Issues" class="animate2" onclick='showresult("DESC","SHOWALL",0)'>Show all </div>

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
</div>


<br />

                     <!--  Results by ajax calls are shown inside this div    -->
<div id="txtHint"><b>Person info will be listed here.</b></div>



</div>



</div>

</body>

</html>