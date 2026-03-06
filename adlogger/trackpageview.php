<?php
include ("./config_database.php");
include ("./config_settings.php");

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$visitor_hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$visitor_agent = $_SERVER['HTTP_USER_AGENT'];
$date = date('Y-m-d', time());
$time = date('G:i:s', time());
$timestamp = date(time());

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
adlogger_channel_id='$_GET[chid]'
")
or die(mysql_error());
?>