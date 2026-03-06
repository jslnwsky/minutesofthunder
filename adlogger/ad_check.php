<?php
/*//////////////////////////////////////////////////////////////////////////////////
There are 3 tests in this file.  If the user passes all 3 of the tests,
then the script will let them view ads.

First, it checks to see if their cookie value is higher than the limit.
Second, it checks to see if their IP address/range has been banned.
Third and finally, it checks the database to see if anyone from that IP
has clicked any ads recently.  If the user fails any one of them, it won't continue
through the other tests, and then outputs a "y" or "n" which gets read by the
PHP wrapping code.
//////////////////////////////////////////////////////////////////////////////////*/

include ("./config_database.php");
include ("./config_settings.php");
$visitor_ip = $_GET['visitor_ip'];
$adsclicked_cookie = $_GET['adsclicked'];

//Check to see if the visitor's cookie value is already set.
if ($adsclicked_cookie >= $clickmax) { // If a cookie is set and it's higher than the maximum allowed clicks,
		$show_ads = 'n'; // don't let them see any ads,
		$test_done = 'y'; // and don't bother with the next two tests
		$reason = 1;
}

if ($test_done != 'y') {
	foreach ($ip_range_ban_list as $ip_range_ban) { // Breaks apart the array to read each IP/range at at time
		if (preg_match('/\\A' . $ip_range_ban . '/', $visitor_ip) && $ip_range_ban != "") { // if the visitor's IP contains the banned IP range,
			$show_ads = 'n'; // then it won't let them view ads
			$test_done = 'y'; // and won't bother with the next test.
			$reason = 2;
			break; // stops checking against the other values in the array once it finds one
		}
	}
}

if ($test_done != 'y' && $ip_db_check == 'y') {
	$backlog_timeframe = time() - $clickmaxtime;
	
	// Check the database to see if the visitor's IP has already clicked on some ads recently
	$result = mysql_query("SELECT visitor_ip FROM adlog_logfiles WHERE visitor_ip = '$visitor_ip' AND entry_type = 'click' AND timestamp > '$backlog_timeframe' LIMIT $clickmax");
	$visitors_recent_clicks = mysql_num_rows($result);
	
	if ($visitors_recent_clicks >= $clickmax) {
		$show_ads = 'n';
		$test_done = 'y';
		$reason = 3;
	}
}

// If ads are blocked for the visitor, record it to the database so you can now when, why, and for whom ads were blocked
if ($show_ads == 'n') {
	$date = date('Y-m-d', time());
	$time = date('G:i:s', time());
	mysql_query("INSERT INTO adlog_adblock
		SET
		date='$date',
		time='$time',
		visitor_ip='$visitor_ip',
		reason='$reason'
	")
	or die(mysql_error());
}

// If the user passes all 3 of those tests, then go ahead and let them view the ads
if ($test_done != 'y') $show_ads = 'y';

echo $show_ads; // Output a "y" or "n" which will get interpreted by the file_get_contents code in the PHP AdSense wrap

?>