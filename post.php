
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Post Topic</title>
</head>

<body>
<table width="800" border="1" cellpadding="3">
  <tr> 
    <td colspan="2" align="center" bgcolor="#66ccff">Public Forum</td>
  </tr>
  <tr> 
    <td width="70" rowspan="2" valign=top bgcolor="#ffcc00"><a href="/forum.php">Home</a></td>
    
      <?php
	  			
	  				require("lib.php");
					$lnk = login();
					startSession();
					$parent=$_POST["parent"];
					
					if(($parent=="yes" || $parent == "no" )){
						echo('<td bgcolor="#ffcc00">');


						$user=$_POST["username"];					
						$pass=$_POST["password"];
						
						$subj=$_POST["subject"];
						$body=$_POST["body"];
						
						if(isset($userid)){
							$user=$userid;
						}
	
						if(!empty($user) && !empty($pass)){
							
							$q="select * from user where username='$user' and password='$pass'";
							$result = mysql_query("$q");
							$r=mysql_fetch_row($result);
							if($result){
								$user = $r[0];
							}
							else{
								$user = "Guest";
							}
						}
							
							if($parent=="yes" && empty($top)){
								$q1="INSERT INTO topic ( topicid , subject , body , author , date , subid , hit,  parent ) VALUES ('', '$subj', '$body', '$user', NOW( ) , 'Australia', '0', 'yes')";	
							}
							if($parent=="no"){
								$q1="INSERT INTO topic ( topicid , subject , body , author , date , subid , hit,  parent ) VALUES ('', '$subj', '$body', '$user', NOW( ) , 'Australia', '0', 'no')";								
							}
							
							$result1=mysql_query($q1);
							if($result1){
								echo("Insert OK<br>");
							}
							else{
								echo("Insert Topic Error<br>");
							}
							$result2=mysql_query("select topicid from topic order by topicid desc limit 1");
							$rowa="";
							if($result2){
								$rowa = mysql_fetch_row($result2);
							}
							else{
								echo('can not get lastest topicid');
							}


							if($parent=="no"){
								$top=$_GET["topid"];
	
								$child=$rowa[0];
								$q3="INSERT INTO topicrelation ( childid, parentid) VALUES ('$child','$top')";
								
								$result3 = mysql_query($q3);								
								if($result3){
									echo("update table ok");
								}
								else{
									echo("failed update table");
								}
							}
										
						echo('</td>');
					}
					else{
						echo('<td bgcolor="#ffcc00">Leave Msg below</td></tr>');
						echo(' <tr> 
							<td bgcolor="#ffcc00" width="730"> 
							  <form method=post action="post.php">
								<table width="100%" border="0" cellpadding="2">
								  <tr> 
									<td width="11%">Username:</td>
									<td width="89%"> <input name="username" type="text"  value="Guest" size="20">
									  Password 
									  <input name="password" type="password" size="20"> </td>
								  </tr>
								  <tr> 
									<td>Subject:</td>
									<td> <input name="subject" type="text" id="subject" size="40"> </td>
								  </tr>
								  <tr> 
									<td>&nbsp;</td>
									<td><textarea name="body" cols="70" rows="7"></textarea></td>
								  </tr>
								  <tr> 
									<td><input type="hidden" name="parent" value="yes"></td>
									<td><input name="submit" type="submit"  value="Submit"> <input name="cancel" type="reset"value="Cancel"></td>
								  </tr>
								</table>
							  </form></td>
						  </tr>
						</table>');
		
					}
					logout($lnk);
			
		?>
   
  

<p>&nbsp;</p>
</body>
</html>
