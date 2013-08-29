<?php 

$con=mysql_connect('localhost','root','');
mysql_select_db('mu_beta',$con) or die('mysql_error()');


$scrapeData = curl("http://www.4icu.org/gb/");
$scrapeData = scrapeBetween($scrapeData, "<span", "</body>");
$scrapeData = explode("<tr>", $scrapeData);



$univArray=array();
$index=0;
for($i=10;$i<(20+135);$i++)
{
	$temp = $scrapeData[$i];
	$temp = explode("title",$temp);
	$temp2 = explode("<h6>",$temp[1]);
	$temp3=explode("<a",$temp[0]);
	$link = substr($temp3[1],6);
	$link = str_replace("\"","",$link);
	?>
	<!--<script>alert('<?php echo $link?>');
	</script>-->
	<?php
	for($count=0;$count<count($temp2);$count++)
	{
		$universityName=str_replace('="">',"",$temp2[$count]);
		$universityName=str_replace("</h6></td></tr>","",$universityName);
		$universityName=str_replace("</a></td><td>","",$universityName);
		$universityName=str_replace("...","",$universityName);
		$universityName=trim($universityName);
		
		if($count)
			$univArray[$index]['location']=$universityName;
		else
			$univArray[$index]['name']=$universityName;
		$univArray[$index]['link']=$link;
	}
	$index++;
}
echo "<pre>";

foreach($univArray as $univ)
{
	echo "Name: ".$univ['name']."  Location:".$univ['location']."  Link:".$univ['link']."<br>";
	//mysql_query("insert into scrapuniv values('".$univ['name']."','".$univ['location']."','".$univ['link']."')");
}

//mysql_query("insert into scrapuniv values('kjsldkf','sadfsaf')");

function scrapeBetween($data, $start, $end)
{
		$data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
}
function curl($url) 
{
    // Assigning cURL options to an array
    $options = Array(
        CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
        CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
        CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
        CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
        CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
        CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
        CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
        CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
    );
     
    $ch = curl_init();  // Initialising cURL 
    curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
    $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
    curl_close($ch);    // Closing cURL 
    return $data;   // Returning the data from the function 
}
?>