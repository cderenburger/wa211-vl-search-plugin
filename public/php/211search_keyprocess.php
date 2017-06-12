<?php 
	ob_start();
	$inputkeyword = $_POST['taxname'];
	$location = $_POST['city'];
	$geocoor = $_POST['geocoor'];
	$region = $_POST['region'];
	$safekeyword = htmlentities($inputkeyword);
	$safelocation = htmlentities($location);
	$safegeocoor = htmlentities($geocoor);
	$saferegion = htmlentities($region);
	
	$safekeyword = preg_replace("/ /","+",$safekeyword);
	$safelocation = preg_replace("/ /","+",$safelocation);
	$safegeocoor = preg_replace("/ /","+",$safegeocoor);
	$saferegion = preg_replace("/ /","+",$saferegion);
	//$sendkeyword = "*".$safekeyword."*";
	//analytics.js: __gaTracker('send', 'event', 'keywordsearch', 'taxname');
	$url = "https://www.resourcehouse.info/win211/Search?q=".$safekeyword."&loc=".$safelocation."&geo=".$safegeocoor."&reg=".$saferegion."&o=distance-asc" ;
		while (ob_get_status()) 
		{
		    ob_end_clean();
		}
		
		// no redirect
		header( "Location: $url " );

?>
