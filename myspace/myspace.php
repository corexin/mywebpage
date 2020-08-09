<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<title>My Space</title>
	<link rel="stylesheet" type="text/css" href="/css/standard.css"/>
	<script language="JavaScript" type="text/JavaScript">
	
		function showMyDetail(i){
		
		if(i==1){
			   document.getElementById('p0') .innerHTML="Full Name: StevenJ";
			   document.getElementById('p1').innerHTML="Sex: Male";
			   document.getElementById('p2').innerHTML="DOB: Secret";
			   document.getElementById('p3').innerHTML="Nationality: Australia";
			   document.getElementById('p4') .innerHTML="Current Position: Programmer";
			   document.getElementById('p5') .innerHTML="Current Residency: Canberra, Australia";
			   document.getElementById('pt').style.visibility="visible";
		
		   }
		   else if(i==2){
		  	  document.getElementById('p0') .innerHTML="C - My Starting programming Language";
			   document.getElementById('p1') .innerHTML="Java - Objected Oriented is not cool, but cold";
			   document.getElementById('p2') .innerHTML="Perl - RegExp Guru, gotta keep learning";
			   document.getElementById('p3') .innerHTML="Shell Scripting - handy combine with others in Unix";
			   document.getElementById('p4') .innerHTML="PL/SQL - First rank in my class";
			   document.getElementById('p5') .innerHTML="PHP,Javascript,bla...no ending...";
			   document.getElementById("pt").style.visibility="hidden";
		   }
		   else{
		   	   document.getElementById('p0') .innerHTML="Soccer - my favoriate game";
			   document.getElementById('p1') .innerHTML="Tennis - my back hand is so cool";
			   document.getElementById('p2') .innerHTML="Swimming - not an expert";
			   document.getElementById('p3').innerHTML="KunFu - wish I am as good as Bruce Lee";
			   document.getElementById('p4') .innerHTML="Hum, that is all";
			   document.getElementById('p5').innerHTML="";
		       document.getElementById('pt').style.visibility='hidden';
		   }
		}
		
		
	</script>
</head>

<body>

<div id="Body">
    <div id="Heading">
    	<font color="#9900FF" size="+1" face="Arial, Helvetica, sans-serif">
	    	<a href="c.php" target="_blank">C</a> 
	     	 - <a href="java.php" target="_blank">Java</a> - <a href="perl.php" target="_blank">Perl</a> 
	      	- <a href="php.php" target="_blank">PHP</a> - <a href="unix.php" target="_blank">Unix</a> 
	      	- <a href="myword.php" target="_blank">My words</a>
      	</font>
	</div>
	<div id="Left">
		<div id="MenuHeading"><a href="/index.php" target="_self">Home</a></div>
		<ul>
			<li><a href="javascript:showMyDetail(1);">My Detail</a></li>
			<li><a href="javascript:showMyDetail(2);">Programming</a></li>
			<li><a href="javascript:showMyDetail(3);">My Hobby</a></li>
		</ul>
	</div>
	<div id="Right">
		<div id='p0'>Wecome to my own forum.</div>
		<div id='p1'>I am glad to share my personal life and habit with you.</div>
		<div id='p2'>Also you are welcome to leave feedback 2 me.</div>
		<div id='p3'></div>
		<div id='p4'></div>
		<div id='p5'></div>
		<div id='p6'></div>
    </div>
</div>
<div id='pt' style="visibility:hidden; position:absolute; top:65px; left:580px"><img src='../images/me.jpg' width='100' height='120'/></a></div>
</body>
</html>
