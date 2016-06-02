<?php 
	ob_start();
	$inputkeyword = $_POST['taxname'];
	$location = $_POST['city'];
	$geocoor = $_POST['geocoor'];
	$safekeyword = htmlentities($inputkeyword);
	$safekeyword = preg_replace("/ /","+",$safekeyword);
	//$sendkeyword = "*".$safekeyword."*";
	//analytics.js: __gaTracker('send', 'event', 'keywordsearch', 'taxname');
	$url = "https://www.resourcehouse.info/win211/Search?q=".$safekeyword."&loc=".$location."&geo=".$geocoor ;
		while (ob_get_status()) 
		{
		    ob_end_clean();
		}
		
		// no redirect
		header( "Location: $url " );

?>
