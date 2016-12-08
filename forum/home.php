<!DOCTYPE html>
<head>
      <title>ISSUES-ADMIN</title>
      <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
      <link type="text/css" rel="stylesheet" href="home.css">
	  <script>
	  $(window).load(function(){
	   $("#wrapper").animate({"top":"150px"},{duration:500,queue:true});
	  $("#wrappershadow").animate({"top":"140px"},{duration:420,queue:true});
	  
	  });
	  
	  
	  </script>
	  
</head>	  

<body>

<div id="wrappershadow"></div>

<div id="wrapper">

  <div id="logo"><img src="ongclogo.png"></div>
   <div id="logo1"><img src="issuehome.png" width="300"></div>
   <div id="menu">
      <div id="submit" class="shadow1"><a href="issue.php"><img src="submit.png"></a></div>
	  <div id="issues" class="shadow2"><a href="index.php"><img src="issues.png"></a></div>
	  <div id="admin" class="shadow3"><a href="adminlogin.php"><img src="admin.png"></a></div>
   

   </div>

</div>


</body>

</html>