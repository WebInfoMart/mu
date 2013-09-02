<?php 

$con=mysql_connect('localhost','root','');
mysql_select_db('mu_beta',$con) or die('mysql_error()');
$count=0;
$query=mysql_query("select * from tempraryuniversity");
while($row=mysql_fetch_array($query))
{
	//echo $row['name'];
	$query2=mysql_query("select id from university where univName=\"".$row['name']."\"")or die(mysql_error());
	$univ=mysql_fetch_array($query2);
	if($univ['id'])
	{
		$query3=mysql_query("select univId from univDetails where univId=".$univ['id']);
		$univdetails=mysql_fetch_array($query3);
		//print_r($univdetails);
		if($univdetails['univId'])
		{
			$count++;
			//echo $row['address'].$row['type'].$row['yearOfEst'].$row['totalstudent'].$row['staff'].$row['library'].$row['sports'].$row['scholer'].$row['housing'].$row['exchange'].$row['online'];
			 $tempquery="update univDetails set address=\"".$row['address']."\",type=\"".$row['type']."\",yearOfEst=\"".$row['yearOfEst']."\",students=\"".$row['totalstudent']."\",staff=\"".$row['staff']."\",library='".$row['library']."',sports='".$row['sports']."',scholer='".$row['scholer']."',housing='".$row['housing']."',exchange='".$row['exchange']."',online='".$row['online']."' where univId=".$univ['id'];
			//mysql_query($tempquery)or die(mysql_error());
			//mysql_query("update university set updated='1' where id=".$univ['id']) or die(mysql_error());
		}
		
	}
}
echo "<br><br><br>Total records:  ".$count;
?>