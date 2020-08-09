<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Msg Home</title>
</head>

<body>
<br>

  
  
  <?php

  	require("lib.php");
	$who= $_GET["user"];
	if(!isset($who)){ 
		echo('<table width="400" border="0" align="center" cellpadding="2">');
		echo("<tr><td bgcolor=#ffcc00>");
		warning();
		echo("</td></tr></table>");
	}
	else{
	  echo('<table width="400" border="0" align="center" cellpadding="2">');
		echo("<tr> 
		  <td bgcolor=#66ccff colspan='2'>Information of $who</td>
		</tr>");

				$lnk=login();
				$query="select sex,city,email from user where username='$who'";
				$result = mysql_query($query);
				$row = mysql_fetch_assoc($result);
				
				if(!$result){
					echo("<tr><td bgcolor=#ffcc00>Database Connection Error!</td></tr>");
				}
				else{
					
					echo("<tr><td bgcolor=#ffcc00 >UserName</td>");
					echo("<td bgcolor=#ffcc00>$who</td></tr>");
					echo("<tr><td bgcolor=#ffcc00>Sex</td>");
					echo("<td bgcolor=#ffcc00>$row[sex]</td></tr>");

					echo("<tr><td bgcolor=#ffcc00>City</td>");
					echo("<td bgcolor=#ffcc00>$row[city]</td></tr>");

					echo("<tr><td bgcolor=#ffcc00>Age</td>");
					echo("<td bgcolor=#ffcc00>getAge($row[birthday])</td></tr>");
					echo("<tr><td bgcolor=#ffcc00>Email</td>");
					echo("<td bgcolor=#ffcc00>$row[email]</td></tr>");
	
				}
				
			
		echo('</table>');
		
		echo('<br>');
		echo("<form name='form1' method='post' action=\"msg.php?action=write&to=$who\">");
			echo('<table width="400" border="0" align="center" cellpadding="2">');
			echo("<tr><td align ='center' bgcolor=#66ccff colspan='2'>Leave Msg to $who</td></tr>");
			echo('<tr><td bgcolor="#ffcc00">Subject</td><td bgcolor="#ffcc00">
				<input type="textfield" name="subject"></td></tr>');
			echo('<tr><td bgcolor="#ffcc00"  valign="top">Body</td><td bgcolor="#ffcc00">
				  <textarea name="body" cols="20" rows="5"></textarea></td></tr>'); 
			echo('<tr><td bgcolor="#ffcc00"></td><td bgcolor="#ffcc00"><input type="submit" name="Submit" value="Submit">&nbsp;
					  <input type="reset" name="Submit2" value="Cancel"></td></tr>');
			echo('</table>');
		echo('</form>');   
	
		logout($lnk); 
	}
?>

<p>&nbsp;</p>
</body>
</html>
