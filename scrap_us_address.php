<?php    
    // Defining the basic cURL function
    function curl($url) {
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
	// Defining the basic scraping function
    function scrape_between($data, $start, $end){
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
    }
	
	
	$con=mysql_connect('localhost','root','');
	
	mysql_select_db('mu_beta',$con) or die(mysql_error());
	
	$query = "select name,link from scrapuniv_us";
	
	$query = mysql_query($query) or die(mysql_error());
	while($rs = mysql_fetch_array($query))
	{
		$link = $rs['link'];
		$scraped_page = curl("$link");    // Downloading IMDB home page to variable $scraped_page
		$scraped_data = scrape_between($scraped_page, "<body>", "</body>");   // Scraping downloaded dara in $scraped_page for content between <title> and </title> tags
		$first = scrap_names($scraped_data,$rs['name']);
		
	}
	
	
	
	
    function scrap_names($data,$univ_name)
	{
		//$result = substr($data,5698,11000);
		$ar = explode('<table',$data);
		//echo "<pre>";
		//print_r($ar[8]);
		$temp = explode('Address',$ar[8]);
		//echo $temp[1];
		$list = explode('<h5>',$temp[1]);
		
		//print_r($list);
		$address='';
		for($i=1;$i<count($list);$i++)
		{
			$address = $address.$list[$i].' ';
		}
		$address = str_replace('</h5>','',$address);
		$address = str_replace('</td>','',$address);
		$address = str_replace('<td rowspan="4" valign="top">','',$address);
		echo ($address);
		echo "<br>";
		//echo "update scrapuniv_us set address=\"$address\" where name=\"$univ_name\"";
		$query = mysql_query("update scrapuniv_us set address=\"$address\" where name=\"$univ_name\" limit 1") or die(mysql_error());
		
	}

?>