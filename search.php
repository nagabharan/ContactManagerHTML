<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Contacts</title>
      <link href="styles/style2.css" rel="stylesheet" type="text/css" />
      <style type="text/css">
         .auto-style9 {
         font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
         }
         .auto-style5 {
         font-size: large;
         }
      </style>
   </head>
   <body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
      <div id="container" />
      <div id="masthead">
         <h1>CONTACT MANAGEMENT</h1>
      </div>
      <span class="auto-style9" />
      <div id="navigation" style="left: 0px; top: 0px; height: 250px">
         <ul>
            <li class="auto-style5"><a href="index.html">Home</a></li>
            <li><a href="about.html"><span class="auto-style5">About</span></a></li>
            <li><a href="contact.html"><span class="auto-style5">Contact</span></a></li>
            <li><a href="insert.html"><span class="auto-style5">Insert</span></a></li>
            <li><a href="display.php"><span class="auto-style5">Display</span></a></li>
            <li><a href="search.php"><span class="auto-style5">Search</span></a></li>
         </ul>
      </div>
      <div id="content">
         <form action="search.php" method="post" name="exchanges" id="exchanges" />
         <select name="exchange" id="exchange" onclick="searchIt()" onblur="searchIt()">
            <option value="select" selected="selected">Select Search Field</option>
            <option value="usn">USN</option>
            <option value="fname">First Name</option>
            <option value="lname">Last Name</option>
            <option value="sem">Semester</option>
            <option value="cls">Class</option>
            <option value="phno">Phone no</option>
            <option value="mob">Mobile no</option>
            <option value="email">Email</option>
         </select>
         &nbsp;
         <select name="sorting" id="sorting" onclick="searchIt()" onblur="searchIt()">
            <option value="select1" selected="selected">Sort By</option>
            <option value="usn">USN</option>
            <option value="fname">First Name</option>
            <option value="lname">Last Name</option>
            <option value="sem">Semester</option>
            <option value="cls">Class</option>
         </select>
         <select name="clauses" id="clauses" onclick="searchIt()" onblur="searchIt()">
            <option value="select2" selected="selected">Clause</option>
            <option value="=">Equals</option>
            <option value="like">Like</option>
            <option value="start">Starts With</option>
            <option value="end">Ends With</option>
            <option value="contain">Contains</option>
         </select>
         &nbsp;
         <select name="sortorder" id="sortorder" onclick="searchIt()" onblur="searchIt()">
            <option value="select3" selected="selected">Order</option>
            <option value="asc" name="1">Asc</option>
            <option value="desc" name="2">Desc</option>
         </select>
         &nbsp;<input type="text" name="searchdb" id="searchdb" value="" style="width: 91px" />
         <br />
         <br />
         <input type="submit" name="submit" id="submit" value="Search" />
         &nbsp;
         <input type="reset" value="Reset" onclick="searchIt()" name="Reset" />
         <?php 
            $host="localhost"; 
            $username="naga"; 
            $password="password"; 
            $db="se";
            $tb="sd";
            $con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
            mysql_select_db("$db")or die("cannot select DB");
            
            $select = $_POST['exchange'];
            $searchdb = $_POST['searchdb'];
            $select1 = $_POST['sorting'];
            $select2 = $_POST['clauses'];
            $select3 = $_POST['sortorder'];
            
            if ($select2 == '=')
            {
            $queres = "SELECT * FROM $tb WHERE $select = '$searchdb' ORDER BY $select1 $select3";
            }
            else if ($select2 == 'like')
            {
            $queres = "SELECT * FROM $tb WHERE $select LIKE '$searchdb' ORDER BY $select1 $select3";
            }
            else if ($select2 == 'start')
            {
            $queres = "SELECT * FROM $tb WHERE $select LIKE '$searchdb%' ORDER BY $select1 $select3";
            }
            else if ($select2 == 'end')
            {
            $queres = "SELECT * FROM $tb WHERE $select LIKE '%$searchdb' ORDER BY $select1 $select3";
            }
            else if ($select2 == 'contain')
            {
            $queres = "SELECT * FROM $tb WHERE $select LIKE '%$searchdb%' ORDER BY $select1 $select3";
            }
            
            if (!($result=mysql_query($queres,$con)))
            {
            	die('Error: ' . mysql_error());
            }
            
            	echo "<table border='1'>
            	<tr>
            	<th> USN </th>
            	<th> First Name </th>
            	<th> Last Name </th>
            	<th> Semester </th>
            	<th> Class </th>
            	<th> Address </th>
            	<th> Phone No </th>
            	<th> Mobile No </th>
            	<th> Email Id </th>
            	</tr>";
            	
            	while($row = mysql_fetch_array($result))
            	{
            	
            	echo "<tr>";
            	echo "<td>" . $row['usn'] . "</td>";
            	echo "<td>" . $row['fname'] . "</td>";
            	echo "<td>" . $row['lname'] . "</td>";
            	echo "<td>" . $row['sem'] . "</td>";
            	echo "<td>" . $row['cls'] . "</td>";
            	echo "<td>" . $row['addr'] . "</td>";
            	echo "<td>" . $row['phno'] . "</td>";
            	echo "<td>" . $row['mob'] . "</td>";
            	echo "<td>" . $row['email'] . "</td>";
            	echo "</tr>";
            	}
            	echo "</table></center>"; 
            
            mysql_close($con);	
            ?>
      </div>
      <div id="footer">
         <p class="auto-style9"><a href="index.html">Home</a> | <a href="about.html">About</a> | <a href="contact.html">Contact</a><span class="auto-style9" /> | <a href="insert.html"><span class="auto-style13">Insert </span></a>| <a href="display.php"><span class="auto-style13">Display</span></a>| <a href="search.php"><span class="auto-style13">Search</span></a></p>
      </div>
   </body>
</html>