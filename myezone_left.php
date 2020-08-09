<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>My E Zone Left Frame</title>
</head>

<body>
<br>
<table width="170" align="center" cellpadding="5">
  <tr> 
    <td align="left" bgcolor="#66ccff">Menu</td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#FFCC00"><a href="myezone_right.php" target="myezone_right">My 
      Home</a></td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#FFCC00"><a href="showforedit.php?edit=profile" target="myezone_right">Edit 
      My Profile</a></td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#FFCC00"><a href="showforedit.php?edit=password" target="myezone_right">Change 
      Password</a></td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#FFCC00"><a href="msg.php?action=read" target="myezone_right">Read 
      Msg</a>&nbsp;<?php 	
	  	error_reporting(0);
	  require("lib.php"); startSession();
			 $lnk=login();
			 $userid = $_SESSION['userid'];
			 $query="select msgid from msg where owner=$userid and status='U'"; 	
			 $result = mysql_query($query);
			 $row=mysql_num_rows($result);
			 if($row != 0)
				 echo("($row New)");
			 logout($lnk);
	  ?></td>
  </tr>
  <?php
	
	$userid = $_SESSION['userid'];
	if($userid=="corexin"){
		echo('<tr> 
		<td align="left" bgcolor="#FFCC00"><a href="admin.php" target="myezone_right">Admin Tools</a></td>
		</tr>');
    }
  ?>
 
  <tr>
    <td align="left" bgcolor="#FFCC00"><a href="searchmember.php" target="myezone_right">Search Member</a></td>
  </tr>
  <tr> 
    <td align="left" bgcolor="#FFCC00"><a href="showforedit.php?edit=logout" target="myezone_right">LogOut</a></td>
  </tr>
</table>
</body>
</html>
