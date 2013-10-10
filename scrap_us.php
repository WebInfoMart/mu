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
	
	$url = array(
			'http://www.4icu.org/us/Alabama.htm',
			'http://www.4icu.org/us/Alaska.htm',
			'http://www.4icu.org/us/Arizona.htm',
			'http://www.4icu.org/us/Arkansas.htm',
			'http://www.4icu.org/us/California.htm',
			'http://www.4icu.org/us/Colorado.htm',
			'http://www.4icu.org/us/Connecticut.htm',
			'http://www.4icu.org/us/Delaware.htm',
			'http://www.4icu.org/us/District-of-Columbia.htm',
			'http://www.4icu.org/us/Florida.htm',
			'http://www.4icu.org/us/Georgia.htm',
			'http://www.4icu.org/us/Hawaii.htm',
			'http://www.4icu.org/us/Idaho.htm',
			'http://www.4icu.org/us/Illinois.htm',
			'http://www.4icu.org/us/Indiana.htm',
			'http://www.4icu.org/us/Iowa.htm',
			'http://www.4icu.org/us/Kansas.htm',
			'http://www.4icu.org/us/Kentucky.htm',
			'http://www.4icu.org/us/Louisiana.htm',
			'http://www.4icu.org/us/Maine.htm',
			'http://www.4icu.org/us/Maryland.htm',
			'http://www.4icu.org/us/Massachusetts.htm',
			'http://www.4icu.org/us/Michigan.htm',
			'http://www.4icu.org/us/Minnesota.htm',
			'http://www.4icu.org/us/Mississippi.htm',
			'http://www.4icu.org/us/Missouri.htm',
			'http://www.4icu.org/us/Montana.htm',
			'http://www.4icu.org/us/Nebraska.htm',
			'http://www.4icu.org/us/Nevada.htm',
			'http://www.4icu.org/us/New-Hampshire.htm',
			'http://www.4icu.org/us/New-Jersey.htm',
			'http://www.4icu.org/us/New-Mexico.htm',
			'http://www.4icu.org/us/New-York.htm',
			'http://www.4icu.org/us/North-Carolina.htm',
			'http://www.4icu.org/us/North-Dakota.htm',
			'http://www.4icu.org/us/Ohio.htm',
			'http://www.4icu.org/us/Oklahoma.htm',
			'http://www.4icu.org/us/Oregon.htm',
			'http://www.4icu.org/us/Pennsylvania.htm',
			'http://www.4icu.org/us/Rhode-Island.htm',
			'http://www.4icu.org/us/South-Carolina.htm',
			'http://www.4icu.org/us/South-Dakota.htm',
			'http://www.4icu.org/us/Tennessee.htm',
			'http://www.4icu.org/us/Texas.htm',
			'http://www.4icu.org/us/Utah.htm',
			'http://www.4icu.org/us/Vermont.htm',
			'http://www.4icu.org/us/Virginia.htm',
			'http://www.4icu.org/us/Washington.htm',
			'http://www.4icu.org/us/West-Virginia.htm',
			'http://www.4icu.org/us/Wisconsin.htm',
			'http://www.4icu.org/us/Wyoming.htm',
	);
	foreach($url as $i=>$k)
	{
	$scraped_page = curl("$k");    // Downloading IMDB home page to variable $scraped_page
	$scraped_data = scrape_between($scraped_page, "<body>", "</body>");   // Scraping downloaded dara in $scraped_page for content between <title> and </title> tags
    
	$first = scrap_names($scraped_data);
	
    }
	
    function scrap_names($data)
	{
		//$result = substr($data,5698,11000);
		$ar = explode('<table',$data);
		//echo "<pre>";
		//print_r($ar[8]);
		$list = explode('gr',$ar[8]);
		//print_r($list);
		for($i=1;$i<count($list);$i++)
		{
			//echo $temp = scrape_between($list[$i],"<a","</a>");
			echo $href = scrape_between($list[$i],"href=\"","\"");
			echo $title = scrape_between($list[$i],"title=\"","\"");
			echo "<br>";
			$update=mysql_query("insert into scrapuniv_us(name,link) values(\"$title\",\"$href\")")or die(mysql_error()); 
		}
	}

?>