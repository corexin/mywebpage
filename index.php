<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html>
<html>
<head>
  <title>Steven's Homepage</title>
	<META NAME="ROBOTS" Container="NOARCHIVE">
	<META name="keywords" Container="Australia, Entertainment, E, online, Zone, Community, friend, BBS, Bulletin board, post, girl, photo, picture, advertise"> 
	<META name="description" Container="Chao's homepage.">
	<meta Container="Dev-PHP 2.0.10" name="GENERATOR">
	<meta http-equiv="Container-Type" Container="text/html; charset=gb2312">
	<link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>

<body>
<div id="Container">

	<div id="Header">

		<div class="Left">
			<img src="images/logo.jpg" width="70" height="60">
		</div>

		<div class="Middle">
			Big Banner goes here.
		</div>

		<div class="Right">
			<img src="images/logo_java.jpg" width="60" height="70">
		</div>
	</div>
	<div id="Nav">
		<div><a href="/" target="_self">Home</a></div>
		<div><a href="myspace/myspace.php" target="_self">My Space</a></div>
		<div><a href="forum.php" target="_blank">Public Forum</a></div>
		<div><a href="index.php" onClick="window.external.addFavorite('http://www.ausezone.com/','Austria E Zone')" target="_self">Add To Faverate</a></div>
		<div><a href="event.php" target="_blank">Events</a></div>
	</div>
	<div id="Login">
		<form action="verify.php" method="post" name="form1" target="_self">
			<div>Username:&nbsp;<input name="username" type="text" id="username" size="15"></div>
			<div>Password:&nbsp;<input name="password" type="password" id="password" size="15"></div>
			<div><input name="Submit" type="submit" id="Submit" value="Submit"></div>
			<div><input name="Submit" type="reset" id="Submit" value="Cancel"></div>
			<div><a href="register.php" target="_blank">New User</a></div>
		</form>
	</div>
	<div id="Leftnav">
		<div class="Heading">Links</div>
		<ul>
			<li><a href="http://www.hxfd.cn/" target="_blank">RedStar Restaurant</a></li>
		</ul>
	</div>

	<div id="Content">
		 <?php
			require("lib.php");
			$lnk = login();
			if($lnk){
				  $query = "select news,date from news order by newsid desc limit 1";
				  $result = mysql_query($query);
				  $row = mysql_fetch_row($result);
				  echo("$row[0]");
				  echo("<br>");
				  echo("$row[1]");								
			}
			else{
				echo("Database Connection Error");
			}
			logout($lnk);		
		?>
	</div>

	<div id="Rightnav">
		<div class="Heading">My Progam</div>
		<ul>
			<li><a href="timer.html" target="_blank">JavaScript Timer</a></li>
			<li><a href="myProgram/weather.zip">Perl Weather</a></li>
		</ul>
	</div>
	
	<div id="Footer">
		<hr align="center" width="100%" /> 
		<div align="center">Copyright (C) 2006 - 2011 <a href="mailto:thabo.au@gmail.com" target="_blank">StevenJ</a> updated on 06/11/2011</div>
	</div>
</div>

</body>
</html>
