<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Events</title>
</head>

<body>
<table width="500" border="0" align="left" cellpadding="3" id="eventtable">
  <tr>
    <td height="30" colspan="2" align="left" valign="middle" bgcolor="#66CCFF">Events</td>
  </tr>


<?php
	require_once("lib.php");
	$link = login();
    $query = "select date,event from log order by logid desc";
	  $result = mysql_query($query);
	  if(!$result){

		echo('<tr><td bgcolor="#FFCC00">Data base Connection error, retry later</td></tr>');
		
		logout($link);

	  }
	  else{  
		$numRow = mysql_num_rows($result);
		for($cnt=0;$cnt<$numRow;$cnt++){
			$row = mysql_fetch_row($result);
		echo("<tr><td width='100' align='left' valign='middle' bgcolor='#FFCC00'>$row[0]</td>
			<td width='400' align='left' valign='middle' bgcolor='#FFCC00'>$row[1]</td></tr>");
		}
		
		logout($link);
	}

?>
</table>

</body>
</html>
