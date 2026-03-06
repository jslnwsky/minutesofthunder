<?php 

 	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', FALSE);
	header('Pragma: no-cache');

	$UserName				= "%UserName%";
	$Password				= "%Password%";
	
	$Domain					= "http://".$_SERVER["HTTP_HOST"].rtrim(str_replace($DOCUMENT_ROOT, "", dirname(dirname($PHP_SELF))), "/")."/";
	$SiteName				= "%SiteName%";
		
	$Category				= "%Category%";
	$NewsFeed				= "%NewsFeed%";
		
	$MainTitle				= "%MainTitle%";
	$SubTitle				= "%SubTitle%";
	
	$Keywords				= "%Keywords%";
	
	$GooglePubID			= "%GooglePubID%";
	$GoogleChannel			= "%GoogleChannel%";
	$GoogleLinkColor		= "%GoogleLinkColor%";
	$GoogleURLColor			= "%GoogleURLColor%";

	$AmazonID				= "%AmazonID%";
	$AmazonMode				= "%AmazonMode%";
	$AmazonSearch			= "%AmazonSearch%";
	$AmazonLinkColor		= "%AmazonLinkColor%";
	$AmazonTextColor		= "%AmazonTextColor%";
	$DisplayAmazon			= "%DisplayAmazon%";

	$CopyRight				= "All images, text and code found on this web site are &copy; ".date("Y").",".$SiteName." - All rights reserved worldwide...";

	$Name					= "%Name%";
	$Address1				= "%Address1%";
	$Address2				= "%Address2%";
	$City					= "%City%";
	$State					= "%State%";
	$ZipCode				= "%ZipCode%";
	$Country				= "%Country%";
	$Telephone				= "%Telephone%";
	$EmailAddress			= "%EmailAddress%";

	$ShowGoogle				= "%ShowGoogle%";
	$ShowFireFox			= "%ShowFireFox%";
	$ShowSearch				= "%ShowSearch%";

?>