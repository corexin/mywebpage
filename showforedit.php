<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Edit Profile</title>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

var DHTML = (document.getElementById || document.all || document.layers);

function invi(flag)
{
	if (!DHTML) return;
	
	var x = new getObj('menu');
	x.style.visibility = (flag) ? 'hidden' : 'visible'
	x.style.left=event.clientX + document.body.scrollLeft;
	x.style.top=event.clientY + document.body.scrollTop;
}
function getObj(name)
{
  if (document.getElementById)
  {
  	this.obj = document.getElementById(name);
	this.style = document.getElementById(name).style;
  }
  else if (document.all)
  {
	this.obj = document.all[name];
	this.style = document.all[name].style;
  }
  else if (document.layers)
  {
   	this.obj = document.layers[name];
   	this.style = document.layers[name];
  }
}


</script>
</head>

<body>
<br>
<div id="menu" style="position:absolute;left:0;top:0;width:220;height:30;background-color:#FFCCFF;
visibility:hidden">NonCompatible Birthday Format will not be updated</div>


  <?php
 	require("lib.php");
	startSession();
	 $userid = $_SESSION['userid'];
	checkSessionExist($userid,"Session Out, Navigate to HomePage","index.php");
  
echo('<table width="400" height="200" border="1" align="center" cellpadding="3">');
	$param=$_GET['edit'];

	if($param=="logout"){		
		destroySession();
		echo('<tr><td colspan="2" align="center" bgcolor="#66CCFF">');
		echo("Log Out Already<br>");
 		echo("Return Back <a href='index.php' target='_parent'>Home</a>");
		echo('</td></tr>');
		exit();
	}
	elseif(strcmp($param,'password')==0){
	    echo('<tr>');
			echo('<td colspan="2" align="center" bgcolor="#66CCFF">Change Password</td></tr>');		   
			echo('<tr><td width="120" valign="top" bgcolor="#FFCC00"><br>
			<table width="120" height="115" border="0" cellpadding="2" bgcolor="#ffcc00">
				  <tr>
					<td height="40">Old Password</td>
				  </tr>
				  <tr>
					<td height="40">Re-Enter</td>
				  </tr>
				  <tr>
					<td height="40">New Password</td>
				  </tr>
			</table>
			</td>');
			echo('<td width="280" valign="top" bgcolor="#FFCC00"> <br>');
			
			echo('<form name="form1" method="post" action="update.php?update=password">
			<table width="200" border="0" cellpadding="2" bgcolor="#ffcc00">
			  <tr>
			    <td height="40">
					<input name="oldpass1" type="text">
			    </td>
			  </tr>
			  <tr>
				<td height="40">
					<input type="text" name="oldpass2">
			    </td>
			 </tr>
			  <tr>
			    <td height="40">
					<input name="newpass" type="text" id="newpass2">
			    </td>
			  </tr>
			  <tr>
			    <td height="40">
					<input type="submit" name="Submit" value="Submit"> <input name="cancel" type="reset" id="cancel2" value="Cancel">
			    </td>
			  </tr>
		</table>	
			  </form>
			  </td>');
 		 echo('</tr>');
	}  
	elseif(strcmp($param,"profile")==0){
		    echo('<tr><td colspan="2" align="center" bgcolor="#66CCFF">Update My Profile</td></tr>');
			echo('<tr><td width="120" valign="top" bgcolor="#FFCC00"> <br>
			<table width="120" border="0" cellpadding="2" bgcolor="#ffcc00">
			  <tr>
				<td height="40">UserName </td>
			  </tr>
			  <tr>
				<td height="40">Password </td>
			  </tr>
			  <tr>
				<td height="40">Sex</td>
			  </tr>
			  <tr>
				<td height="40">Location</td>
			  </tr>
			  <tr>
				<td height="40"><a onMouseover="invi(0);" onMouseout="invi(1);">Birthday</a></td>
			  </tr>
			  <tr>
				<td height="40">Email</td>
			  </tr>
			</table>
			  </td>'); 
			echo('<td width="280" valign="top" bgcolor="#FFCC00"> <br>');		
			
			$lnk = login();
			 $userid = $_SESSION['userid'];
			$query = sprintf("select * from user where username='%s'","$userid");
			
			  $result = mysql_query($query);
			  if(!$result){
				echo('Data base Connection error, retry later');
				logout($link);
			  }
    		$row = mysql_fetch_assoc($result);
			echo('<form name="form1" method="post" action="update.php?update=profile">');
			echo('<table width="120" border="0" cellpadding="2" bgcolor="#ffcc00">');
			echo("<tr><td height='40'>$row[username]</td></tr>");
			echo("<tr><td height='40'>*****</td></tr>");
			echo("<tr><td height='40'><select name='selectsex'>");
			if(strcmp($row[sex],"Male")==0){
				echo("<option selected>Male</option>");
				echo("<option>Female</option>");	
			}		
			else{
				echo('<option selected>Female</option>');
				echo('<option>Male</option>');
			}	
			echo('</select></td></tr>');
	 
			echo("<tr><td height='40'><p><select name='selectcity'>");
				$q="select city from city";
				$result1 = mysql_query($q);
				while ($rw = mysql_fetch_assoc($result1)) {
				 echo($rw[birthday]);
					if(strcmp($rw[city],$row[city])==0){
						echo("<option selected>$rw[city]</option>");
					}
					else{
						echo("<option> $rw[city]</option>");
					}

				}
			 echo("</select></td></tr>");
 			 echo("<tr><td height='4	0'><input type='text' name='email' value='$row[email]'></td></tr>");
			 echo("<tr><td height='40'><input type='submit' name='Submit' value='Submit'>
			  &nbsp;<input name='cancel' type='reset' value='Cancel'></td></tr></form>");
	
			logout($lnk);
			echo('</td></tr>');
		
	}
	else{
			echo('<tr><td align="center" bgcolor="#66CCFF">');
			warning();
			echo('</td></tr>');
	}
echo('</table>');		
?>

</body>
</html>
