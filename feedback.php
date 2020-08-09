<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Feed Back</title>
</head>

<body>
<br>
<table width="400" border="0" cellpadding="3" bgcolor="#FFFFFF" id="about">
  <?php
	$from=$_POST['from'];
	$subject = $_POST['subject'];
	$body = $_POST['content'];
	if(!empty($from) && !empty($subject) && !empty($body)){

	 echo('<tr colspan="2" align="left" valign="middle" bgcolor="#66ccff"><td colspan="2" align="center" valign="middle" bgcolor="#66ccff">');
	 if (mail("jiangqq@yahoo.com", $subject, $body,$from)) {
 		 echo("<br><p>Message successfully sent!</p>");
       echo('<p>Thank you for your feedback, I will get back to you soon</p>');
	 } else {
  		echo("<p>Message delivery failed...</p>");
 	}
	
	 echo('</td></tr>');
	
	}
	else{
	 echo('<tr colspan="2" align="left" valign="middle" bgcolor="#66ccff"><td colspan="2" align="center" valign="middle" bgcolor="#66ccff">');
	 echo('Please Fill Up all Sections Properly!');
	 echo('</td></tr>');
	}
	 
  ?>
  <tr> 
    <th colspan="2" align="center" valign="middle" bgcolor="#66ccff"> Leave Me 
      FeedBack</th>
  </tr>
  <tr> 
    <td width="90" align="left" valign="top" nowrap bgcolor="#FFCC00"><br>
      <p>Your Name:</p>
      <p>Subject:</p> 
      <p>Body:</p>
      
    </td>
    <td width="310" align="left" valign="top" bgcolor="#FFCC00"> <br>
      <form name="feedbackform" method="post" action="feedback.php">
        <p>
          <input type="text" name="from">
        </p>
        <p>
          <input name="subject" type="text" id="subject">
        </p>
        <p>
          <textarea name="content" cols="35" rows="5" id="content"></textarea>
        </p>
        <p> 
          <input type="submit" name="Submit" value="Submit">
          <input type="reset" name="Submit2" value="Cancel">
		</p>
      </form>
   </td>
  </tr>
</table>
</body>
</html>
