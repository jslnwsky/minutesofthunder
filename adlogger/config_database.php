<?php
/*
SiteURL = The site where you'll be running the backend processing of the script
			No trailing slash!  Example:
			$siteurl = "http://www.trevorfitzgerald.com";
AdLogger Location = The folder in your directory where you installed AdLogger
			Again, no trailing slash. Example:
			$adlogger_loc = "/adlogger";
*/

$siteurl = "http://www.minutesofthunder.com";

$adlogger_loc = "/adlogger";

// Your database connection information.
mysql_connect("localhost", "wwwmins_adlog", "newjob1") or die(mysql_error());
mysql_select_db("wwwmins_adlog") or die(mysql_error());
?>