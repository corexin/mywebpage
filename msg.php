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
	$userid = $_SESSION['userid'];
	checkSessionExist($userid,"Session Out","index.php");
  		
?>
<br>

  
  <table width="500" border="0" align="center" cellpadding="2">
    
    <?php
		error_reporting(0);
		$action= $_GET["action"];

		if($action == "read"){
				$msgid = $_GET["msgid"];
				$lnk = login();
				if(!isset($msgid)){
					$page = $_POST["page"];
					if(empty($page)){ $page = 0;}
					 $userid = $_SESSION['userid'];
					$query="select msgid,subject,date,author,status from msg where owner='$userid' ORDER BY msgid desc";
	
					$result = mysql_query($query);
					if(!$result){
						echo("<tr><td bgcolor=#ffcc00>Database Connection Error!</td></tr>");
					}
					else{
						echo('<tr> 
					      <td height="30" bgcolor="#66ccff"> Your Msg</td>
						    </tr>');
							$rownum = mysql_num_rows($result);
							if($rownum == 0){
								
								echo("<tr><td bgcolor=#ffcc00>You got No Msgs!</td></tr>");
								
							}
							else{
							echo("<form name='listform' method='post' action=\"msg.php?action=delete\">");
		   	   					  while ($row = mysql_fetch_assoc($result)){
								  
								  	if($row[status] == "R"){
										echo("<tr><td bgcolor='#ffffff'><input type='checkbox' name='checkbox$row[msgid]' value='$row[msgid]'>");
										echo("  <a href=\"msg.php?action=read&msgid=$row[msgid]\" target=_self>$row[subject]</a> From: $row[author] Dated: $row[date]</td></tr>");
									}
									else{
										echo("<tr><td bgcolor='#ffccff'><input type='checkbox' name='checkbox$row[msgid]' value='$row[msgid]'>");
										echo("  <a href=\"msg.php?action=read&msgid=$row[msgid]\" target=_self>$row[subject]</a> From: $row[author] Dated: $row[date]</td></tr>");
									}
									
								  }
							  echo("<tr><td bgcolor='#66ccff'><input type=submit value=Delete></td></tr></form>");
						}  
				 }						  
				
			 }
			 else{
		
				 	$query="select * from msg where msgid='$msgid'";
					$result = mysql_query($query);

					if(!$result){
						echo("<tr><td bgcolor=#ffcc00>Database Connection Error!</td></tr>");
					}
					else{
						$row = mysql_fetch_assoc($result);
						echo("<tr><td bgcolor='#ffcc00'>From</td><td bgcolor='#ffcc00'>");
						echo("$row[author]");
						echo("</td></tr>");
						echo("<tr><td bgcolor='#ffcc00'>Subject</td><td bgcolor='#ffcc00'>");
						echo("$row[subject]");
						echo("</td></tr>");
						echo("<tr><td bgcolor='#ffcc00'>Body</td><td bgcolor='#ffcc00'>");
						echo("$row[body]");
						echo("</td></tr>");
						
						if($row[status]=="U"){
							$query1="update msg set status='R' where msgid='$msgid'";
							$result1 = mysql_query($query1);
							if(!$result1){
								echo("<tr><td bgcolor=#ffcc00>Database Connection Error!</td></tr>");
								
							}
							else{
								echo("<SCRIPT LANGUAGE='JavaScript'>parent.myezone_left.location.reload(); </SCRIPT>");
 							}									
						}
						
					}
			 		
						 
			 }
			 logout($lnk);
		} 
		elseif($action == "write"){
		
			$writeto=$_GET["to"];
			$subj=$_POST["subject"];
			$body=$_POST["body"];
			$lnk=login();
				if($userid=="corexin" && !empty($subj) && $writeto=="all"){
					
						$q1="select username from user";
						$result1 = mysql_query($q1);
						if(!result1){
							
							echo('<tr><td bgcolor=#ffcc00>Database Error</td></tr>');
							   
						}
						else{
								while ($row = mysql_fetch_assoc($result1)) {
									#echo("<tr><td bgcolor=#ffcc00>$row[username]</td></tr>");
									$ndate=date("Y-m-d");
									$q2="insert into msg (owner,subject,body,author,date,status) values
										 ('$row[username]','$subj','$body','admin','$ndate','U')";
								
									$result2 = mysql_query($q2);
										 
								}
								if(result2){
									echo("<SCRIPT LANGUAGE='JavaScript'>parent.myezone_left.location.reload(); </SCRIPT>");
									echo("<tr><td bgcolor=#ffcc00>Sent K.O</td></tr>");
									
								}
								else{
								
									echo('<tr><td bgcolor=#ffcc00>Sending Error</td></tr>');
								}
						  }
							
						
				
					}
					elseif(isset($userid) && !empty($subj) && isset($writeto) && $writeto!="all"){

						$ndate=date("Y-m-d");
						$q2="insert into msg (owner,subject,body,author,date,status) values
										 ('$writeto','$subj','$body','$userid','$ndate','U')";
						$result = mysql_query($q2);								
						if(!result){
							echo("<tr><td bgcolor=#ffcc00>Sent Failed!!!</td></tr>");					
						}
						else{
							if("$writeto"=="$userid"){
								echo("<SCRIPT LANGUAGE='JavaScript'>parent.myezone_left.location.reload(); </SCRIPT>");
							}
							echo("<tr><td bgcolor=#ffcc00>Sent msg to $writeto</td></tr>");
						}
						
					
					}
					else{
					
						echo('<tr><td bgcolor=#ffcc00>Input Error or Session Out</td></tr>');
				
					}
				logout($lnk);
		}
		elseif($action == "delete"){
			
			$allparam=$_POST;
			$lnk=login();
			echo('<tr><td bgcolor=#ffcc00>');
			if(isset($userid)){
				while (list($key, $val) = each($allparam)) {
   					$retV = mysql_query("delete from msg where msgid='$val'");					
				}
				if(!retV){
					echo("Error Removing Msg!!!");
				}
				echo("<SCRIPT LANGUAGE='JavaScript'>parent.myezone_left.location.reload(); </SCRIPT>");
				echo("<SCRIPT LANGUAGE='JavaScript'>parent.myezone_right.location='msg.php?action=read'</SCRIPT>");
			}
			else{
				checkSessionExist($userid,"Session Out","index.php");
	
			}
    		 echo('</td></tr>');
			 logout($lnk);
		}
		else{
		
			echo('<tr><td bgcolor=#ffcc00>');
				warning();
    		 echo('</td></tr>');
		
		}
  ?>
  </table>
    



</body>
</html>
