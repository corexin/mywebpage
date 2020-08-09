<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Admin Tools</title>
</head>

<body>
<?php
	require("lib.php");
	startSession();
	 $userid = $_SESSION['userid'];
	checkSessionExist($userid,"Session Out","index.php");
	if(strcmp($userid,"corexin")!=0){  
		checkSessionExist("xxx","Restrict Zone","index.php");
	}
	?>
<table width="600" border="0" align="center" cellpadding="2">
  <tr> 
    <td colspan="4" align="center" valign="middle" bgcolor="#66ccff">Admin's Tools</td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#ffcc00">Send Msg to All Member</td>
    <td colspan="2" bgcolor="#ffcc00">Delete Msg</td>
  </tr>
  <tr> 
    <td width="60" valign="top" bgcolor="#ffcc00"><p>Subject</p>
      <p>Body</p></td>
    <td width="212" valign="top" bgcolor="#ffcc00"> <form name="form1" method="post" action="msg.php?action=write&to=all">
        <input type="textfield" name="subject">
        <p> 
          <textarea name="body" cols="25" rows="3"></textarea>
        </p>
        <p> 
          <input type="submit" name="Submit" value="Submit">
          <input type="reset" name="Submit2" value="Cancel">
        </p>
      </form>
      <p>&nbsp;</p></td>
    <td width="120" valign="top" bgcolor="#ffcc00">Input topic ID</td>
    <td width="196" valign="top" bgcolor="#ffcc00"><form name="form2" method="post" action="msg_del.php">
        <p>
          <input name="topicid" type="text" id="topicid" size="20">
        </p>
        <p> 
          <input name="Delete" type="submit" id="Delete" value="Delete">
          <input name="Cancel" type="submit" id="Cancel" value="Cancel">
        </p>
        <p>&nbsp; </p>
      </form><p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
