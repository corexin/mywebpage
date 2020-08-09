<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>My E Zone Right Frame</title>
</head>

<body>
<br>
<table width="500" border="0" align="center" cellpadding="3" id="MainEZone">
  <tr>
    
      <?php
  	  	require("lib.php");
		startSession();
		 $userid = $_SESSION['userid'];
		checkSessionExist($userid,"Session Out","index.php");
		echo('<td align="center" bgcolor="#66ccff">');
		echo("G'day <strong>$userid</strong>");
		echo('</td>');
	?>
  </tr>
  <tr> 
    <td bgcolor="#ffcc00">In Your <strong>E Zone</strong>, You can do<BR>
      <li><a href="searchmember.php" target="_self">Make Friends</a></li>
      <li>Post Ads</li>
	  <li>Discuss on BBS</li>
      <li>And A Lot More ...</li>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
