
<?php
	
	function startSession(){

		ini_set("session.gc_maxlifetime","36000");
		ini_set("session.session.gc_probability","1");
		ini_set("session.gc_divisor","1");
		session_start();
	
	}
	function destroySession(){
	
		session_destroy();
	}
	function checkSessionExist($er,$path){
		$sessionUID = $_SESSION['userid'];
		if(!isset($sessionUID)){
		echo("<SCRIPT LANGUAGE='JavaScript'>alert ('$uid');</SCRIPT>");
			session_destroy();
			echo("<SCRIPT LANGUAGE='JavaScript'>alert ('$er!');</SCRIPT>");
			echo("<SCRIPT LANGUAGE='JavaScript'>parent.window.location ='$path';</SCRIPT>");
		}
	}
 	function login(){

		$link = mysql_connect('localhost',"admin","jcjy1977");
		if (! $link){
			echo("Couldn't connect to MySQL");
	
		}
		else{
			mysql_select_db("mydb");
			
		}
		return $link;
	}
	function logout($lk){

		mysql_close($lk);
	}	
	function warning(){
	    	echo("What do you want Dude? Wanna Play with Me :-)<br>");
			echo("You are From IP: $_ENV[REMOTE_ADDR]<br>");
	}
	
	function getAge($birthday){

	$age=0;


	$nyear=strtok($birthday,'-');
	$nmonth=strtok("",'-');
	$nday=strtok("",'-');

	$day=date('d');
	$month=date('m');
	$year=date('Y');

	$age=($year-$nyear);
	if($month>$nmonth){
		$age--;
	}
	elseif($month==$nmonth){
		if($day>$nday){
			$age--;
		}

	}
	else{}

	if($birthday=="0000-00-00")
		return(0);
	else	
		return($age);

  }
  
  
  function printAll($result){
		echo("<ul>");
		while($row=mysql_fetch_row($result)){
			echo("<li>");			
			echo("<a href=showtopic.php?topid=$row[0]>$row[2]</a> ($row[5] views)");
			 $query = "select childid from topicrelation where parentid='$row[0]'"; 
			 $rst = mysql_query($query);
			 if($rst){
				while($row1=mysql_fetch_row($rst)){
					$query1="select * from topic where topicid='$row1[0]'order by date desc ";
					$rst1=mysql_query($query1);
					 
					if($rst1){
						printAll($rst1);
					}
					mysql_free_result($rst1);

				}
			 }
			 mysql_free_result($rst);	
		 
			echo("</li>");
		}
		echo("</ul>");

  }
   function printFollow($topicid){
		$query = "select childid from topicrelation where parentid='$topicid'";
		
		$result = mysql_query($query);
				
		if($result){
			while($r=mysql_fetch_row($result)){
				$id=$r[0];
				$q="select * from topic where topicid='$id'";
				$r = mysql_query($q);
				if($r){
					printAll($r); 
				}
				mysql_free_result($r);
			}
		
		}
		mysql_free_result($result);
  }

 function deleteFollow($parentid){
		
		$query = "select childid from topicrelation where parentid='$parentid'";
		
		$result = mysql_query($query);
				
		if($result){
			while($r=mysql_fetch_row($result)){
				$id=$r[0];
				$q="select childid from topicrelation where parentid='$id'";
				$r = mysql_query($q);
				if($r){
					deleteFollow($id); 
				}
			}
		
		}
		$query1="delete from topicrelation where parentid='$parentid'";
		$r1=mysql_query($query1);
		if(!$r1){	
			echo("Deleting $parentid from Topic DB failed<br>");
			echo("$query1<br>");
			
		}	
		$query = "delete from topic where topicid='$parentid'";
		$r2=mysql_query($query);
		if(!$r2){	
			echo("Deleting $parentid from Topic DB failed<br>");
			echo("$query<br>");
		}
  }
?>