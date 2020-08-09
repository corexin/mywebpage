
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<title>Public Forum</title>
	<link rel="stylesheet" type="text/css" href="/css/standard.css"/>
</head>

<body>
<div id="Body">

    <div id="Heading">Public Forum - <a href="/index.php">Home</a> | <a href="post.php">New Topic</a></div>
    <div id="Left">Ads</div>
    <div id="Right">
      <table>
        <?php
        			$totalTopic = 20;
					$pageno=0;
					if(isset($_GET["pageno"])){
						$pageno=$_GET["pageno"];
					}
					require("lib.php");
					$lnk = login();
					if($lnk){
						  $startPage=$pageno*$totalTopic;
						  $query = "select * from topic where parent='yes' and subid='Australia' order by date desc limit $startPage, $totalTopic";
						  $result = mysql_query($query);
						  $totalRec = mysql_num_rows($result);
						  if(!$result){
						 	 echo("<tr><td>NO Record was found</td></tr>");

						  }else{
					  	   echo("<tr><td>");

							printAll($result);

    						 echo("</td></tr>");
						  }

					}
					else{
						echo("<tr><td>Database Connection Error</td></tr>");

					}
					logout($lnk);
					if($pageno<=1){
						$prevPage=0;
					}
					else{
						$prevPage=$pageno-1;
					}
					if($totalRec<$totalTopic){
						$nextPage=$pageno;
					}
					else{
						$nextPage=$pageno+1;
					}

					echo("<tr><td>");
					echo("<a href=\"forum.php\">First</a>&nbsp;|&nbsp;");
					echo("<a href=\"forum.php?pageno=$prevPage\">Previous</a>&nbsp;|&nbsp;");
					echo("<a href=\"forum.php?pageno=$nextPage\">Next</a>");

					echo("</td></tr>");
		?>
      </table>
	</div>
</div>
</body>
</html>
