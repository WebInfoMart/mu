<?php 

$con=mysql_connect('localhost','root','');
mysql_select_db('mu_beta',$con) or die('mysql_error()');


$univName=array(
"Anglia Ruskin University"
,"Roehampton University"
,"Richmond, The American International University in London"
,"Queen's University Belfast"
,"Queen Mary, University of London"
,"Royal Holloway, University of London"
,"University of Portsmouth"
,"Plymouth University"
,"Oxford Brookes University"
,"Nottingham Trent University"
,"The University of Nottingham"
,"Northumbria University"
,"Newcastle University"
,"Middlesex University"
,"The University of Manchester"
,"Loughborough University"
,"London South Bank University"
,"London Metropolitan University"
,"Liverpool John Moores University"
,"Liverpool Hope University"
,"University of Lincoln"
,"University of Leicester"
,"Leeds Metropolitan University"
,"University of Leeds"
,"Lancaster University"
,"Kingston University"
,"Keele University"
,"Imperial College London"
,"The University of Hull"
,"University of Hertfordshire"
,"Harper Adams University College"
,"University of Greenwich"
,"Goldsmiths, University of London"
,"Glyndwr University"
,"Glasgow Caledonian University"
,"University of Glasgow"
,"University of Exeter"
,"European School of Economics"
,"Edinburgh Napier University"
,"The University of Edinburgh"
,"Edge Hill University"
,"University of East London"
,"University of East Anglia"
,"Durham University"
,"University of Dundee"
,"University of Derby"
,"De Montfort University"
,"University of Cumbria"
,"University for the Creative Arts"
,"Coventry University"
,"University of Chichester"
,"University of Chester"
,"University of Central Lancashire"
,"Cardiff University"
,"Canterbury Christ Church University"
,"University of Cambridge"
,"The University of Buckingham"
,"Brunel University"
,"University of Bristol"
,"University of Brighton"
,"Bournemouth University"
,"University of Bolton"
,"Bishop Grosseteste University College Lincoln"
,"University College Birmingham"
,"Birmingham City University"
,"Birkbeck, University of London"
,"University of Bedfordshire"
,"Bath Spa University"
,"University of Bath"
,"Bangor University"
,"Anglia Ruskin University"
,"Aberystwyth University"
,"University of Abertay Dundee"
,"The University of Sheffield"
,"Sheffield Hallam University"
,"University of Southampton"
,"Southampton Solent University"
,"University of St Andrews"
,"St George's, University of London"
,"Staffordshire University"
,"University of Sunderland"
,"University of Surrey"
,"University of Sussex"
,"Swansea University"
,"Swansea Metropolitan University"
,"Teesside University"
,"University of Wales Trinity Saint David"
,"University of Ulster"
,"University of the West of Scotland"
,"University of the Arts London"
,"The University of Warwick"
,"University of Westminster"
,"University of Wolverhampton"
,"University of Worcester"
,"The University of York"
,"York St John University"

);//array

foreach($univName as $i=>$key)
{

$result=mysql_query("select * from university where univName like \"".$key."\"")or die(mysql_error());
$row = mysql_fetch_array($result);
$univId = $row['id'];
$scraprs=mysql_query("select * from scrapuniv where name like \"".$key."\"")or die(mysql_error());
$row1 = mysql_fetch_array($scraprs);
$location = $row1['location'];
$website = $row1['url'];
$yearOfEst = $row1['yearOfEst'];
$address = $row1['address'];

$city=mysql_query("select id from city where cityName='".$location."'");
$row2 = mysql_fetch_array($city);
$cityId=$row2['id'];

mysql_query("update university set cityId=".$cityId.",countryId=13,updated='1' where univName=\"".$key."\"")or die(mysql_error());
mysql_query("insert into univDetails(univId,yearOfEst,website,address) values($univId,$yearOfEst,\"$website\",\"$address\")")or die(mysql_error());

}
?>