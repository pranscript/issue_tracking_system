<html>
<head>

  <script type="text/javascript" src="jquery-1.10.1.min.js"></script>
      <link type="text/css" rel="stylesheet" href="indexcss.css">
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
	 <div id="result" style="width:500px;margin-top:50px;padding-bottom:50px;box-shadow:3px 15px 50px 1px lavender;-webkit-box-shadow:3px 15px 50px 1px lavender;-moz-box-shadow:3px 15px 50px 1px lavender;-ms-box-shadow:3px 15px 50px 1px lavender;">
<div id="form" style="background:;width:180px;margin:auto;margin-top:50px;">
<h2>ADMIN LOGIN</h2><br /><br />
<form action="checklogin.php" method="POST">
   Admin Name<br /><input type="text" maxlength="15" name="adminname"><br /><br />
   Password<br /><input type="password" maxlength="15" name="password"><br /><br />
   <input type="submit" value="submit">

</form>

</div>
</div>
</div>
</body>

</html>