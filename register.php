<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Register New Account</title>
</head>

<body>

<form action="register.php" method="post" name="form1" target="_self" id="form1">
  <p>&nbsp;</p>
  <table width="340" border="0" align="center">
    <tr> 
      <?php 
	error_reporting(0);
	$name=$_POST["username"]; 
	$pass=$_POST["password"]; 

	if(!empty($name) && !empty($pass)){
		$sex=$_POST['sex'];
		$city=$_POST['city'];
		$email=$_POST['email'];
		
		require("lib.php");
		$link = login();
		$query = "INSERT INTO user ( username , password , sex , City ,birthday, email ) 
		VALUES ('$name', '$pass', '$sex', '$city','$birth','$email')";
		$result = mysql_query($query);
		if($result){
			echo ('<tr><td align ="center" colspan="2" bgcolor="#66CCFF">New Account Created<br>');
			echo ("Your Username & Password are As Blow<br>");
			echo ("Username: $name<br>");
			echo("Password: $pass<br>");
			echo("Go back <a href='http://www.ausezone.com' target='_self'>Home</a> to Login</td></tr>");
		
		}
		else{
			echo('<tr><td align ="center" colspan="2" bgcolor="#66CCFF">Username exist<br>Please choose another name<br></td></tr>');
		}
	
			mysql_close($link);
	}

?>
	<td align ="center"  bgcolor="#66CCFF"><a href="/index.php">Home</a>
      </td>
      <td align ="center" bgcolor="#66CCFF"> Register Here Please 
      </td>
    </tr>
    <tr> 
      <td width="50" bgcolor="#FFCC00">username</td>
      <td width="270" bgcolor="#FFCC00"> 
        <input name="username" type="text" id="username" />
      </td>
    </tr>
    <tr> 
      <td bgcolor="#FFCC00">password</td>
      <td bgcolor="#FFCC00"><input name="password" type="text" id="password" /></td>
    </tr>
    <tr> 
      <td bgcolor="#FFCC00">sex</td>
      <td bgcolor="#FFCC00"><label> 
        <select name="sex" id="sex">
          <option>Male</option>
          <option>Female</option>
        </select>
        </label></td>
    </tr>
    <tr> 
      <td bgcolor="#FFCC00">City</td>
      <td bgcolor="#FFCC00"><select name="city" id="city">
          <option>Brisbane</option>
          <option>Sydney</option>
          <option>Melbourne</option>
        </select></td>
    </tr>
    <tr> 
      <td bgcolor="#FFCC00">Email</td>
      <td bgcolor="#FFCC00"><input name="email" type="text" id="email" size="30" /></td>
    </tr>
    <tr> 
      <td bgcolor="#FFCC00">&nbsp;</td>
      <td bgcolor="#FFCC00"><label> 
        <input type="submit" name="Submit" value="Submit" />
        <input name="cancel" type="reset" id="cancel" value="Cancel" />
        </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
