<?php 

$con=mysql_connect('localhost','root','');
mysql_select_db('mu_beta',$con) or die('mysql_error()');


$result=mysql_query("select link from scrapuniv")or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	echo $row['link']."<br>";
	$rs = innerscrape($row['link']);
	print_r($rs);
	mysql_query("update scrapuniv set address='".$rs."' where link='".$row['link']."'");
}

//innerscrape("http://www.4icu.org/reviews/4759.htm");
//innerscrape("http://www.4icu.org/reviews/10120.htm");







function innerscrape($url)
{
$scrapeData = curl($url);
$scrapeData = scrapeBetween($scrapeData, "<span", "</body>");
$temp=explode('<table',$scrapeData);
$temp1 = $temp[4];
$temp2 = explode("<h5>",$temp1);
$str="";
for($count=1;$count<count($temp);$count++)
{
	$str=$str." ".$temp2[$count];
}
$add=str_replace("</h5>","",$str);
$add=str_replace("</h5></td>","",$add);
$add=str_replace('</td>',"",$add);
$add=str_replace('<td rowspan="4" valign="top">',"",$add);

$add=trim($add);
return $add;
/*
$temp2 = explode("<h4>",$temp[3]);
//echo "thisis".$temp[3];
$rstr = substr($url,28,4);
$temp3=explode("<a",$temp2[1]);
$temp4=explode(" ",substr($temp3[1],7));
$link = str_replace("\"","",$temp4[0]);
$temp5=explode("<h5>",$temp2[3]);
$temp5[1]=str_replace("<!--".$rstr."-->","",$temp5[1]);
$temp5[1]=trim($temp5[1]);
$year=substr($temp5[1],0,4);

$return=array('link'=>$link,'year'=>$year);
return $return;
?>
	<script>
	alert('<?php echo $temp2[3];?>');
	</script>
	<?php
	//return $return;
*/
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