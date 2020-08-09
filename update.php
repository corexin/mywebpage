
<?php
  function getAge($birthday){


	$age=0;
	$nyear=date(Y,"$birthday");
	echo($nyear);
	$nmonth=date(m,$birthday);
	echo($nmonth);
	$nday=date(d,$birthday);
	echo($nday);



	$day=date('d');
	$month=date('m');
	$year=date('Y');
     echo("now:$year<br>");
     echo("birth:$nyear<br>");

	$age=($year-$nyear);
	if($month>$nmonth){		$age--;
	}
	elseif($month==$nmonth){		if($day>$nday){			$age--;
		}

	}
	else{}

	echo($age);

  }
$a=date("Y-m-d", mktime(0, 0, 0, 4, 1, 2000));
$b=date('Y-m-d');
  $c=$b-$a;
  echo("$c");





?>