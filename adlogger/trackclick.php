<?php
include ("./config_database.php");
include ("./config_settings.php");

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$visitor_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$visitor_agent = $_SERVER['HTTP_USER_AGENT'];
$ref=@$HTTP_REFERER;
$date = date('Y-m-d', time());
$time = date('G:i:s', time());
$timestamp = time();

/*
//For the demo only - truncates the visitor IP and hostname so that they're not visible
$visitor_ip = substr($visitor_ip, 0, 6) . '***';
$visitor_hostname = substr($visitor_hostname, 0, 6) . '...';
*/

mysql_query("INSERT INTO adlog_logfiles
	SET
date ='$date',
time ='$time',
timestamp ='$timestamp',
visitor_ip='$visitor_ip',
visitor_hostname='$visitor_hostname',
visitor_agent='$visitor_agent',
entry_type='$_GET[entyp]',
displaypage_url='$_GET[page]',
displaypage_ref='$_GET[ref]',
ad_targ_url='$_GET[targ]',
ad_format='$_GET[form]',
ad_channel='$_GET[chan]',
ad_bord_color='$_GET[bordcol]',
ad_bg_color='$_GET[bgcol]',
ad_link_color='$_GET[linkcol]',
ad_url_color='$_GET[urlcol]',
ad_text_color='$_GET[txtcol]',
adlogger_channel_id='$_GET[chid]'
")
or die(mysql_error());

if ($email_notice == "y") {
	//Start PHP mail function
	$msg = "Congratulations, you just got a click from a visitor!<BR><BR>
	Visitor IP - $visitor_ip<BR>
	Visitor Hostname - $visitor_hostname <BR>
	Visitor Agent - $visitor_agent <BR>
	Date/Time of click - $date $time <BR><BR><BR><BR>
	Details:<BR><BR>
	Page of the click - <a href=$ref>$ref</a><BR>
	Page of the click - <a href=$_GET[page]>$_GET[page]</a><BR>
	Page that referred the click - <a href=$_GET[ref]>$_GET[ref]</a><BR>
	Target URL of the clicked ad - <a href=$_GET[targ]>$_GET[targ]</a><BR>
	Ad Format - $_GET[form]<BR>
	Ad Channel - $_GET[chan]<BR>
	Ad Border Color - $_GET[bordcol]<BR>
	Ad Background Color - $_GET[bgcol]<BR>
	Ad Link Color - $_GET[linkcol]<BR>
	Ad URL Color - $_GET[urlcol]<BR>
	Ad Text Color - $_GET[txtcol]<BR><BR><BR><BR>
	These notices are part of your AdLogger settings. To change, log in to your Admin page <a href=$siteurl$adlogger_loc>here</a>.
	";
	
	$subject = "AdLogger Click Notification";
	$mailheaders  = "MIME-Version: 1.0\n";
	$mailheaders .= "Content-type: text/html; charset=iso-8859-1\n";
	
	$to = $email;
	$mailheaders .= "From: AdLogger <$email> \n";
	$mailheaders .= "Reply-To: $email\n\n";
	
	mail($to, $subject, $msg, $mailheaders);
}

if (isset($_COOKIE["adsclicked"])) {
	$value = ($_COOKIE["adsclicked"] + 1);
	setcookie("adsclicked", $value, time()+$clickmaxtime, "/");

	//Check to see if the mulitple click alert email should be sent
	if ($email_alert == "y") {
		//Start PHP mail function
		$msg = "One of your visitors has clicked on multiple ads.<BR><BR>
		Visitor IP - $visitor_ip <BR>
		Visitor Hostname - $visitor_hostname <BR>
		Visitor Agent - $visitor_agent <BR>
		Date/Time of click - $date $time <BR><BR>
		So far, this person has clicked a total of ___ $value ___ ads.<BR><BR><BR>
		Details:<BR><BR>
		Page of the click - <a href=$ref>$ref</a><BR>
		Page of the click - <a href=$_GET[page]>$_GET[page]</a><BR>
		Page that referred the click - <a href=$_GET[ref]>$_GET[ref]</a><BR>
		Target URL of the clicked ad - <a href=$_GET[targ]>$_GET[targ]</a><BR>
		Ad Format - $_GET[form]<BR>
		Ad Channel - $_GET[chan]<BR>
		Ad Border Color - $_GET[bordcol]<BR>
		Ad Background Color - $_GET[bgcol]<BR>
		Ad Link Color - $_GET[linkcol]<BR>
		Ad URL Color - $_GET[urlcol]<BR>
		Ad Text Color - $_GET[txtcol]<BR><BR><BR><BR>
		
		These notices are part of your AdLogger settings. To change, log in to your Admin page <a href=$siteurl$adlogger_loc>here</a>.
		";
		
		$subject = "AdLogger Multiple Click Alert";
		$mailheaders  = "MIME-Version: 1.0\n";
		$mailheaders .= "Content-type: text/html; charset=iso-8859-1\n";
		
		$to = $email;
		$mailheaders .= "From: AdLogger <$email> \n";
		$mailheaders .= "Reply-To: $email\n\n";
		
		mail($to, $subject, $msg, $mailheaders);
	}
	exit;
} else {
	setcookie("adsclicked", "1", time()+$clickmaxtime, "/");
	exit;
}
?>