<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>My E Zone</title>


</head>

<?php 
	require("lib.php");
	startSession();
	checkSessionExist("Session Out","index.php");
?>
	<FRAMESET cols="20%, 80%">
      <FRAME name="myezone_left" src="myezone_left.php">
      <FRAME name="myezone_right" src="myezone_right.php">
	  </FRAMESET><noframes></noframes>
	


</html>
