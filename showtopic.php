
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>show topic</title>
</head>

<body>
<table width="800" border="1" cellpadding="3">
  <tr> 
    <td colspan="2" align="center" bgcolor="#66ccff">Public Forum</td>
  </tr>
  <tr> 
    <td width="70" valign=top bgcolor="#ffcc00"><a href="/forum.php">Home</a></td>
    <td bgcolor="#ffcc00" width="730"> 
      <?php
					echo('<table width="100%" border="0" cellpadding="2">');
					$topid=$_GET['topid'];
					if(!isset($topid)) {
						echo("<tr><td>$topid</td></tr>");
						echo("<tr><td>Invalid topic ID</td></tr>");
						echo("<tr><td><a href='/forum.php'>Home</a>");

					}else{
							
							require("lib.php");
							$lnk = login();
							if($lnk){
							
							  $query = "select * from topic where (topicid=$topid and subid='Australia')";
							  $result = mysql_query($query);
							  $rows=mysql_num_rows($result);
							 
							  if($rows==0){
								 echo("<tr><td>NO Record was found</td></tr>");
					
							  }else{

									$row=mysql_fetch_row($result);
									echo("<tr><td>");
									$read=($row[5]+1);
									echo("Author: $row[4] - posted at $row[7] - read $read times");		
								    echo("</td></tr>");

									echo("<tr><td>Subject: $row[2]</td></tr>");
									echo("<tr><td>$row[3]</td></tr>");
									echo("<tr><td>");
									echo("<hr>");
									echo("Following Topics<br>");
										printFollow($row[1]);
									echo("<hr>");
									echo("Reply:");
									echo("<form method=post action=\"post.php?topid=$topid\">");
									echo('<table width="100%" border="0" cellpadding="2">
										<tr>
										  <td >Username:</td>');
										  
     								 startSession();
									 if(isset($userid)){
										echo("<td>$userid</td>");

									 }
									 else{
											 echo('<td>
												<input name="username" type="text"  value="Guest" size="20">
												Password 
												<input name="password" type="password" size="20"> </td>');
											 
									  } 
												echo('
												</tr>
												<tr>
												  <td>Subject:</td>
												  <td>
											<input name="subject" type="text" id="subject" size="40"> </td>
												</tr>
												<tr>
												  <td>&nbsp;</td>
												  <td><textarea name="body" cols="70" rows="6"></textarea></td>
												</tr>
												<tr>
												  <td><input type="hidden" name="parent" value="no"></td>
												  <td><input name="submit" type="submit"  value="Submit"> <input name="cancel" type="reset"value="Cancel"></td>
												</tr>
										  </table>
											</form>	
											');										
											
											echo("</td></tr>");
										$q="update topic set hit='$read' where topicid='$topid'";	
										$result1 = mysql_query($q);
						
											
								  }
								  				  
							}
							else{
								echo("<tr><td>Database Connection Error</td></tr>");
		
							}
							logout($lnk);
							
					}
					echo('</table>');		
		?>
     </td>
  </tr>
</table>
		

</body>
</html>
