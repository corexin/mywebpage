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
	startSession();
	checkSessionExist($userid,"Session Out","index.php");
?>
<br>

  
  <table width="500" border="0" align="center" >
  <?php
  $topicid=$_POST[topicid];
  if($userid=="corexin"){

	if($topicid !=""){
	  	$lnk=login();
  		deleteFollow($topicid);	
  		echo("<tr><td bgcolor='#ffcc00'>Admin has deleted :$topicid and its childs</td></tr>");
		logout($lnk);
	}
	else{
		echo("<tr><td bgcolor='#ffcc00'>What do you want?</td></tr>");
	}

  }
  else{
   	echo("<tr><td bgcolor='#ffcc00'>You are not allowed to do it</td></tr>");
  }
 
  ?>
  </table>
    



</body>
</html>
