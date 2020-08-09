<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Search Member</title>
</head>

<body>
<?php
error_reporting(0);
$result=$_GET["searchby"];

if(empty($result)){

echo('<br><table width="500" border="0" align="center" cellpadding="3">
  <tr> 
    <td colspan="2" align="center" bgcolor="#66ccff">Search Members</td>
  </tr>
  <tr> 
    <td width="150" valign="top" bgcolor="#ffcc00"> <br>
      Search by ID
      <form name="form2" method="post" action="searchmember.php?searchby=id">
        <p><input name="id" type="text" size="15"><p>
        <p> <input type="submit" name="Submit" value="Submit">&nbsp;<input type="reset" name="Submit2" value="Cancel"></p>
      </form>
      </td>
    <td width="350" valign="top" bgcolor="#ffcc00"><br>
      Classfied Search:<br>
      <form name="form1" method="post" action="searchmember.php?searchby=classify">
        <p>Sex: 
          <select name="sex" id="sex">
            <option>Male</option>
            <option>Female</option>
          </select>
        </p>
		  <p>City:');
			echo("<select name='selectcity'>");
				require("lib.php");
				$lnk=login();
				$q="select city from city";
				$result1 = mysql_query($q);
				while ($rw = mysql_fetch_assoc($result1)) {
					echo("<option> $rw[city]</option>");
				}
			 echo("</select>");
			 logout($lnk);	  
		echo('<p>Age:&gt; 
          <input name="smallage" type="text"  size="4">
          &lt;
          <input name="bigage" type="text" size="4">
        </p>
        <p>
          <input type="submit" name="Submit" value="Submit">
          <input type="Reset" name="Cancel" value="Cancel">
        </p>
      </form></td>
  </tr>
</table>');
}
elseif($result==id){

echo('<br><table width="500" border="0" align="center" cellpadding="3">
  <tr> 
    <td align="center" bgcolor="#66ccff">Search Result</td>
  </tr>');
  $id=$_POST[id];
  require("lib.php");
  $lnk = login();	
  $query="select * from user where username = '$id'";

  $result=mysql_query($query);

  if(!$result){
  
	  echo("<tr> 
		<td  valign='top' bgcolor='#ffcc00'>
		Can not find the user!
		  </td>
		</tr>");
  
  }
  else{
 	  echo("<tr> 
		<td  valign='top' bgcolor='#ffcc00'>
		<a href='showuser.php?user=$id' target='_self'>$id</a>
		  </td>
		</tr>");
 
  }	
 

  echo('</table>');
   $logout($lnk);
}
elseif($result==classify){

echo('<br><table width="500" border="0" align="center" cellpadding="3">
  <tr> 
    <td align="center" bgcolor="#66ccff">Search Result</td>
  </tr>');
  $sex=$_POST[sex];
  $city=$_POST[selectcity];
  $smlage=$_POST[smallage];
  $bigage=$_POST[bigage];
  require("lib.php");
  $lnk = login();
  $query="select * from user where sex='$sex' and city='$city' and year(now()) - year(birthday) - ( DATE_FORMAT(NOW(), '%m-%d') < DATE_FORMAT(birthday, '%m-%d')) BETWEEN $smallage AND $bigage";

  $result=mysql_query($query);
   if(!$result){
	  echo("<tr> 
		<td  valign='top' bgcolor='#ffcc00'>
		Can not find the user!
		  </td>
		</tr>");
  
  }
  else{
	   $rownum=mysql_num_rows($result);
	   
	   for($i=0;$i<$rownum;$i++){
	   $row = mysql_fetch_assoc($result);	
	   getAge($row[birthday]);
		  echo("<tr> 
			<td bgcolor='#ffcc00'>
			<a href=\"showuser.php?user=$row[username]\" target='_blank'>$row[username]</a>
			  </td>
			</tr>");
		}
  }	
 
  echo('</table>');
   $logout($lnk);

}
else{

echo('<br><table width="500" border="0" align="center" cellpadding="3">
  <tr> 
    <td align="center" bgcolor="#66ccff">Search Result</td>
  </tr>
  <tr> 
    <td width="100" valign="top" bgcolor="#ffcc00">
	Invalid Search!
	</td>
	</tr>
 	</table>');

}

?>
</body>
</html>
