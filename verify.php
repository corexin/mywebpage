<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Authenticate User</title>
</head>

<body>
<?php


if(!empty($_POST['username']) && !empty($_POST['password'])){
	
	$name=$_POST['username']; 
	$pass=$_POST['password']; 
	
	require("lib.php");
	$link = login();
	
	$query = "select username, password from user where username='$name' AND password='$pass'";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);

	if(strcmp($row[0],$name)==0 && strcmp($row[1],$pass)==0){
		mysql_close($link);
		
		startSession();
		session_register('userid');
		$_SESSION['userid']=$name;
		header("Location: /myezone.php");
	}
	else{

		mysql_close($link);
		echo('<table width="400" cellpadding="5" border="1">
 		 <tr>
   		 <td align="center" valign="middle" bgcolor="#66CCFF"> Alert</td>
 		 </tr>
		  <tr>
		<td bgcolor="#FFCC00">');
			echo("Could not find matching username and password<p>");
			echo("Please Click <a href='/'>Back</a> to Login again<p>");
			echo("Or Click <a href='/register.php'>Here</a> to Register As A New User");
			echo('</td>
		</tr>
		</table>');
		destroySession($link);

	}
	
}
else{

	echo("<SCRIPT LANGUAGE='JavaScript'>alert ('Need Register as Valid User to View it!');</SCRIPT>");
	echo("<SCRIPT LANGUAGE='JavaScript'>window.location ='/';</SCRIPT>");
	exit();


}

?>

</body>
</html>
