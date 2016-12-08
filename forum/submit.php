<!DOCTYPE html>
<head>

</head>
<body>
<?php

if(!$_POST['name']=="" && !$_POST["groupname"]=="" && !$_POST["issue"]=="")
     {
require_once 'connection.php';

    
    $name=mysql_real_escape_string(strtolower($_POST['name']));
	$groupname=mysql_real_escape_string(strtolower($_POST['groupname']));
	$issue=mysql_real_escape_string($_POST["issue"]);
	$detailedissue=mysql_real_escape_string($_POST['detailedissue']);
	$password=mysql_real_escape_string($_POST['password']);
	$status='unsolved';
	
	
$sql = "INSERT INTO issues (NAME,GROUP_NAME,ISSUE,DETAILED_ISSUE,PASSWORD,STATUS,DATE) VALUES('".$name."','".$groupname."','".$issue."','".$detailedissue."','".$password."','".$status."',CURDATE())";

	$retval = mysql_query( $sql, $con );
	
	if($retval)
	{
	
	$temp = mysql_insert_id();
	                               
	
    
        if(isset($_FILES['files']) ){    
	$filelist="";
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	      if(!empty($_FILES['files']['tmp_name'][$key])){
		$file_name = uniqid($temp, true).$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        		
        
        $desired_dir="data";
        
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"data/".$file_name);
				$filelist.=$file_name.",,";
            }
           // mysql_query($query);			
        }
    
	}
	$query= "UPDATE issues SET FILES = '".$filelist."' WHERE I_D = '".$temp."'";
	$retval1 = mysql_query( $query, $con );
	if($retval1)
	{
	header('Refresh: 0.5; URL=issue.php');
		echo "<script type='text/javascript'>alert('Successfully Submitted the Issue');</script>";
		
	}
	else
	{
	header('Refresh: 0.5; URL=issue.php');
		echo "<script type='text/javascript'>alert('Could Not Enter the path of files uploaded');</script>";
	}
	}
}
	 //header("Location: issue.php?message=Successfully submitted your issue.");
     
	
	
	
   if(! $retval )
   {
      header('Refresh: 0.5; URL=issue.php');
		echo "<script type='text/javascript'>alert('Could Not Enter Data');</script>";
		
   }

mysql_close($con);

}

else
 { 
 header('Refresh: 0.5; URL=issue.php');
 echo "<script>alert('Fill The Mandatory Fields first marked as asterisk. ');</script>";
 
 //echo "<a href='issue.php' style='display:block;text-align:center;margin-top:200px;padding:20px;background:lavender'><h1>Move Back to Submit Issue</h1></a>";
		
}
?>
</body>
</html>