<?php
	
	$host="localhost"; 
	$username="naga"; 
	$password="password"; 
	$db_name="se"; 
	$tbl_name="sd"; 

	$usn=$_GET['usn'];
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$sem=$_GET['sem'];
	$cls=$_GET['cls'];
	$addr=$_GET['addr'];
	$phno=$_GET['phno'];
	$mob=$_GET['mob'];
	$email=$_GET['email'];
		
	$con=mysql_connect("$host", "$username", "$password") or die("cannot connect to db"); 
	mysql_select_db("$db_name",$con) or die("cannot select DB");
		
	$sql=" INSERT INTO sd VALUES('$usn','$fname','$lname','$sem','$cls','$addr','$phno','$mob','$email') ";
	
	if (!mysql_query($sql,$con))
	{
		die('Error in query: ' . mysql_error());
	}
	else
	{
		echo "Value inserted";
		mysql_close($con);
		header('location:index.html');
	}
	
?>