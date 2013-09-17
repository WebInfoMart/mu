<?php

	$con=mysql_connect('localhost','root','');
	mysql_select_db('mu_beta',$con) or die('mysql_error()');
	$result=mysql_query("select id,courseId,UKPRN from courses where id>= 2174")or die(mysql_error()); 
	
	while($row = mysql_fetch_array($result))
	{
		echo $row['courseId']." ".$row['UKPRN']."<br>";
		$id=$row['id'];
		$ukprn= $row['UKPRN'];
		$service_url = "https://JY4PDF8DMA1SS2WE16KB@data.unistats.ac.uk/api/KIS/Institution/$ukprn/Course/".$row['courseId'].".json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $service_url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_error($ch);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch);
		curl_close($ch);
		$output=json_decode($response);
		//print_r($output);
		echo $output->UCASCourseId;
		mysql_query("update courses set ucasId=\"".$output->UCASCourseId."\" where id=".$id) or die(mysql_error());
	}
	exit;
	while($row = mysql_fetch_array($result))
	{
		echo $row['id']." ".$row['UKPRN']."<br>";
		$univId = $row['id'];
		$ukprn=$row['UKPRN'];
		$service_url = "https://JY4PDF8DMA1SS2WE16KB@data.unistats.ac.uk/api/KIS/Institution/$ukprn/Courses.json?pageIndex=0&pageSize=500";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $service_url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_error($ch);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		$response = curl_exec($ch);
		curl_close($ch);
		$output=json_decode($response);
		//print_r($output);
		foreach($output as $output)
		{
			//echo ucfirst(strtolower($output->Title))." ".$output->KisCourseId."<br>";
			//echo "insert into courses(name,courseId,univId) values('".$output->Title."','".$output->KisCourseId."',".$univId.")";
			//mysql_query("insert into courses(name,courseId,univId) values(\"".$output->Title."\",\"".$output->KisCourseId."\",".$univId.")") or die(mysql_error()); 
		}
		//$rs = innerscrape($row['link']);
		//print_r($rs);
		//mysql_query("update scrapuniv set address='".$rs."' where link='".$row['link']."'");
	}
	
	
?>