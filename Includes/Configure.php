<?php 

 	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');

	$UserName				= "admin";
	$Password				= "qw013svg";
	
	$Domain					= "http://".$_SERVER["HTTP_HOST"].rtrim(str_replace($DOCUMENT_ROOT, "", dirname(dirname($PHP_SELF))), "/")."/";
	$SiteName				= "";
		
	$Category				= "RC Cars";
	$NewsFeed				= "RC Cars";
		
	$MainTitle				= "";
	$SubTitle				= "";
	
	$Keywords				= "RC Car Action, RC Car Bodies, RC Car For sale, RC Car Kits, RC Car Magazines, RC Car Parts, RC Car Racing, RC Car Tracks, RC Car Videos, RC Cars";
	
	$GooglePubID			= "pub-6868925252325367";
	$GoogleChannel			= "rc_cars";
	$GoogleLinkColor		= "BB1D14";
	$GoogleURLColor			= "F1B324";

	$AmazonID				= "minutesofthun-20";
	$AmazonMode				= "Sporting";
	$AmazonSearch			= "RC Cars";
	$AmazonLinkColor		= "BB1D14";
	$AmazonTextColor		= "F1B324";
	$DisplayAmazon			= "checked";

	$CopyRight				= "All images, text and code found on this web site are &copy; ".date("Y").",".$SiteName." - All rights reserved worldwide...";

	$Name					= "Jim Slinowsky";
	$Address1				= "";
	$Address2				= "";
	$City					= "";
	$State					= "";
	$ZipCode				= "";
	$Country				= "";
	$Telephone				= "4163004433";
	$EmailAddress			= "jim@minutesofthunder.com";

	$ShowGoogle				= "";
	$ShowFireFox			= "";
	$ShowSearch				= "";

?>